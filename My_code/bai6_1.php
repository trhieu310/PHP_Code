<!DOCTYPE html>
<html>
<head>
	<title>Nhập và tính toán trên dãy số</title>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<style>
        *{
            font-family: Tahoma;
        }
        form {
            width: 410px;
            margin: 0 auto;
            background-color: cornflowerblue;
            border: 1px;
            border-radius: 20px;
        }
        table{
            width: 350px;
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
        $ket_qua = 0;
        $mang_so = 0;
        if(isset($_POST['btn_goi'])){
            $mang_so = explode(",", $_POST['nhap_mang']);
            $n = count($mang_so);
            for($i = 0; $i < $n; $i++){
                $ket_qua += $mang_so[$i];
            }
        }
    ?>

    <head>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="bai6_1.php">Bài 6 - 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bai6_2.php">Bài 6 - 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bai6_3.php">Bài 6 - 3</a>
            </li>
        </ul>
    </head>
	<main>
        <form method="POST" action="bai6_1.php">
            <table>
                <thead>
                    <tr>
                        <th colspan="2" style="text-align: center;">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nhập dãy số:</td>
                        <td><input type="text" name="nhap_mang" value="<?php if(isset($_POST['nhap_mang'])) echo $_POST['nhap_mang'] ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="btn_goi" value="Tổng dãy số" ></td>
                    </tr>
                    <tr>
                        <td>Tổng dãy số:</td>
                        <td><input type="text" name="ket_qua" disabled="disabled" value="<?php if(isset($ket_qua)) echo $ket_qua ?>" ></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </main>
</body>
</html>
