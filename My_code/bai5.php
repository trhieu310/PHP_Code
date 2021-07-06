<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="bai5.css">
        <title>Chào các bạn</title>
    </head>

    <body>
        <?php
            // giai phuong trinh bac 1
            function giai_pt_bac_1($a,$b)
            {
                if ($a==0)
                {
                    if ($b==0)
                        $nghiem ="Phương trình có vô số nghiệm";
                    if ($b<>0)
                        $nghiem ="Phương trình vô nghiệm";
                    }
                else
                {
                    $nghiem = "x= ".round(-($b/$a),2);
                }
                return $nghiem;
            }

            // giai phuong trinh bac 2
            function giai_pt_bac_2($a,$b,$c)
            {
                if ($a==0)
                    $nghiem=giai_pt_bac_1($b,$c);
                if ($a<>0)
                {
                    $delta = pow($b,2)-4*$a*$c;
                    if ($delta < 0)
                        $nghiem="Phương trình vô nghiệm";
                    else
                    {
                        if ($delta==0)
                        {
                            $nghiem="Phương trình có nghiệm kép x1=x2=".-($b/2*$a);
                        }
                        else
                        {
                            $can=sqrt($delta);
                            $x1=(-$b+$can)/(2*$a);
                            $x2=(-$b-$can)/(2*$a);
                            $nghiem="Phương trình có 2 nghiệm phân biệt x1=".round($x1,2).",x2=".round($x2,2);
                        }
                    }
                }
                return $nghiem;
            }
            if (isset($_POST["a"]) && isset($_POST["b"]) && isset($_POST["c"]))
            {
                $nghiem=giai_pt_bac_2($_POST["a"],$_POST["b"],$_POST["c"]);
            }

        ?>

       <main>
            <form action="bai5.php" method="POST">
                <div class="title">
                    <h1>Giải phương trình bậc 2</h1>
                </div>
                <div class="data">
                    <div id="ptrinh">
                        <label><b>Phương trình</b></label>
                        <input type="text" placeholder="A" id="pt" name="a">
                        <label>&nbsp;X^2&nbsp;</label>
                        <input type="text" placeholder="B" id="pt" name="b">
                        <label>&nbsp;X&nbsp;+</label>
                        <input type="text" placeholder="C" id="pt" name="c">
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
