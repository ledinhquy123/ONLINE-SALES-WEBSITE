<div class="header__one">
    <ul class="header__one--list">
        <li class="header__one__item">
            <p>ADMIN</p>
        </li>
        <li class="header__one__item">
            <a href="../php/">
                <i class="ti-home"></i>
            </a>
        </li>
        <li class="header__one__item">
            <a href="../chi_nhanh/show.php">Chi Nhánh</a>
        </li>
        <li class="header__one__item">
            <a href="../don_hang/show.php">Đơn hàng</a>
        </li>
        <li class="header__one__item">
            <a href="../khach_hang/show.php">Khách hàng</a>
        </li>
        <li class="header__one__item">
            <a href="../menu/show.php">Menu</a>
        </li>
        <li class="header__one__item">
            <a href="../nhan_vien/show.php">Nhân Viên</a>
        </li>
        <li class="header__one__item">
            <a href="../tai_khoan/show.php">Tài khoản</a>
        </li>
    </ul>
</div>
<div class="header__two">
    <div class="header__two__item icon">
        <i class="ti-user"></i>
    </div>
    <div class="header__two__item info">
        <a href="#">
            <?php
            session_start();
            if (isset($_SESSION['account'])) {
                if($_SESSION['account'][1] == "admin") echo $_SESSION["account"][0];
                else{
                    echo '
                        <script> alert("Tài khoản không hợp lệ!"); window.location.href="../../Login/Login.php" </script>
                    ';
                }
            } else {
                echo '<script> 
                    alert("Bạn cần phải đăng nhập!");
                    window.location.href = "../../Login/Login.php";
                </script>';
            }
            ?>
        </a>
        <div class="header__two--logout">
            <a href="../../Login/Logout.php">Đăng xuất</a>
        </div>
    </div>
</div>