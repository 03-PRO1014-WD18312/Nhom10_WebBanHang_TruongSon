<?php
if(isset($sanpham)){
    extract($sanpham);
}
$hinhpath="../upload/".$img;
if(is_file($hinhpath)){
    $hinhpath="<img src='".$hinhpath."' width='100px' heigh='100px'>";
}else{
    $hinhpath="loi";
}
?>
<div class="row2">
         <div class="row2 font_title">
          <h1>CẬP NHẬT SẢN PHẨM </h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=updatesp&&idsp=<?=$id?>" method="POST" enctype="multipart/form-data">
          <div class="row2 mb10">
            <label>Danh mục </label> <br>
            <select name="iddm" id="">
              <option value="" selected>Danh mục </option>
                    <?php 
                        foreach($listdanhmuc as $danhmuc){
                        if($iddm==$danhmuc['id']){
                          echo '<option value="'.$danhmuc['id'].'"selected>'.$danhmuc['name'].'</option>';
                        }else{
                          echo '<option value="'.$danhmuc['id'].'">'.$danhmuc['name'].'</option>';
                        };
                    }
                    ?>
            </select>
           </div>
           <div class="row2 mb10 form_content_container">
           <label> Tên Sản Phẩm </label> <br>
            <input type="text" name="tensp" value="<?php echo $name ?>">
           </div>
           <div class="row2 mb10">
            <label>size</label> <br>
            <input type="text" name="size" value="<?php echo $size ?>">
           </div>
           <div class="row2 mb10">
            <label>Giá Sản Phẩm </label> <br>
            <input type="text" name="giasp" value="<?php echo $price ?>">
           </div>
           <div class="row2 mb10">
            <label>Giá Cũ </label> <br>
            <input type="text" name="oldgiasp" value="<?php echo $price ?>" hidden>
           </div>
           <div class="row2 mb10">
            <label>chat lieu</label> <br>
            <input type="text" name="material" value="<?php echo $material ?>">
           </div>
           <div class="row2 mb10">
            <label>so luong </label> <br>
            <input type="text" name="quantity" value="<?php echo $quantity ?>">
           </div>
           <div class="row2 mb10">
            <label>Hình ảnh </label> <br>
            <input type="file" name="hinh" style="color:red">
            <?php echo $hinhpath?>
           </div>
           <div class="row2 mb10">
            <label>mô tả </label> <br>
            <input type="text" name="mota" value="<?php echo $mota ?>">
           </div>
           <div class="row mb10 ">
         <input type="hidden" name="id" value="<?=$id?>">
         <input type="text" name="hinhcu" value="<?php echo $img ?>" hidden>
         <input class="mr20" name="capnhat" type="submit" value="CẬP NHẬT">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listsp"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
          </form>
         </div>
        </div>