<?php
    session_start();
    if (!isset($_SESSION['count']))
    {
        $_SESSION['count']=1;
    }
    else
    $_SESSION['count'] ++;

?>
<?php
    echo $_SESSION['count'];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
    </head>

    <body>
        <a href ="tang.php"> Next  </a>
    </body>
</html>
