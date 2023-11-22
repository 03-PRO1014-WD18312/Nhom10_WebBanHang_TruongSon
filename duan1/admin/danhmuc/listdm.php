<div class="row2">
         <div class="row2 font_title">
          <h1 style="text-align: center">Danh Sách Danh Mục</h1>
         </div>
         <div class="row2 form_content ">
           <div class="row2 mb10 formds_loai">
           <table border="1">
            <tr>
                <th>MÃ LOẠI</th>
                <th>TÊN LOẠI</th>
                <th>SỐ LƯỢNG</th>
                <th>thao tac</th>
            </tr>
            <?php
            foreach($danhmuc as $thongke){
                extract($thongke);
            ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $soluong ?></td>
                    <td>
                        <a href="index.php?act=suadm&&iddm=<?php echo $id ?>"> <input  class="mr20" type="button" value="Sửa"></a>
<!--                        <a href="index.php?act=delete_dm&&iddm=--><?php //echo $id ?><!--"> <input  class="mr20" type="button" value="Xoá"></a>-->
                    </td>
                </tr>
            <?php
            }
            ?>
            
           </table>
           </div>
           <div class="row mb10 ">
                <a href="index.php?act=adddm"> <input  class="mr20" type="button" value="Thêm Danh Mục"></a>
           </div>

         </div>
        </div>