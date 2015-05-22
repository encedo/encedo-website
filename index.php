<?php 
if(!isset($_GET['page']) || strlen($_GET['page']) < 3) $_GET['page'] = 'index';
include 'tpl/_header.php';
if(isset($_GET['page']) && file_exists('tpl/' . $_GET['page'] . '.php')) {
	include 'tpl/' . $_GET['page'] . '.php';
}
include 'tpl/_footer.php'; 
?>			