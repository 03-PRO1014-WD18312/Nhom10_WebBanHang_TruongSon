<?php
if(isset($_SESSION['user'])){
extract($taikhoan);
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <div class="container">
        <nav>
            <div class="logo">
                <img src="./img/logohome.jpg" alt="">
            </div>
            <ul class="nav-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?act=sanpham">Sản Phẩm</a></li>
                <li class="dropdown">
                    <a class="dropdownbtn" href="index.php?act=sanpham">Danh Mục<i class="bi bi-arrow-down-short" style="font-size: 20px;"></i></a>
                    <div class="dropdown_content">
                        <?php
                        foreach ($dsdm as $dm){
                            extract($dm);
                            $linkdm="index.php?act=sanpham&iddm=".$id;
                            echo '<a href="'.$linkdm.'">'.$name.'</a>';
                        }
                        ?>
                    </div>
                </li>

                <li><a href="">Phòng</a></li>
                <li><a href="">Dịch Vụ</a></li>
                <li><a href="">Thông Tin</a></li>
                <li><a href="">Tổng Quan</a></li>
                <li><a href="index.php?act=mybill">Đơn Hàng</a></li>
            </ul>
            <ul class="nav-right">
                <form class="f1" action="index.php?act=sanpham" method="POST">
                    <input  type="text" placeholder="Bạn Muốn Tìm Kiếm..." name="keyword" >
                    <input class="sub" type="submit" value="Tìm Kiếm">
                </form>
                <a href="index.php?act=viewcart"><img> <i class="bi bi-cart" style="font-size: 45px;"></i></a>
                <?php if(!isset($_SESSION['user'])){ ?>
                <a href="index.php?act=dangky"> <i class="bi bi-person-circle" style="font-size: 45px;margin-left: 15px;margin-right: 25px;"></i></a>
                <?php }else{ 
                    if($img!=""){
                    ?>
                    <a href="index.php?act=dangky">    <img src="upload/<?php echo $img ?>" alt="" width="50px" height="50px" style="border-radius:60%; border: 2px solid gray;margin-right: 20px;"></a>
                <?php }else{
                    ?>
                    <a href="index.php?act=dangky">    <img src="upload/avatar.webp" alt="" width="50px" height="50px" style="border-radius:60%; border: 2px solid gray;margin-right: 20px;"></a>
                    <?php
                }} ?>
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
        