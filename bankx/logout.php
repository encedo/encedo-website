<?php
session_start();

// Getting init file
require_once '/var/www/encedo_config.php';

unset( $_SESSION["encedokey_auth"] );
$_SESSION['user'] = false;
header('Location: ../');
exit(1);
?>
