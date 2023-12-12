<div class="row2">
         <div class="row2 font_title">
          <h1>THÊM MỚI DM</h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=adddm" method="POST" enctype="multipart/form-data">
          
           <div class="row2 mb10 form_content_container">
           <label> Tên Danh Muc </label> <br>
            <input type="text" name="name" placeholder="nhập vào tên DM">
           </div>
           
           <div class="row mb10 ">
         <input class="mr20" name="themmoi" type="submit" value="THÊM MỚI">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listdm"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
           <?php
           if(isset($thongbao)){
            echo $thongbao;
           }
           ?>
          </form>
         </div>
        </div>