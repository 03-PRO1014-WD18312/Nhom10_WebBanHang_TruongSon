<div >
            <img class="banner" id="banner" src="./img/banner5.jpg" alt="">
        </div>
        <div class="a1">
            <div class="a2">
                <img class="img2" src="img/giaohang.jpg" alt="" width="150px" height="150px">
                <h4>GIao Hàng Toàn Quốc</h4>
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
                <h1> Sản Phẩm Mới Nhất</h1>
                <li><a href="index.php?act=sanpham">Xem Thêm</a></li>
            </div> 
            <div >
                <div class="sanpham">
                <?php 
              foreach ($spnew as $sp){
                  extract($sp);
                  $hinh =  $img_path.$img;
                  $linksp="index.php?act=sanphamct&idsp=".$id;
                  echo '<div class="sanpham2"> 
                            <div class="sanpham1">   
                            <img style="border-radius: 15px"  src="'.$hinh.'" alt="" width="250px">
                                <div class="sanpham3">
                                    <a href="'. $linksp .'"><h3>'.$name.'</h3></a>
                                    <p class="p1"><del>'.$old_price.'</del>-'.$price.'</p>
                                </div>
                                <div class="sanpham3">
                                    <form class="formhome1" action="index.php?act=addtocart" method="post">
                                        <input type="hidden" name="id" value="'.$id.'" >
                                        <input type="hidden" name="soluong" value="1" >
                                        <input type="hidden" name="name" value="'.$name.'" >
                                        <input type="hidden" name="img" value="'.$img.'" >
                                        <input type="hidden" name="price" value="'.$price.'" >
                                        <input type="submit" name="addtocart" value="Thêm Vào Giỏ Hàng">
                                        <input type="submit" name="addtobill" value="Mua Ngay" >
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
                <h1>Sản Phẩm Nhiều Người Xem</h1>
                <li><a href="index.php?act=sanpham">Xem Thêm</a></li>
            </div> 
            <div class="sanpham">
                    <?php
                    foreach($dstop10 as $sp){
                    extract($sp);
                    $linksp="index.php?act=sanphamct&idsp=".$id;
                    $hinh=$img_path.$img;
                    echo '<div class="sanpham2">
                    <div class="sanpham1">
                    <img style="border-radius: 15px" src="'.$hinh.'" alt="">
                    <div class="sanpham3">
                        <a href="'.$linksp.'"><h3>'.$name.'</h3></a>
                        <p class="p1"><del>'.$old_price.'</del>-'.$price.'</p>
                    </div>
                    <div class="sanpham3">
                                    <form class="formhome1" action="index.php?act=addtocart" method="post">
                                        <input type="hidden" name="id" value="'.$id.'" >
                                        <input type="hidden" name="name" value="'.$name.'" >
                                        <input type="hidden" name="img" value="'.$img.'" >
                                        <input type="hidden" name="price" value="'.$price.'" >
                                        <input type="submit" name="addtocart" value="Thêm Vào Giỏ Hàng">
                                        <input type="submit" name="addtobill" value="Mua Ngay" >
                                        </form>  
                        </div>
                        </div>
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
        <!-- <script>
    function setBuyNowQuantity() {
        // Lấy giá trị số lượng từ trường input="number"
        var quantity = document.querySelector('input[name="soluong"]').value;

        // Gán giá trị số lượng vào trường ẩn trong form "Mua Ngay"
        document.getElementById('buyNowQuantity').value = quantity;
        document.querySelector('input[name="quantity"]').value = quantity;
    document.querySelector('input[name="buyNowQuantity"]').value = quantity;

        var quantity1 = document.querySelector('input[name="soluong1"]').value;

        // Gán giá trị số lượng vào trường ẩn trong form "Mua Ngay"
        document.getElementById('buyNowQuantity1').value = quantity1;
        document.querySelector('input[name="quantity1"]').value = quantity1;
    document.querySelector('input[name="buyNowQuantity1"]').value = quantity1;
    }
</script> -->