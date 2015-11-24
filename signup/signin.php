<?php

// Getting init file
require_once '/var/www/encedo_config.php';

$link = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
$select = @mysql_select_db(DB_DATABASE);

// Getting information from GET
$input = json_decode(file_get_contents('php://input'), true);
$result = array('input' => $input);

$session_data = $_SESSION["encedokey_auth"];
$lookup_session_private = $session_data[$input["remote_pub"]];

//generate server side AUTH data
$tmp_secret = curve25519_shared($lookup_session_private, base64_decode($input["local_pub"]));
$new_auth = curve25519_shared($tmp_secret, base64_decode($input["id_pub"]));

if ($new_auth === base64_decode($input["auth_data"])) {
	//$user = mysql_query('SELECT * FROM `users` WHERE `email` = \''.mysql_real_escape_string($email).'\' ');
	//$_SESSION['user'] = mysql_fetch_assoc($user);
	$result['ok'] = 1;
} else {
	$result['error'] = mysql_error();
	$result['ok'] = -1;
}

// Writing result JSON string
echo json_encode($result);
exit(1);

?>