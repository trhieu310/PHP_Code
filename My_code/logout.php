<?php
session_start();
ob_start();
?>
<!DOCTYPE html">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
session_destroy();
header("location:dangnhap.php");
?>
</body>
</html>
