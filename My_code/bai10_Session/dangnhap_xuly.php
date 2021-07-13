<?php
session_start();
ob_start();
require_once('connect.php');
$username=$_POST['username'];
$password=$_POST['password'];
$sl="select * from user where Username='".$username."' and Password='".$password."'";
// $kq=mysql_query($sl, $connect);
// $row=mysql_fetch_array($kq);
$rs = $db->exec($sl);

if($rs > 0)
{

echo $rs;

$_SESSION['username']=$username;
$_SESSION['password']=$password;
$_SESSION['hoten']=$row['HoTen'];
echo "<script language='javascript'>alert('Dang nhap thanh cong');";
			echo "location.href='noidung.php';</script>";
}
else
{
echo "<script language='javascript'>alert('Dang nhap that bai');";
			echo "location.href='dangnhap.php';</script>";
}
?>
