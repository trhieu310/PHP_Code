<?php
    // $dsn = 'mysql:host=localhost;dbname=tintuc';
    // $username = 'root';
    // $password = '';

    // try {
    //     $db = new PDO($dsn, $username, $password);
    // } catch (PDOException $e) {
    //     $error_message = $e->getMessage();
    //     include('database_error.php');
    //     exit();
    // }
?>

<?php
    $server_username = "root";
    $server_password = "";
    $server_host = "localhost";
    $database = 'tintuc';

    $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
    mysqli_query($conn,"SET NAMES 'UTF8'");
?>
