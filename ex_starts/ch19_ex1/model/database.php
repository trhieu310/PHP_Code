<?php
$dsn = 'mysql:host=localhost;dbname=my_guitar_shop2';
$username = 'root';
$password = '';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include 'errors/db_error_connect.php';
    exit;
}

function display_db_error($error_message) {
    include 'errors/db_error.php';
    exit;
}

// $host = 'localhost';
// $database = 'my_guitar_shop2';
// $username = 'root';
// $password = '';

// $db = new mysqli($host, $username, $password, $database);

// $error_message = $db -> connect_error;
// if ($error_message != NULL) {
//     include 'errors/db_error_connect.php';
//     exit;
// }

// function display_db_error($error_message) {
//     global $app_path;
//     include 'errors/db_error.php';
//     exit;
// }

?>
