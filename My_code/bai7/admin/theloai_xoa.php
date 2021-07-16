<?php
    global $db;
    include_once("../connect.php");
    if(isset($_GET["idTL"]))
    {
        $key=filter_input(INPUT_GET, "idTL");

    }
    $sl="delete from theloai where idTL=".filter_input(INPUT_GET, "idTL");

    $row_count = $db -> exec($sl);
    $error_message = "Xoa that bai!!!";

    if($row_count > 0)
    {
        echo "<script language='javascript'>alert('Xoa thanh cong');";
            echo "location.href='theloai.php';</script>";
    }
    else
	{
		echo 'Lỗi: ',display_db_error($error_message);
	}

?>
