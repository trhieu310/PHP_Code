<!DOCTYPE html>
<html>
    <head>
        <title>ĐẾM SỐ LẦN XUẤT HIỆN VÀ TẠO MẢNG DUY NHẤT</title>
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
        input{
            width: 100%;
        }
        </style>
    </head>
    <body>
        <?php
            $mang_so = array();
            $mang_duy_nhat = array();
            $so_lan = array();

            if(isset($_POST['nhap_mang'])){
                $mang_so = explode(",", $_POST['nhap_mang']);
                $mang_duy_nhat = array_unique($mang_so);
                $so_lan = array_count_values($mang_so);
            }

            $chuoi = "";
            foreach($so_lan as $key => $value){
                $chuoi = $chuoi.$key . ":". $value . " ";
            }

            function mang_duy_nhat($mang_so){
                if(isset($mang_so[0])){
                    echo implode(", ", $mang_so);
                }
            }

        ?>
        <head>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link"  href="bai6_1.php">Bài 6 - 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "  href="bai6_2.php">Bài 6 - 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="bai6_3.php">Bài 6 - 3</a>
                </li>
            </ul>
        </head>
        <form action="bai6_3.php" method="POST">
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="2" style="text-align: center;">ĐẾM SỐ LẦN XUẤT HIỆN VÀ TẠO MẢNG DUY NHẤT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mảng:</td>
                        <td><input type="text" name="nhap_mang" value="<?php if(isset($_POST['nhap_mang'])) echo $_POST['nhap_mang']; ?>" ></td>
                    </tr>
                    <tr>
                        <td>Số lần xuất hiện:</td>
                        <td><input type="text" name="so_lan_xuat_hien" value="<?php echo $chuoi; ?>" disabled="disabled" ></td>
                    </tr>
                    <tr>
                        <td>Mảng duy nhất:</td>
                        <td><input type="text" name="mang_duy_nhat" value="<?php mang_duy_nhat($mang_duy_nhat); ?>" disabled="disabled" ></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Thực hiện"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
