<div class="row2">
         <div class="row2 font_title">
          <h1>THỐNG KÊ BÌNH LUẬN TRONG DANH MỤC</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th>ID KHÁCH HÀNG</th>
                <th>NỘI DUNG</th>
                <th>ID SẢN PHẨM</th>
                <th>NGÀY BÌNH LUẬN</th>
                <th>THAO TÁC</th>
            </tr>
            <?php
            foreach($dsthongkebl as $thongke){
                extract($thongke);
            ?>
                <tr>
                    <td><?php echo $iduser ?></td>
                    <td><?php echo $noidung ?></td>
                    <td><?php echo $idpro ?></td>
                    <td><?php echo date("d/m/Y", strtotime($ngaybinhluan)) ?></td>
                    <td><a href="index.php?act=xoabl&&id=<?php echo $id;?>"><input type="button" value="Xóa" onclick="return confirm('ban co chac chan xoa ko')"></a></td>
                </tr>
            <?php
            }
            ?>
            
           
            
           </table>
           </div>
          </form>
         </div>
        </div>