<?php

// Getting init file
require_once '/var/www/encedo_config.php';

// Getting information from GET
$input = json_decode(file_get_contents('php://input'), true);
$result = array();

$save = mysql_query('INSERT INTO `users` (`id`, `pubkey`, `name`, `email`, `login`, `active`, `creation_date`, `modify_date`) VALUES (NULL, \''.mysql_real_escape_string($input['pubkey']).'\', \''.mysql_real_escape_string($input['name']).'\', \''.mysql_real_escape_string($input['email']).'\', \''.mysql_real_escape_string($input['username']).'\', 1, NOW(), NOW())');

if($save) {
	$result['id'] = mysql_insert_id();
	$result['ok'] = 1;
} else {
	$result['error'] = mysql_error();
	$result['ok'] = -1;
}

// Writing result JSON string
echo json_encode($result);
exit(1);

?>