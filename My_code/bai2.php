<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="bai2.css">
        <title>Chào các bạn</title>
    </head>

    <body>
        <?php
            $input_a = filter_input(INPUT_POST, 'a', FILTER_VALIDATE_FLOAT);
            $input_b = filter_input(INPUT_POST, 'b', FILTER_VALIDATE_FLOAT);
            if (isset($input_a) && isset($input_b))
            {
                $a = $input_a;
                $b = $input_b;
                if ($a == 0)
                {
                    if ($b == 0)
                        $nghiem = "Phương Trình có vô số nghiệm";
                    if ($b != 0)
                        $nghiem = "Phương Trình vô nghiệm";
                } else {
                    $x= -($b/$a);
                    $x=round($x,2);
                    $nghiem= "x= $x";
                }
            }
        ?>
       <main>
            <form action="bai2.php" method="POST">
                <div class="title">
                    <h1>Giải phương trình bậc 1</h1>
                </div>
                <div class="data">
                    <div id="ptrinh">
                        <label><b>Phương trình</b></label>
                        <input type="text" placeholder="A" id="pt" name="a">
                        <label>&nbsp;X&nbsp;+</label>
                        <input type="text" placeholder="B" id="pt" name="b">
                        <label>&nbsp;=&nbsp;0</label>
                    </div>
                    <br/>
                    <div id="nghiem">
                        <label><b>Nghiệm</b></label>
                        <input type="text" id="rs" value="<?php  if(isset($nghiem)) echo $nghiem; ?>">
                    </div>
                </div>
                <br/>
                <div class="buttons">
                    <label>&nbsp;</label>
                    <center><input type="submit" value="Xuất" id="btn"></center><br>
                </div>
            </form>
       </main>
    </body>
</html>
