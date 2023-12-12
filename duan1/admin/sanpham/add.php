<div class="row2">
         <div class="row2 font_title">
          <h1 style="text-align: center">THÊM MỚI SẢN PHẨM</h1>
         </div>
         <div class="row2 form_content1 ">
          <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
          <div class="row2 mb10">
            <label>Danh mục </label> <br>
            <select name="iddm" id="">
              <option value="" selected>Danh mục </option>
                    <?php 
                        foreach($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        echo '<option value="'.$id.'">'.$name.'</option>';
                    }
                    ?>
            </select>
           </div>
           <div class="row2 mb10 form_content_container">
           <label> Tên Sản Phẩm </label> <br>
            <input class="f2" type="text" name="tensp" placeholder="nhập vào tên Sản Phẩm">
           </div>
           <div class="row2 mb10">
            <label>size </label> <br>
            <input class="f2"  type="text" name="size" placeholder="nhập vào size Sản Phẩm">
           </div>
           <div class="row2 mb10">
            <label>Giá Sản Phẩm </label> <br>
            <input class="f2"  type="text" name="giasp" placeholder="nhập vào giá Sản Phẩm">
           </div>
           <div class="row2 mb10">
            <label>chat lieu </label> <br>
            <input class="f2"  type="text" name="material" placeholder="nhập vào chat lieu san pham">
           </div>
           <div class="row2 mb10">
            <label>so luong </label> <br>
            <input class="f2"  type="text" name="quantity" placeholder="nhập vào so luong san pham">
           </div>
           <div class="row2 mb10">
            <label>Hình ảnh </label> <br>
            <input class="f2"  type="file" name="hinh" style="color:red">
           </div>
           <div class="row2 mb10">
            <label>mô tả </label> <br>
            <textarea class="f2"  name="mota" id="" cols="30" rows="10"></textarea>
           </div>
           <div class="row mb10 ">
         <input class="mr20" name="themmoi" type="submit" value="THÊM MỚI">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listsp"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
           <?php
           if(isset($thongbao)){
            echo $thongbao;
           }
           ?>
          </form>
         </div>
        </div>