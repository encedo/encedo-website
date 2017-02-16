<?php
date_default_timezone_set('Europe/Warsaw');
define('FULLPATH', 'http://olgroup.nazwa.pl/hosting/encedo/');
define('EXTPATH', 'http://olgroup.nazwa.pl/hosting/encedo/');
define('BASETITLE', 'Olgroup Administration Tool');
define('DB_DATABASE', 'olgroup_52');
define('DB_HOST', 'sql.olgroup.nazwa.pl:3307');
define('DB_USER', 'olgroup_52');
define('DB_PASSWORD', 'ENcedo10!');

$link = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
$select = @mysql_select_db(DB_DATABASE);
@mysql_query('set names latin2');

function _map($id) {
	$cfg = @mysql_query('SELECT * FROM `_map` WHERE `id` = ' .(int) $id);
	return @mysql_fetch_assoc($cfg);
}

$t = array();
$tres = @mysql_query('SELECT * FROM `doda`');
while($cf = @mysql_fetch_assoc($tres)) {
	$t[$cf['id']] = $cf['tr'];
}
function t($id) {
	global $t;
	if(array_key_exists($id, $t)) {
		return (stripslashes($t[$id]));
	} return false;
}

$words = array();
$wordsQ = mysql_query('SELECT * FROM `tres`');
while($word = mysql_fetch_assoc($wordsQ)) {
	$words[$word['id']] = stripslashes($word['tr']);
}
function sx($s) {
	global $words;
	return $words[$s];
}


// Wiadomoœæ o b³êdzie
function alert($message, $location = false, $project = 0) {
	$_SESSION['NOTICETYPE'] = 'alert';
	$token = mt_rand(999999,999999999);
	$_SESSION['NOTICE'] = $message;
	$_SESSION['LINKBACK'] = $_SERVER['REQUEST_URI'];
	if($location && strlen($location) > 1) {
		header('Location: ' . FULLPATH . $location);
		exit(1);
	}
}

// Pozytywny komunikat
function ok($message, $location = false, $project = 0) {
	$_SESSION['NOTICETYPE'] = 'ok';
	$token = mt_rand(999999,999999999);
	$_SESSION['NOTICE'] = $message;
	$_SESSION['LINKBACK'] = $_SERVER['REQUEST_URI'];
	if($location && strlen($location) > 1) {
		header('Location: ' . FULLPATH . $location);
		exit(1);
	}
}

// Prosta wiadomoœæ
function notice($message, $location = false, $project = 0) {
	$_SESSION['NOTICETYPE'] = 'text';
	$token = mt_rand(999999,999999999);
	$_SESSION['NOTICE'] = $message;
	if($location && strlen($location) > 1) {
		header('Location: ' . FULLPATH . $location);
		exit(1);
	}
}

function query($sql) {
	return mysql_query($sql);
}

// Funkcja zwraca tablicê elementów zadanych jako argumenty
// nazwa tablicy, 
function cll($tablename = false, $fields = array(), $statement = '', $conditions = '') {
	
	if(!$tablename || count($fields) < 1 || strlen($statement) < 1) {
		return false;	
	}
	
	$string = '';
	// Przygotowanie listy kolumn
	if($fields[0] == '*') {
		$string .= '`'.$tablename.'`.* ';
	} else {
		foreach($fields as $element) {
			if(strlen($element) > 0) {
				$string .= '`'.$tablename.'`.`'.$element.'`, ';
			}
		}
		$string = substr($string, 0, -2);
	}
	
	$result = query('SELECT '.$string.' FROM `'.$tablename.'` WHERE ('.$statement.') ' . $conditions);
	
	// Utworzenie tablicy wynikowej
	$array = array();
	while($content = @mysql_fetch_assoc($result)) {
		$array[] = $content;
	}
	
	echo mysql_error();
	
	return $array;
}

function check($where = '', $map = array()) {
	$full = '';
	foreach($map as $key => $value) {
		$full .= '`'.$key.'` =  ' . '\''.$value.'\' && ';
	}
	$full = substr($full, 0, -4);

	$check = query('SELECT count(*) as counter FROM `'.$where.'` WHERE '.$full.' ');
	$check = mysql_fetch_assoc($check);
	return $check['counter'];
}

function insert($where = '', $map = array(), $unique = false) {

	$fields = '';
	$values = '';
	foreach($map as $key => $value) {
		if(!isset($value) || empty($value)) continue;
		$fields .= '`'.$key.'`, ';
		if($value != 'now()') {
			$values .= '\''.$value.'\', ';
		} else {
			$values .= 'NOW(), ';
		}
	}
	$fields = substr($fields, 0, -2);
	$values = substr($values, 0, -2);
	
	if($unique && check($map, $where) > 0) return false;
	
	$save = query('INSERT INTO `'.$where.'` ('.$fields.') VALUES ('.$values.')');
	echo mysql_error();
	if($save) {
		return mysql_insert_id();
	} else {
		return false;
	}
}

function update($where = '', $map = array()) {

	$full = '';
	$keys = '';
	foreach($map as $key => $value) {
		if(isset($value[0]) && !empty($value[0])) {
			if($value[1]) {
				$keys .= '`'.$key.'` =  ' . '\''.$value[0].'\' && ';
			} else {
				$full .= '`'.$key.'` =  ' . '\''.$value[0].'\', ';
			}
		}
	}
	$full = substr($full, 0, -2);
	$keys = substr($keys, 0, -4);
	
	$update = query('UPDATE `'.$where.'` SET '.$full.' WHERE '.$keys.' ');
	return $update;
}

function delete($where = '', $map = array()) {

	$values = '';
	foreach($map as $key => $value) {
		$values .= '`'.$key.'` = \''.$value.'\', ';
	}
	$values = substr($values, 0, -2);
	
	$delete = query('DELETE FROM `'.$where.'` WHERE ('.$values.')');
	return $delete;
}

// Funkcja sp³aszczaj¹ca tablicê do jednostopniowej listy
function array_flatten($array, $return=array()) {
	foreach ($array as $key => $value) {
		if(is_array($value)) {
			$return = array_flatten($value,$return);
		} else {
			if($value) {
				$return[] = $value;
			}
		}
	}
	return $return;
}
function slugify($text, $is = false) {
	$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
	if($is) {
		$text = str_replace('-', '', trim($text));
	} else {
		$text = trim($text, '-');
	} 
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	$text = strtolower($text);
	$text = preg_replace('~[^-\w]+~', '', $text);
	if(empty($text)) { return ''; }
	return $text;
}
?>