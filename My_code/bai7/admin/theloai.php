<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
    </head>

    <body>
        <?php
            global $db;
            include_once('../connect.php');
        ?>
        <table align="center" border="1" width="600">
            <tr align="center">
                <td>Ten The Loai</td>
                <td>Thu Tu</td>
                <td>An Hien</td>
                <td>Bieu tuong</td>
                <td colspan="2"><a href="theloai_them.php">Them</a></td>
            </tr>
            <?php
                $sql= "select * from theloai";
                $statement = $db -> prepare($sql);
                $statement -> execute();
                $result = $statement -> fetchAll();
                foreach ($result as $value) {
            ?>
            <tr align="center">
                <td>
                    <?php echo $value['TenTL']; ?>
                </td>
                <td>
                    <?php echo $value['ThuTu']; ?>
                </td>
                <td>
                    <?php if ($value['AnHien'] == 1)
                                            {
                                                echo "Hien";
                                            }
                                            else
                                            {
                                                echo "An";
                                            }
                                            ?>
                </td>
                <td>
                    <?php echo $value['icon'];
                        $data = $value['icon'];
                    ?>
                    <img src="image/<?php echo $data?>" width="40px" height="40px" />
                </td>
                <td>
                    <a href="theloai_sua.php?idTL=<?php echo $value['idTL'];?>">Sua</a>
                </td>
                <td>
                    <a href="theloai_xoa.php?idTL=<?php echo $value['idTL'];?>" onclick="return confirm('Ban co chac chan khong?');">xoa</a>
                </td>
            </tr>
            <?php
                }
                $statement -> closeCursor();
            ?>
        </table>
    </body>
</html>
