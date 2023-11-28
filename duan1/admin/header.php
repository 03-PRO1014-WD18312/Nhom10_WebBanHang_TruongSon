
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
<div class="container">
    <nav>
        <div class="logo">
            <img src="../img/logo.jpg" alt="">
        </div>
        <ul class="nav-menu">
            <li><a href="index.php?act=listsp">Trang chủ</a></li>
            <li><a href="index.php?act=listbill">bill</a></li>
            <li><a href="index.php?act=bieudo">Biểu Đồ Sản Phẩm</a></li>
            <li><a href="index.php?act=bieudosp">Biểu Đồ Bình luận</a></li>
            <li><a href="index.php?act=thongke">Thống kê</a></li>
            <li><a href="index.php?act=thongkebl">Bình Luận</a></li>

        </ul>
        <ul class="nav-right">
            <form class="f1" action="index.php?act=sanpham" method="POST">
                <input type="text" placeholder="Bạn Muốn Tìm Kiếm..." name="keyword" required>
                <input class="sub" type="submit" value="Tìm Kiếm">
            </form>
            <a href="index.php?act=viewcart"><img class="img1" src="../img/logoshop.jpg" alt=""></a>
            <a style="color:#fff; margin-top:25px" href="http://localhost/Duan/Nhom10_WebBanHang_TruongSon/duan1/index.php?act=dangxuat">Đăng Xuất</a>
        </ul>
    </nav>
    <div class="navbar">
        <div class="navbar1">
            <div class="running-text">
                    <span>Chào mừng bạn đến với trang web bán hàng của chúng tôi!
                        Chúng tôi rất vui mừng bạn đã ghé thăm và quan tâm đến các sản phẩm mà chúng tôi cung cấp.</span>
            </div>
        </div>
    </div>