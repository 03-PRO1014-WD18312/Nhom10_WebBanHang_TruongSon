<div>
            <div class="a3">
                <h1>Top Sản Phẩm Mới Nhất</h1>
                <li><a href="#">Xem Thêm</a></li>
            </div> 
            <div>
                <div class="sanpham1" >
                    <?php
                    foreach ($dssp as $sp){
                    extract($sp);
                    $hinh =  $img_path.$img;
                    $linksp="index.php?act=sanphamct&idsp=".$id;
                    echo '<div class="sanpham2">
                    <img src="'.$hinh.'" alt="">
                    <a class="item_name" href="'. $linksp .'"><h3>'.$name.'</h3></a>
                    <p class="p1"><del>'.$old_price.'</del>-'.$price.'</p>
                        <form action="index.php?act=addtocart" method="post">
                        <input type="number" name="soluong" value="0" >
                        <input type="hidden" name="id" value="'.$id.'" >
                        <input type="hidden" name="name" value="'.$name.'" >
                        <input type="hidden" name="img" value="'.$img.'" >
                        <input type="hidden" name="price" value="'.$price.'" >
                        <input type="submit" name="addtocart" value="Thêm Vào Giỏ Hàng">
                        </form>
                        <form action="index.php?act=bill" method="post" id="buyNowForm">
                        <input type="hidden" name="id" value="'.$id.'">
                        <input type="hidden" name="name" value="'.$name.'">
                        <input type="hidden" name="img" value="'.$img.'">
                        <input type="hidden" name="price" value="'.$price.'">
                        <input type="hidden" name="quantity" id="buyNowQuantity" value="">
                        <input type="submit" name="addtocart" value="Mua Ngay" onclick="setBuyNowQuantity()">
                        </form>
                    </div>';
                    
                    }
                    ?>
                </div>
            </div>
        </div>
        <script>
    function setBuyNowQuantity() {
        // Lấy giá trị số lượng từ trường input="number"
        var quantity = document.querySelector('input[name="soluong"]').value;

        // Gán giá trị số lượng vào trường ẩn trong form "Mua Ngay"
        document.getElementById('buyNowQuantity').value = quantity;

        
    }
</script>