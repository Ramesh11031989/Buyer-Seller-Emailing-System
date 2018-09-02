<?php
require_once 'vendor/autoload.php'
require_once 'pdo_config.php'


// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}

?>
