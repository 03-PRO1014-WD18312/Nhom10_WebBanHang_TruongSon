<div >
            <img class="banner" id="banner" src="./img/banner5.jpg" alt="">
        </div>
        <div class="a1">
            <div class="a2">
                <img class="img2" src="img/giaohang.jpg" alt="" width="100px" height="100px">
                <h4>GIao Hàng TOàn Quốc</h4>
                <p>Vặn Chuyển Khắp Việt Nam</p>
            </div>
            <div  class="a2">
                <img class="img2" src="img/vi.jpg" alt=""width="100px" height="100px">
                <h4>Thanh Toán Khi Nhận Hàng</h4>
                <p>Nhận Hàng Tới Nhà Rồi Thanh Toán</p>
            </div>
            <div  class="a2">
                <img class="img2" src="img/suachua.jpg" alt=""width="100px" height="100px">
                <h4>Bảo Hành Giài Hạn</h4>
                <p>Bảo Hành Lên Đến 60 Ngày</p>
            </div>
            <div  class="a2">
                <img class="img2" src="img/quaylai.jpg" alt=""width="100px" height="100px">
                <h4>Đổi Hàng Dễ Dàng</h4>
                <p>Đổi Hàng Thoái Mái Trong 30 ngày</p>
            </div>
        </div>
        <div>
            <div class="a3">
                <h1>Top Sản Phẩm Mới Nhất</h1>
                <li><a href="#">Xem Thêm</a></li>
            </div> 
            <div >
                <div class="sanpham">
                <?php
            
            
              foreach ($spnew as $sp){
                  extract($sp);
                  $hinh =  $img_path.$img;
                  $linksp="index.php?act=sanphamct&idsp=".$id;
                  echo '<div class="sanpham1"> 
                            <img src="'.$hinh.'" alt="">
                            <div>
                                <div class="sanpham3">
                                    <a href="'. $linksp .'"><h3>'.$name.'</h3></a>
                                    <p class="p1"><del>'.$old_price.'</del>-'.$price.'</p>
                                </div>
                                <div class="sanpham3">
                                    <form action="index.php?act=addtocart" method="post">
                                        <input type="hidden" name="id" value="'.$id.'" >
                                        <input type="hidden" name="name" value="'.$name.'" >
                                        <input type="hidden" name="img" value="'.$img.'" >
                                        <input type="hidden" name="price" value="'.$price.'" >
                                        <input type="submit" name="addtocart" value="Thêm Vào Giỏ Hàng">
                                        </form>
                                        <form action="index.php?act=bill" method="post">
                                        <input type="hidden" name="id" value="'.$id.'" >
                                        <input type="hidden" name="name" value="'.$name.'" >
                                        <input type="hidden" name="img" value="'.$img.'" >
                                        <input type="hidden" name="price" value="'.$price.'" >
                                        <input type="submit" name="addtocart" value="mua ngay">
                                    </form>
                                </div>
                            </div>
                        </div>';
                  
              }
                ?>
                </div>
            </div>
        </div>
        <div>   
            <div class="a3">
                <h1>Top Sản Phẩm Nhiều Người Xem</h1>
                <li><a href="#">Xem Thêm</a></li>
            </div> 
            <div class="sanpham">
                    <?php
                    foreach($dstop10 as $sp){
                    extract($sp);
                    $linksp="index.php?act=sanphamct&idsp=".$id;
                    $hinh=$img_path.$img;
                    echo '<div class="sanpham1">
                    <img src="'.$hinh.'" alt="">
                    <a href="'.$linksp.'"><h3>'.$name.'</h3></a>
                    <p class="p1"><del>'.$old_price.'</del>-'.$price.'</p>
                    <form action="index.php?act=addtocart" method="post">
                        <input type="hidden" name="id" value="'.$id.'" >
                        <input type="hidden" name="name" value="'.$name.'" >
                        <input type="hidden" name="img" value="'.$img.'" >
                        <input type="hidden" name="price" value="'.$price.'" >
                        <input type="submit" name="addtocart" value="Thêm Vào Giỏ Hàng">
                    </form>
                    <form action="index.php?act=bill" method="post">
                        <input type="hidden" name="id" value="'.$id.'" >
                        <input type="hidden" name="name" value="'.$name.'" >
                        <input type="hidden" name="img" value="'.$img.'" >
                        <input type="hidden" name="price" value="'.$price.'" >
                        <input type="submit" name="addtocart" value="mua ngay">
                        </form>
                    </div>';
                    }
                    ?>
            </div>
        </div>
            <div class="a3">
                <h1>Khách hàng TruongShion tại</h1>
            </div>
            <div class="a4">
                <div class="a1">
                    <div class="img3">
                        <img src="img/6378969482900027201989463.jpg" alt="">
                    </div>
                    <div class="img3">
                        <img src="img/anh-dao-mekong.jpg" alt="">
                    </div>
                    <div class="img3">
                        <img src="img/dich-vu-thiet-ke-logo-khach-san-1.png" alt="">
                    </div>
                    <div class="img3">
                        <img src="img/logo hieuthao.png" alt="">
                    </div>
                    <div class="img3">
                        <img src="img/mau-logo-khach-san-dep_2.png" alt="">
                    </div>            
                </div>
            </div>
            
        </div>