<div class="logo">
    <i onclick="showModal()" class="ti-menu"></i>
</div>
<div class="header--once">
    <ul class="header--once__list">
        <li class="header--once__item"><a href="index.php">Trang chủ</a></li>
        <li class="header--once__item parent">
            <a href="#">Phân loại</a>
            <ul class="header__child">
                <li class="header__child__item"><a href="type.php?tag=0&page=1">Tất cả</a></li>
                <li class="header__child__item"><a href="type.php?tag=1&page=1">Đồ ăn</a></li>
                <li class="header__child__item"><a href="type.php?tag=2&page=1">Đồ uống</a></li>
                <li class="header__child__item"><a href="type.php?tag=3&page=1">Đồ tráng miệng</a></li>
            </ul>
        </li>
        <li class="header--once__item"><a href="shop.php">Cửa hàng</a></li>
        <li class="header--once__item"><a href="cart.php">Đặt hàng</a></li>
    </ul>
</div>

<div class="header--two">
    <ul class="header--two__list">
        <div class="icon--cart">
            <?php
                $quantity = 0;
                if(isset($_SESSION["arr"])){
                    $quantity = count($_SESSION["arr"]);
                }
                echo '<a href="cart.php"><i class="ti-shopping-cart"></i>('.$quantity.')</a>';
            ?>
        </div>
        <div class="icon--user"><i class="ti-user"></i></div>
        <li class="header--two__item parent">
            <a href="#">
                <?php
                    if($_SESSION['account'][1] != "admin") echo $_SESSION["account"][0];
                    else{
                        echo '
                            <script> alert("Tài khoản không hợp lệ!"); window.location.href="../Login/Login.php" </script>
                        ';
                    }
                ?>
            </a>
            <ul class="user__child">
                <li class="user__child__item">
                    <a href="../Login/Logout.php">Đăng Xuất</a>
                </li>
            </ul>
        </li>
        <li class="header--two__item icon"><a href="search.php"><i class="ti-search"></i></a></li>
    </ul>
</div>