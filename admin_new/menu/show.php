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
                $control->deleteMenu($_GET['delete']);
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
                <p>Quán Lí Menu</p>
                <table>
                    <tr>
                        <th>Ảnh menu</th>
                        <th>Mã menu</th>
                        <th>Tên menu</th>
                        <th>Đơn giá</th>
                        <th>Đơn vị tính</th>
                        <th>Mã thể loại</th>
                        <th>Mô tả hình ảnh</th>
                        <th><a href="insert.php"> Thêm </a></th>
                    </tr>
                    <?php
                        $result = $control->getMenu();
                        while($row = $result->fetch_assoc()){
                            echo '
                                <tr>
                                    <td><img src="../../img/'.$row['maMenu'].'.jpg" width="140" height="100" alt="Ảnh chi nhánh"></td>
                                    <td>'.$row['maMenu'].'</td>
                                    <td>'.$row['tenMenu'].'</td>
                                    <td>'.$row['donGia'].'</td>
                                    <td>'.$row['donViTinh'].'</td>
                                    <td>'.$row['maTheLoai'].'</td>
                                    <td>'.$row['moTaHinhAnh'].'</td>
                                    <td> <a href="update.php?update='.$row['maMenu'].'"> Sửa </a> </td>
                                    <td> <a href="show.php?delete='.$row['maMenu'].'"> Xóa </a> </td>
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