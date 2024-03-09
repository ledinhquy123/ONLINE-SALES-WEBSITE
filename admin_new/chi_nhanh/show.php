<?php require_once("../../controler/control_form.php") ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/admin_css.css">
        <link rel="stylesheet" href="../../themify-icons/themify-icons.css">
        <title>CHI NHÁNH</title>
        <?php
            $control = new control_form();
            if(isset($_GET['delete'])){
                $control->deleteChiNhanh($_GET['delete']);
                echo '
                    <script> 
                        alert("Xóa thành công"); window.location.href="show.php";
                    </script>
                ';
            }
        ?>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <?php include_once("../php/header.php") ?>
            </div>

            <div class="content">
                <p>Quán Lí Chi Nhánh</p>
                <table>
                    <tr>
                        <th>Ảnh chi nhánh</th>
                        <th>Mã chi nhánh</th>
                        <th>Tên chi nhánh</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th><a href="insert.php"> Thêm </a></th>
                    </tr>
                    <?php
                        $result = $control->getChiNhanh();
                        while($row = $result->fetch_assoc()){
                            echo '
                                <tr>
                                    <td><img src="../../img/'.$row['maChiNhanh'].'.jpg" width="140" height="100" alt="Ảnh chi nhánh"></td>
                                    <td>'.$row['maChiNhanh'].'</td>
                                    <td>'.$row['tenChiNhanh'].'</td>
                                    <td>'.$row['diaChi'].'</td>
                                    <td>'.$row['soDienThoai'].'</td>
                                    <td> <a href="update.php?update='.$row['maChiNhanh'].'"> Sửa </a> </td>
                                    <td> <a href="show.php?delete='.$row['maChiNhanh'].'"> Xóa </a> </td>
                                </tr>
                            ';
                        }
                    ?>
                </table>
            </div>

            <div class="footer">
                <?php include_once("../php/footer.php") ?>
            </div>
        </div>
    </body>
</html>