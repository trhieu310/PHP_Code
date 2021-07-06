<!DOCTYPE html>
<html>
<head>
	<title>PHÁT SINH MẢNG VÀ TÍNH TOÁN</title>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<style>
	*{
    font-family: Tahoma;
	}
	table{
	    width: 400px;
	    margin: 100px auto;
	}
	table th{
	    background: #66CCFF;
	    padding: 10px;
	    font-size: 18px;
	}
	</style>
</head>
<body>
    <?php
        $n = filter_input(INPUT_POST, 'so_phan_tu', FILTER_VALIDATE_INT);
        $mang_so = array($n);
        for($i = 0; $i < $n; $i++){
            $mang_so[$i] = mt_rand(0,20);
        }

        function xuat_mang($mang_so){
            echo implode(" ", $mang_so);
        }

        function tim_min($mang_so){
            if(isset($mang_so[0])){
                $min = $mang_so[0];
                $n = count($mang_so);
                for($i = 1; $i < $n; $i++){
                    if($mang_so[$i] < $min)
                        $min = $mang_so[$i];
                }
                echo $min;
            }
        }

        function tim_max($mang_so){
            if(isset($mang_so[0])){
                $max = $mang_so[0];
                $n = count($mang_so);
                for($i = 1; $i < $n; $i++){
                    if($mang_so[$i] > $max){
                        $max = $mang_so[$i];
                    }
                }
                echo $max;
            }
        }

        function tinh_tong($mang_so){
            $tong_so = 0;
            $n = count($mang_so);
            for($i = 0; $i < $n; $i++)
                $tong_so += $mang_so[$i];
            echo $tong_so;
        }

    ?>
    <head>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link"  href="bai6_1.php">Bài 6 - 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="bai6_2.php">Bài 6 - 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bai6_3.php">Bài 6 - 3</a>
            </li>
        </ul>
    </head>
	<form action="bai6_2.php" method="POST">
		<table border="2">
			<thead>
				<tr>
					<th colspan="2" style="text-align: center;">PHÁT SINH MẢNG VÀ TÍNH TOÁN</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Nhập số phần tử:</td>
					<td><input type="text" name="so_phan_tu" width="100%" ></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Phát sinh và tính toán"></td>
				</tr>
				<tr>
					<td>Mảng: </td>
					<td><input type="text" name="mang_so" value="<?php if(null != xuat_mang($mang_so)) echo xuat_mang($n); ?>"></td>
				</tr>
				<tr>
					<td>GTLN ( MAX ) trong mảng: </td>
					<td><input type="text" name="gtln"  value="<?php if(null != tim_max($mang_so)) echo tim_max($mang_so); ?>"></td>
				</tr>
				<tr>
					<td>GTNN ( MIN ) trong mảng: </td>
					<td><input type="text" name="ttnn" value="<?php if(null != tim_min($mang_so)) echo tim_min($mang_so); ?>"></td>
				</tr>
				<tr>
					<td>Tổng mảng: </td>
					<td><input type="text" name="tong" value="<?php if(null != tinh_tong($mang_so)) echo tinh_tong($mang_so); ?>"></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
</html>

