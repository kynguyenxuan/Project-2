<?php
require_once 'function.php';
session_start();
if (isset($_GET['IDsp'])){
    $idSP = $_GET['IDsp'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <script src="../Public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="../Public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../Public/bootstrap-3.3.7-dist/js/jquery-3.2.0.min.js"></script>
    <script src="../Public/JS/navbar.js"></script>
    <link rel="stylesheet" href="../Public/fontawesome-free-5.12.1-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Notable&family=Racing+Sans+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Public/CSS/call.css">
    <link rel="stylesheet" href="../Public/CSS/index3.css">
    <title>NXK Store - Điện thoại chính hãng, giá tốt nhất</title>
</head>
<body>
<div class="row headers">
    <div class="container">
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-hand-holding-usd"></i><a href="Trangchu.php"> Cam kết giá tốt nhất</a></span>
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-truck-moving"></i><a href="freeship.php">Miễn phí vận chuyển</a></span>
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-map-marked-alt"></i><a href="Trangchu.php">Thanh toán khi nhận hàng</a></span>
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-shield-alt"></i><a href="change_delivery.php">Đổi trả trong 7 ngày</a></span>
        <!--        <span class="topp"><a href="#">Bảo hành tận nơi</a></span>-->
    </div>
</div>
<!-- Header -->
<div class="row header">
    <div class="topnav" id="myTopnav">
        <a href="Trangchu.php" class="logo">
            <span class="logo1">NXK</span>
            <span class="logo2">STORE</span></a>
        <a href="Trangchu.php">Trang Chủ</a>
        <a href="introduce.php">Giới Thiệu</a>
        <a href="tel: 0976925608">Liên Hệ</a>

        <a href="javascript:void(0);"
           style="font-size:19px;"
           class="icon" onclick="myFunction()">&#9776;</a>

        <?php
        if (isset($_SESSION['account']) or isset($_SESSION['avatar']))
        {
            $prfuser = prf_user($_SESSION['id_kh']);
            $prf = mysqli_fetch_array($prfuser);
            $anhdd = $prf['avatar'];
            echo "<a class='regis_log' href='profile_user.php'>
                  <img src='../Images/$anhdd' alt=''>"."
                  <font style='color: bisque'>".$_SESSION['account']."</font></a>";
        }else
        {
            ?>
            <a href="register.php" class="regis_log"><span class="fa fa-user-plus"></span> Đăng Ký</a>
            <a class="regis_log" href="login.php"><span class="glyphicon glyphicon-log-in"></span> Đăng Nhập</a>
        <?php } ?>
        <a href="cart.php" class="regis_log">
            <i class="fa fa-cart-plus"></i>
        </a>
        <div class="search">
            <form action="result_search.php" method="post" class="form-inline">
                <input type="text" name="text_search" id="search" class="form-control text-search" placeholder="Tìm kiếm...">
                <input type="submit" value="Tìm kiếm" name="search" class="btn btn-warning">
            </form>
        </div>
    </div>
    <div class="row result-search">
        <div class="list-group col-md-5 col-md-offset-4" id="show-list">
            <!--            <a href="#" class="list-group-item border-1">List 1</a>-->
        </div>
    </div>
</div>

<!--  Body  -->
<div class="container">
    <!---------------Menu------------------>
    <div class="row menu">

        <!---------------Carousel------------->
        <div class="col-md-8">
            <div id="myCarousel" class="carousel slide s1" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="../Images/caro_1.webp" alt="LTPs2" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="../Images/caro_2.webp" alt="LTPs2" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="../Images/caro_3.jpg" alt="LTPs2" style="width:100%;">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <img src="../Images/banner_ipp11.webp" alt="" class="banner_top">
            <img src="../Images/banner_sss10.png" alt="" class="banner_center">
            <img src="../Images/banner-nho-2.jpg" alt="" class="banner_bottom">
        </div>

    </div>

    <div class="row logos">
        <?php
        $dsdmsp = ds_dmsp();
        while ($num = mysqli_fetch_array($dsdmsp))
        {
            ?>
            <a href="view_product_category.php?idxem=<?php echo $num['id_dmsp'];?>">
                <img src="../Images/<?php echo $num['logo_dmsp'];?>" alt="LTPs2">
            </a>
        <?php    }
        ?>
        <input class="toggle-box" id="identifier-1" type="checkbox">
        <label for="identifier-1">Xem thêm</label>
        <div class="logo_sp">
            <?php
            $dsdmsp_nine = ds_dmsp_nine();
            while ($num1 = mysqli_fetch_array($dsdmsp_nine))
            {
                ?>
                <a href="view_product_category.php?idxem=<?php echo $num['id_dmsp'];?>">
                    <img src="../Images/<?php echo $num1['logo_dmsp'];?>" alt="LTPs2">
                </a>
            <?php    }
            ?>
        </div>
    </div>

    <!---------------Điện thoại theo ID------------------>
    <div class="row ">
        <div class="col-md-6">

        </div>

        <div class="col-md-6"></div>
    </div>


</div>

<!----------------Back To Top------------------->

<div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left"
     title="Trở lên đầu trang">
    <span class="fas fa-chevron-circle-up"></span>
</div>
<!------------Call----------------->
<a id="calltrap-btn" class="b-calltrap-btn calltrap_offline hidden-phone visible-tablet"
   href="tel:0963785109" data-toggle="tooltip" title="Gọi ngay cho tôi" data-placement="right">
    <div id="calltrap-ico"></div>
</a>
<!-------------------Inbox------------------------->
<div class="float-ck">
    <div id="hide_float_right">

        <a href="javascript:hide_float_right()">
            <i class="fa fa-comment-alt"></i> Chat với nhân viên tư vấn !
            <span><i class="fas fa-minus"></i></span>
        </a>

    </div>
    <div id="float_content_right">
        <!– Start quang cao–>
        <div class="kh-ib">
            <br>
            <p><b>Nhập thông tin của bạn *</b></p>
            <form method="post">
                <p><input type="text" name="ten_ib" id=""></p>
                <p><input type="text" name="email_ibb" id=""></p>
                <p><input type="tel" name="sdt_ib" id=""></p>
                <b>Tin nhắn *</b>
                <textarea name="tin_ib" id="" cols="30" rows="7"></textarea>
                <hr>
                <button type="submit" class="btn btn-danger" name="send_ib">Gửi tin nhắn</button>
            </form>
        </div>

        <!– End quang cao –>

    </div>
</div>
<!-------------Footer------------->
<div class="row footer">
    <div class="fot col-md-3 col-sm-6 col-xs-6">
        <b>VỀ NXK STORE</b> <br>
        <a href="introduce.php">Giới thiệu về NXK Store</a> <br>
        <a href="pay.php">Thanh toán</a> <br>
        <a href="customer_care.php">Chăm sóc khách hàng</a> <br>
        <a href="data_backup.php">Quy định về việc sao lưu dữ liệu</a> <br>
        <a href="endow.php">Ưu đãi từ đối tác</a> <br>
        <a href="business_cooperation.php">Liên hệ hợp tác cùng NXK Store</a> <br>
    </div>
    <div class="fot col-md-3 col-sm-6 col-xs-6">
        <b>CHÍNH SÁCH & HỖ TRỢ</b> <br>
        <a href="online_shopping.php">Hỗ trợ mua hàng trực tuyến</a> <br>
        <a href="installment.php">Hướng dẫn mua trả góp</a> <br>
        <a href="freeship.php">Chính sách giao hàng</a> <br>
        <a href="information_security.php">Chính sách bảo mật thông tin</a> <br>
        <a href="warranty_policy.php">Chính sách bảo hành</a> <br>
        <a href="change_delivery.php">Chính sách đổi trả</a>
    </div>
    <div class="fot col-md-3 col-sm-6 col-xs-6">
        <b>THÔNG TIN LIÊN HỆ</b> <br>
        <i class="fas fa-map-marker-alt"></i>
        <span>Địa chỉ: <a target="_blank" href="https://www.google.com/maps/place/Thanh+Kh%C6%B0%C6%A1ng,
        +Thu%E1%BA%ADn+Th%C3%A0nh,+B%E1%BA%AFc+Ninh,+Vi%E1%BB%87t+Nam/@21.0400723,106.0488247,15z/data=!3m1!4b1
        !4m5!3m4!1s0x3135a72eadcd04e5:0xf552432483b286a0!8m2!3d21.0370993!4d106.0552006">
                Thanh Khương - Thuận Thành - Bắc Ninh</a></span> <br>
        <i class="fas fa-mobile-alt"></i>
        <span>Điện thoại: <a href="tel: 0976789999">0976 789 999</a></span> <br>
        <i class="fas fa-phone-volume"></i>
        <span>Hotline: <a href="tel: 0976925608">0976 025 608</a></span> <br>
        <i class="fas fa-envelope-open-text"></i>
        <span>Email: <a href="https://www.google.com/gmail">Xuanki17@gmail.com</a></span>
    </div>
    <div class="fot col-md-3 col-sm-6 col-xs-6 map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14895.
            26147424882!2d106.04882467687355!3d21.04007232587423!2m3!1f0!2f0!3f0!
            3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a72eadcd04e5%3A0xf552432483b286
            a0!2zVGhhbmggS2jGsMahbmcsIFRodeG6rW4gVGjDoG5oLCBC4bqvYyBOaW5oLCBWaeG7h3Qg
            TmFt!5e0!3m2!1svi!2s!4v1676708919152!5m2!1svi!2s"
                width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                 referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<div class="row follow">
    <div class="fot col-md-12 col-sm-12 col-xs-12 text-center">
        <h4><b>Theo dõi chúng tôi</b></h4>
        <a href="#"><div class="fab fa-facebook"></div> <span>Facebook</span></a>
        <a href="#"><div class="fab fa-instagram"></div> <span>Instagram</span></a>
        <a href="#"><div class="fab fa-twitter"></div> <span>Twitter</span></a>
        <a href="#"><div class="fab fa-youtube"></div> <span>Youtube</span></a>
    </div>
</div>
</body>
</html>
<script src="../Public/JS/carousel.js"></script>
<script src="../Public/JS/search.js"></script>