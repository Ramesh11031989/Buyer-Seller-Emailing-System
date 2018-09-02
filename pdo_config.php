<?php
// place this file at any place except web root and change require path of all files

// domain name for email id
$email_domain = "example.com";   //without www or htttp

//Connection settings
$db_host_name = "localhost";
$db_name = "bses";
$db_user_name = "root";
$db_password = "";
$db_charset = "utf8mb4";
$db_dsn = "mysql:host=$db_host_name;dbname=$db_name;charset=$db_charset";
$db_opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
$pdo = new PDO($db_dsn, $db_user_name, $db_password, $db_opt);
} catch (PDOException $exception) {
$exception_message = $exception->getMessage();
//echo("$exception_message");
}


// and now we're done; close the connection
//   $pdo = null;
?>