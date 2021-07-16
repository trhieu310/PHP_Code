<?php //ob_start();
    global $db;
	include_once('../connect.php');
		// upload hinh anh
	$icon=$_FILES['image']['name'];
    $anhminhhoa_tmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($anhminhhoa_tmp,"../image/".$icon);

	$theloai = filter_input(INPUT_POST, 'TenTL');
	$thutu = filter_input(INPUT_POST, 'ThuTu');
	$an = filter_input(INPUT_POST, 'AnHien');

	$sl = "insert into theloai (TenTL,ThuTu,AnHien,icon) Value('$theloai','$thutu','$an','$icon')";

    $row_count = $db -> exec($sl);
    $error_message = "Them that bai!!!";

	if($row_count > 0)
	{
		echo "<script language='javascript'>alert('Them thanh cong');";
		echo "location.href='theloai.php';</script>";
	}
	else
	{
		echo 'Lỗi: ',display_db_error($error_message);
	}

?>
