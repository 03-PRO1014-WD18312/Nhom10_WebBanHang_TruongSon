<?php
if(isset($bill)){
    extract($bill);
}
$ttdh=get_ttdh($bill_status);
?>
<div class="row2">
         <div class="row2 font_title">
          <h1>cap nhat bill </h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=updatebill" method="POST" enctype="multipart/form-data">
          
           <div class="row2 mb10 form_content_container">
           <label> tinh trang bill </label> <br>
           <select name="bill_status" id="">
            <option value="<?php echo $bill_status ?>" selected><?php echo $ttdh ?></option>
            <option value="1">đã giao hàng</option>
            <option value="2">đang giao hàng</option>
            <option value="3">huỷ</option>
           </select>

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