<?php
    $hostname_config = "localhost";
    $database_config = "rating";
    $username_config = "root";
    $password_config = "";
    $config = new mysqli($hostname_config, $username_config, $password_config, $database_config) or die("Khong the connect");
    // mysqli_select_db($config, $database_config);
    // mysqli_query($config, "set names 'utf8'");
?>
