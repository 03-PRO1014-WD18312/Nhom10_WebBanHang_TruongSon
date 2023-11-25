<?php
if(isset($bill)){
    extract($bill);
}

?>
<div class="row2">
         <div class="row2 font_title">
          <h1>cap nhat bill </h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=updatebill" method="POST" enctype="multipart/form-data">
          
           <div class="row2 mb10 form_content_container">
           <label> tinh trang bill </label> <br>
            <input type="number" name="bill_status" value="<?php echo $bill_status ?>">
           </div>
           <div class="row mb10 ">
         <input type="hidden" name="id" value="<?=$id?>">
         <input class="mr20" name="capnhat" type="submit" value="CẬP NHẬT">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listbill"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
          </form>
         </div>
        </div>