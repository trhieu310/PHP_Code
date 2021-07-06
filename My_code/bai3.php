<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Xuất số thành chữ</title>
    </head>
    <body>
        <?php
            $input = filter_input(INPUT_POST, 'so');
            if (isset($input))
            {
                if(is_numeric($input))
                {
                    switch($input)
                    {
                        case 0:
                            $chu="Không";
                            break;
                        case 1:
                            $chu="Một";
                            break;
                        case 2:
                            $chu="Hai";
                            break;
                        case 3:
                            $chu="Ba";
                            break;
                        case 4:
                            $chu="Bốn";
                            break;
                        case 5:
                            $chu="Năm";
                            break;
                        case 6:
                            $chu="Sáu";
                            break;
                        case 7:
                            $chu="Bảy";
                            break;
                        case 8:
                            $chu="Tám";
                            break;
                        case 9:
                            $chu="Chín";
                            break;
                        default:
                            $chu="Không hợp lệ";
                            break;
                    }
                }
            }
        ?>
        <form action="bai3.php" method="POST">
            <table width="519" border="3">
                <tr>
                    <td colspan="3" style="text-align: center; font-size: 18px; font-weight: bold;">Đọc số</td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold;">Nhập số (0-9)</td>
                    <td width="69" rowspan="2">
                        <input type="submit" name="button" id="button" value="Submit" style="text-align: center;" />
                    </td>
                    <td style="text-align: center; font-weight: bold;"> Bằng chữ</td>
                </tr>
                <tr>
                    <td width="177">
                    <p>
                        <label for="textfield"></label>
                        <input type="text" name="so" id="textfield" />
                    </p>
                </td>
                <td width="232"><label for="textfield2"></label>
                    <input type="text" name="chu" id="textfield2" value="<?php if(isset($chu)) echo $chu;?> "/>
                </td>
                </tr>
            </table>
        </form>
    </body>
</html>
