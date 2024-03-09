<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tìm Kiếm</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../themify-icons/themify-icons.css">
        <link rel="stylesheet" href="../css/search_layout.css">
        <style>
            .promotion{
                min-height: 100px;
                padding: 32px 0;
            }
            .promotion__child{
                display: inline-block;
                padding: 0 8px;
            }
            h1{
                color: red;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <?php  
                session_start();
                if(isset($_SESSION["account"])){
                    include_once("header_accept.php");
                }else include_once("header.php");
            ?>
            </div>
        </div>    

        <div class="search-container">
            <div class="form--layout">
                <form action="" method="post">
                    <div class="text">Tìm Kiếm</div>
                    <div class="content">
                        <input type="text" name="text" id="" placeholder="Nhập từ khóa">
                        <button type="submit">
                            <i class="ti-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <h1>Các sản phẩm tìm kiếm</h1>
        <div class="promotion">
            <?php 
                require_once("../controler/control_form.php");
                if(isset($_POST["text"])){
                    $text = $_POST["text"];
                    $control = new control_form();
                    if(strtolower($text) == "đồ ăn" || strtolower($text) == "do an") $result = $control->getTheLoai("TL01");
                    else if(strtolower($text) == "đồ uống" || strtolower($text) == "do uong") $result = $control->getTheLoai("TL02");
                    else if(strtolower($text) == "đồ tráng miệng" || strtolower($text) == "do trang mieng") $result = $control->getTheLoai("TL03");
                    else if(is_numeric($text)) $result = $control->getGia($text);
                    else $result = $control->getTenMenu($text);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                                <div class="promotion__child">
                                    <a href="detail.php?pid='.$row["tenMenu"].'"> <img src="../img/' . $row["maMenu"] . '.jpg" width="300" height="200" border="2px solid #ccc" alt="Ảnh đồ ăn"> </a>
                                    <p class="promotion__child--name">Tên đô ăn: ' . $row["tenMenu"] . '</p>
                                    <p class="promotion__child--price">
                                        Giá: ' . $row["donGia"] . 'VNĐ
                                    </p>
                                    <button type="submit">Mua hàng</button>
                                    <button type="submit">Thêm giỏ hàng</button>
                                </div>
                            ';
                        }
                    }
                }
            ?>
        </div>

        <div class="footer">
            <?php include_once("footer.php") ?>
        </div>

        <div class="modal">
            <?php include("modal.php") ?>
        </div>
        <script src="../js/web.js"></script>
    </body>
</html>