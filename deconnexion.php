<?php 

session_start();
$_SESSION = array();
//Destruction de la session 
session_destroy();
//Les cookies seront remis à null
setcookie('id', '');
setcookie('login', '');

header("Location: index.php");

?>
