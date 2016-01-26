<?php
session_start();

// Getting init file
require_once '/var/www/encedo_config.php';

$_SESSION['user'] = false;
header('Location: ./');
exit(1);
?>