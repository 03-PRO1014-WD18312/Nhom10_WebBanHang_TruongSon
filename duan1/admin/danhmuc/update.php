<?php
if(isset($danhmuc)){
    extract($danhmuc);
}

?>
<div class="row2">
         <div class="row2 font_title">
          <h1>Cập NHật Danh Mục </h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=updatedm" method="POST" enctype="multipart/form-data">
          
           <div class="row2 mb10 form_content_container">
           <label> Tên DM </label> <br>
            <input type="text" name="tendm" value="<?php echo $name ?>">
           </div>
           <div class="row mb10 ">
         <input type="hidden" name="id" value="<?=$id?>">
         <input class="mr20" name="capnhat" type="submit" value="CẬP NHẬT">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listdm"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
          </form>
         </div>
        </div>