<!DOCTYPE html>
<?php
    require_once("../controler/control_form.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>ĐỒ ĂN NHANH</title>
    <style>
        .about{
            margin-top: 40px;
        }
        .pagination{
            display: flex;
            list-style: none;
            justify-content: center;
            min-height: 50px;
            align-items: center;
        }
        .pagination__item{
            margin: 0 8px;
            border: 1px solid #0cc;
            padding: 2px 8px;
            background-color: #fff;
        }
        .pagination__item a{
            text-decoration: none;
            color: #000;
        }
        .extra a{
            font-weight: 800;
        }
    </style>
</head>

<body>
    <div class="container">

        <!-- Begin header -->
        <div class="header">
            <?php  
                session_start();
                if(isset($_SESSION["account"])){
                    include_once("header_accept.php");
                }else include_once("header.php");
            ?>
        </div>
        <!-- End header -->

        <!-- Begin content -->
        <div class="about">
            <?php
                if(isset($_GET['page'])){
                    $tag = ""; $result = ""; $text = ""; $n = 0;
                    if(isset($_GET["tag"])) $tag = $_GET["tag"];
                    $control_form = new control_form();
                    if($tag == 0){
                        $result = $control_form->getMenuLimit($_GET['page']);
                        $n = $control_form->getMenu()->num_rows;
                        $text = "Tất cả";
                    }else if($tag == 1){
                        $result = $control_form->getDoAnLimit($_GET['page']);
                        $n = $control_form->getDoAn()->num_rows;
                        $text = "Đồ ăn";
                    }
                    else if($tag == 2){
                        $result = $control_form->getDoUongLimit($_GET['page']);
                        $n = $control_form->getDoUong()->num_rows;
                        $text = "Đồ uống";
                    }
                    else{
                        $result = $control_form->getDoTrangMiengLimit($_GET['page']);
                        $n = $control_form->getDoTrangMieng()->num_rows;
                        $text = "Đồ tráng miệng";
                    }
                }
            ?>
            <div class="text">
                <h2><?php echo $text ?></h2>
                Khám phá nhiều ưu đãi hấp dẫn
            </div>
            <div class="promotion">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                            <div class="promotion__child">
                                <a href="detail.php?pid='.$row["tenMenu"].'"><img src="../img/' . $row["maMenu"] . '.jpg" width="300" height="200" alt="Ảnh đồ ăn"></a>
                                <p class="promotion__child--name">' . $row["tenMenu"] . '</p>
                                <p class="promotion__child--price">
                                    Giá: ' . $row["donGia"] . 'VNĐ
                                </p>
                                <a class="btn" href="process.php?name='.$row["tenMenu"].'">Mua hàng</a>
                                <a class="btn" href="process.php?name='.$row["tenMenu"].'">Thêm vào giỏ hàng</a>
                            </div>
                        ';
                    }
                }
                ?>
            </div>
            <ul class="pagination">
                <?php
                    for($i = 1; $i <= ceil($n / 8); ++$i){
                        if(isset($_GET["page"]) && $_GET['page'] == $i){
                            echo '<li class="pagination__item extra"><a href="type.php?tag='.$tag.'&page='.$i.'">'.$i.'</a></li>';
                        }else echo '<li class="pagination__item"><a href="type.php?tag='.$tag.'&page='.$i.'">'.$i.'</a></li>';
                    }
                ?>
            </ul>
        </div>
        <!-- End content -->
       
        <!-- Begin footer -->
        <div class="footer--container">
            <?php include_once("footer.php") ?>
        </div>
        <!-- End footer -->

        <!-- Begin modal -->
        <div class="modal">
            <?php include_once("modal.php") ?>
        </div>
        <!-- End modal -->
    </div>

    <script src="../js/web.js"></script>
</body>

</html>