<div>
            <div>
                <h1 style="margin-left: 650px;">Toàn Bộ Sản Phẩm</h1>
            </div> 
            <div>
                <div class="sanpham5" >
                    <?php
                    foreach ($dssp as $sp){
                    extract($sp);
                    $hinh =  $img_path.$img;
                    $linksp="index.php?act=sanphamct&idsp=".$id;
                    echo '<div class="sanpham2">
                    <img src="'.$hinh.'" alt="">
                    <div class="sanpham3">
                   
                        <a class="item_name" href="'. $linksp .'"><h3>'.$name.'</h3></a>
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
                    </div>';
                    
                    }
                    ?>
                </div>
            </div>
        </div>