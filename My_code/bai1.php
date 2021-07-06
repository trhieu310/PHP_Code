<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="bai1.css">
        <title>Chào các bạn</title>
    </head>

    <body>
        <?php
            if (null !== (filter_input(INPUT_POST, 'ten')))
            {
                $ten = filter_input(INPUT_POST, 'ten');
                $xuat_ten="Chào bạn ".$ten;

            }
        ?>
        <main>
            <form action="bai1.php" method="post">

                <div id="title">
                    <h1>In lời chào</h1><br>
                </div>
                <div id="data">
                    <label><b>Họ tên bạn:</b></label>
                    <input type="text" name="ten"/><br>

                    <br>
                    <span><b><?php if (isset($_POST["ten"])){echo $xuat_ten;}?></b></span>
                    <br><br>
                </div>

                <div id="buttons">
                    <label>&nbsp;</label>
                    <input type="submit" value="Xuất"><br>
                </div>

            </form>
        </main>
    </body>
</html>
