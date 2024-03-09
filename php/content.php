<div class="slider">
    <img id="img" onclick="changeImage()" src="../img/slider1.jpg" width="1520" height="700" alt="Ảng slider">
</div>

<div class="text">
    <h2>Giảm giá sốc!!!</h2> <br />
    Khám phá nhiều ưu đãi hấp dẫn
</div>
<div class="promotion">
    <?php
    $control_form = new control_form();
    $result = $control_form->getMenu();
    $cnt = 1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($cnt == 4)
                break;
            echo '
                <div class="promotion__child">
                    <a href="detail.php?pid='.$row["tenMenu"].'"> <img src="../img/' . $row["maMenu"] . '.jpg" width="300" height="200" border="2px solid #ccc" alt="Ảnh đồ ăn"> </a>
                    <p class="promotion__child--name">' . $row["tenMenu"] . '</p>
                    <p class="promotion__child--price">
                        Giá: <del>' . $row["donGia"] . 'VNĐ</del>
                        ' . $row["donGia"] / 2 . 'VNĐ
                    </p>
                    <a class="btn" href="process.php?name='.$row["tenMenu"].'">Mua hàng</a>
                    <a class="btn" href="process.php?name='.$row["tenMenu"].'">Thêm vào giỏ hàng</a>
                </div>
            ';
            $cnt++;
        }
    }
    ?>
    <div class="promotion__child--btn">
        <a href="promotion.php?page=1">>> Xem thêm</a>
    </div>
</div>

<div class="type--container">
    <div class="type">
        <div class="type__item">
            <img src="../img/posterDoAn.jpg" width="180" height="150" alt="Ảnh đồ ăn">
            <div class="type__item--content">
                <div class="type__item--header"><a href="type.php?tag=1&page=1">Đồ ăn</a></div>
                <div class="type__item--desc">
                    Hãy nhanh tay mua các món ăn ngon tại Cửa Hàng.
                    Khi bạn không có nhiều thời gian để nấu ăn thì Cửa Hàng chúng tôi là sự lựa chọn hợp lí.
                    Còn chờ gì nữa chúng tôi đang có rất nhiều khuyến mãi đang chờ bạn!
                </div>
            </div>
        </div>

        <div class="type__item">
            <img src="../img/posterDoUong.jpg" width="180" height="150" alt="Ảnh đồ ăn">
            <div class="type__item--content">
                <div class="type__item--header"><a href="type.php?tag=2&page=1">Đồ uống</a></div>
                <div class="type__item--desc">
                    Sau khi ăn những món ăn ngon tại cửa hàng bạn nên uống chút gì đỡ khát nhỉ?
                    Hãy nhanh tay mua những đồ uống của chúng tôi nó sẽ giúp bạn thấy đỡ khát và sảng khoái hơn đó.
                </div>
            </div>
        </div>

        <div class="type__item">
            <img src="../img/posterDoTrangMieng.jpg" width="180" height="150" alt="Ảnh đồ ăn">
            <div class="type__item--content">
                <div class="type__item--header"><a href="type.php?tag=3&page=1">Đồ tráng miệng</a></div>
                <div class="type__item--desc">
                    Còn gì hơn khi dùng xong bữa mà có đồ tráng miệng nó sẽ là một sựa lựa chon tuyệt vời dành cho bạn
                    đó.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="introduce--container">
    <div class="introduce">
        <div class="introduce__item">
            <div class="introduce__item--header">Không đợi chờ</div>
            <div class="introduce__item--desc">
                Thưởng thức món ăn yêu thích tại địa điểm yêu thích trong vòng 30 phút
            </div>
            <div class="introduce__item--icon"><i class="ti-timer"></i></div>
        </div>
        <div class="introduce__item">
            <div class="introduce__item--header">Thanh toán linh hoạt</div>
            <div class="introduce__item--desc">
                Thanh toán dễ dàng với tiền mặt hoặc các phương thức thanh toán trực tuyến phổ biến.
            </div>
            <div class="introduce__item--icon"><i class="ti-wallet"></i></div>
        </div>
        <div class="introduce__item">
            <div class="introduce__item--header">Tận hưởng dịch vụ</div>
            <div class="introduce__item--desc">
                Món ăn đa dạng, đặt hàng dễ dàng, theo dõi đơn tiện lợi, đổi trả món nhanh chóng.
            </div>
            <div class="introduce__item--icon"><i class="ti-heart"></i></div>
        </div>
    </div>
</div>

<div class="story--container">
    <div class="story">
        <img src="../img/dauBep1.jpg" width="220" height="220" alt="Ảnh đầu bếp">
        <div class="story--info">
            <div class="story--header">
                Câu Chuyện Của Cửa Hàng
            </div>
            <div class="story--desc">
                Chỉ mất 30 phút để thưởng thức những món ăn chất lượng nhất từ cửa hàng - mô hình bếp đa phong cách.
                Dù là giao hàng tận nơi hay đặt trước và dùng bữa tại chỗ,
                cửa hàng luôn sẵn sàng mang đến cho bạn trải nghiệm ẩm thực tuyệt vời nhất!
            </div>
            <div class="story--btn">
                <a href="about.php">Tìm hiểu thêm</a>
            </div>
        </div>
    </div>
</div>