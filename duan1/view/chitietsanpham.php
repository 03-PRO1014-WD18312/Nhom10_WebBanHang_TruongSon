<?php extract($sanpham); ?>
<div class="sanpham5">
            <div>
            <?php $hinh = $img_path . $img;?>
                <img src="<?php echo $hinh?>" alt="" width="550px" height="auto" style="border-radius: 20px; border:2px solid gray">
            </div>
            <div style="width: 550px;">
                <h1><?php echo $name; ?></h1>
                <div class="ctsanpham">
                    <h3>Giá :</h3>
                    <p class="ctsanpham1"><?php echo $price; ?></p>
                </div>
                <div class="ctsanpham">
                    <h3>Vật Liệu :</h3>
                    <p class="ctsanpham1"><?php echo $material; ?></p>
                </div>
                <div class="ctsanpham">
                    <h3>Kích Thước :</h3>
                    <p class="ctsanpham1"><?php echo $size; ?></p>
                </div>
                <div class="ctsanpham">
                    <h3>Mô Tả :</h3>
                    <p class="ctsanpham1"><?php echo $mota; ?></p>
                </div>
                
                <div class="ctsanpham">
                    <div style="margin-right: 10px;">
                        
                        <form action="index.php?act=addtocart" method="post">
                                <div class="ctsanpham">
                                    <div>
                                        <h4>Số Lượng:</h4>
                                    </div>
                                    <div>
                                        <input type="number" name="soluong" min="1" value="1" style="border-radius: 10%;border: 3px solid gray;" >
                                    </div>
                                    <div class="quantity">
                                        <h5>Sản Phẩm Còn : <?php echo $quantity ?></h5>
                                    </div>
                                </div>
                                
                                       <div style="margin-top: 35px;">
                                            <input type="hidden" name="id" value="<?php echo $id?>" >
                                            <input type="hidden" name="name" value="<?php echo $name?>" >
                                            <input type="hidden" name="img" value="<?php echo $img?>" >
                                            <input type="hidden" name="price" value="<?php echo $price?>" >
                                            
                                            <input type="submit" name="addtocart" value="Thêm Vào Giỏ Hàng">
                                            <input type="submit" name="addtobill" value="mua ngay">
                                       </div>
                        </form>
                        </div>
                    </div>
            
                <div class="binhluan">
                    <div>
                        <button id="button-1">Bình Luận</button>
                        <button id="button-2">Bảo Hành</button>
                        <button id="button-3">Vận Chuyển</button>
                    </div>
                    <div id="info-container">
                        <div id="info-2" class="info">
                            <p><img width="30" height="30" src="https://nhaxinh.com/image/check.png" > Các sản phẩm nội thất đa số đều được sản xuất tại nhà máy của công ty <br> cổ phần xây dựng kiến trúc AA với đội ngũ nhân viên và công nhân ưu tú cùng <br> cơ sở vật chất hiện đại </p>
                            <p><img width="30" height="30" src="https://nhaxinh.com/image/check.png" > Nhà Xinh bảo hành một năm cho các trường hợp có lỗi về kỹ thuật trong quá trình <br> sản xuất hay lắp đặt.</p>
                            <p><img width="30" height="30" src="https://nhaxinh.com/image/check.png" > Quý khách không nên tự sửa chữa mà hãy báo ngay cho qua hotline: 1800 7200.</a></p>
                            <p><img width="30" height="30" src="https://nhaxinh.com/image/check.png" > Sau thời gian hết hạn bảo hành, nếu quý khách có bất kỳ yêu cầu hay thắc mắc <br> thì vui lòng liên hệ với để được <br> hướng dẫn và giải quyết các vấn đề gặp phải.</p>
                            <p style="margin-top: 10px;"><strong>TUY NHIÊN KHÔNG BẢO HÀNH CHO CÁC TRƯỜNG HỢP SAU:</strong></p>
                            <p><img width="30" height="30" src="https://nhaxinh.com/image/check.png" > Khách hàng tự ý sửa chữa khi sản phẩm bị trục trặc mà không báo cho Nhà Xinh.</p>
                            <p><img width="30" height="30" src="https://nhaxinh.com/image/check.png"  > Sản phẩm được sử dụng không đúng quy cách của sổ bảo hành <br> gây nên trầy xước, móp, dơ bẩn hay mất màu.</p>
                            <p><img width="30" height="30" src="https://nhaxinh.com/image/check.png" > Sản phẩm bị biến dạng do môi trường bên ngoài bất bình thường.</p>
                            <p><img width="30" height="30" src="https://nhaxinh.com/image/check.png"  > Sản phẩm hết hạn bảo hành.</p>
                            <p><img width="30" height="30" src="https://nhaxinh.com/image/check.png"   > Sản phẩm không có phiếu bảo hành của Nhà Xinh.</p>
                            <p><img width="30" height="30" src="https://nhaxinh.com/image/check.png"  > Xem nội dung sổ bảo hành</a></p>
                        </div>
                        <div id="info-1" class="info">
                            <div >
                                <div style="margin-bottom: 150px;">
                                  <table border="1">
                                    <?php foreach($binhluan as $value): ?>
                                    <tr>
                                        <td><?php echo $value['noidung']?></td>
                                        <td><?php echo $value['user']?></td>
                                        <td><?php echo date("d/m/Y", strtotime($value['ngaybinhluan'])) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                  </table>
                                </div>
                                <div class="box_search">
                                <form action="index.php?act=sanphamct&idsp=<?=$id?>" method="POST">
                                    <input type="hidden" name="idpro" value="<?=$id?>" >
                                    <input type="text" name="noidung">
                                    <input type="submit" name="guibinhluan" value="Gửi bình luận">
                                    <?php
                                    if (isset($mess)){
                                        echo $mess;
                                    }
                                    ?>
                                </form>
                                </div>
                              </div>
                        </div>
                        <div id="info-3" class="info">
                            <div>
                                <p >Nhà Xinh cung cấp dịch vụ giao hàng tận nơi,lắp ráp và sắp xếp vị trí theo <br>đúng ý muốn của quý khách:</p>
                                <p style="margin-top: 10px;">- MIỄN PHÍ giao hàng trong các Quận nội thành Tp.Hồ Chí Minh và Hà Nội,<br> áp dụng cho các đơn hàng trị giá trên 10 triệu.</p>
                                <p style="margin-top: 10px;">- Đối với khu vực các tỉnh lân cận: Tính phí hợp lý theo dựa <br> trên quãng đường vận chuyển</p>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-left: 75px;">
            <div ><h3>SẢN PHẨM CÙNG LOẠI</h3></div>
            <div class="sanpham4">
                <?php foreach($sanphamcl as $value): ?>
                    <?php $img1 = $img_path . $value['img'];?>
                    <li class="sanpham3">
                        <a href="index.php?act=sanphamct&idsp=<?=$value['id']?>">
                        <img src="<?php echo $img1 ?>" alt="" style="border-radius: 20px; border:2px solid gray" >
                            <p><?=$value['name']?></p>
                        </a>

                    </li>
                <?php endforeach; ?>
            </div>
          </div>
    </div>
</div>    