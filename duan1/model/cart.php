<?php
function viewcart($del){
    global $img_path;
    $tong=0;
    $i=0;
    if($del==1){
        $xoasp_th='<th>Thao Tác</th>';
        $xoasp_td2='<td></td>';
    }else{
        $xoasp_th='';
        $xoasp_td2='';
    }
        echo '<tr>
                    <th style="text-align:center">Hình</th>
                    <th style="text-align:center">Sản Phẩm</th>
                    <th style="text-align:center">Đơn Giá</th>
                    <th style="text-align:center">Số Lượng</th>
                    <th style="text-align:center">Thành Tiền</th>
                    '.$xoasp_th.'
                </tr>';
            foreach($_SESSION['mycart'] as $cart){
                $hinh=$img_path.$cart[2];
                $tong+=$cart[5]; 
                if($del==1){
                    $xoasp_td='<td><a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xoá"></a></td>';
                }else{
                    $xoasp_td='';
                }
            echo ' 
                   <tr style="text-align:center">
                    <td><img src="'.$hinh.'" alt="" width="150px"></td>
                    <td>'.$cart[1].'</td>
                    <td>'.$cart[3].'</td>
                    <td>'.$cart[4].'</td>
                    <td>'.$cart[5].'</td>
                    '.$xoasp_td.'
                   </tr>';
                   $i++;
            }
            echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>'.$tong.'</td>
            '.$xoasp_td2.'
            </tr>
            ';
}
function bill_chi_tiet($listbill){
    global $img_path;
    $tong=0;
    $i=0;
        echo '<tr>
                    <th>hình</th>
                    <th>sản phẩm</th>
                    <th>đơn giá</th>
                    <th>số lượng</th>
                    <th>thành tiền</th>
                </tr>';
            foreach($listbill as $cart){
                $hinh=$img_path.$cart['img'];
                $tong+=$cart['thanhtien']; 
                
            echo ' 
                   <tr>
                    <td><img src="'.$hinh.'" alt="" height="80px"></td>
                    <td>'.$cart['name'].'</td>
                    <td>'.$cart['price'].'</td>
                    <td>'.$cart['soluong'].'</td>
                    <td>'.$cart['thanhtien'].'</td>
                   </tr>';
                   $i++;
            }
            echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>'.$tong.'</td>
            </tr>
            ';
}
function tongdonhang(){
    global $img_path;
    $tong=0;
            foreach($_SESSION['mycart'] as $cart){
                $tong+=$cart[5]; 
}
    return $tong;
}
function tongdonhang1(){
    global $img_path;
    $tong=0;
            foreach($_SESSION['mycart1'] as $cart){
                $tong+=$cart[5]; 
}
    return $tong;
}

function insert_bill($iduser,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang){
    $sql = "
        INSERT INTO `bill`(`iduser`,`bill_name`, `bill_email`, `bill_address`, `bill_tel`,`bill_pttt`,`ngaydathang`,`total`) 
        VALUES ('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang');
    ";
    //echo $sql;
    //die;
    return pdo_execute_return_lastInsertId($sql);
}
function update_bill($id,$bill_status){
    
    $sql="UPDATE bill SET `bill_status`='$bill_status' where `id`=$id";
    
    //echo $sql;
    //die;
    return pdo_execute_return_lastInsertId($sql);
}


function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
    $sql = "
        INSERT INTO `cart`(`iduser`,`idpro`,`img`,`name`,`price`,`soluong`,`thanhtien`,`idbill`) 
        VALUES ('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill');
    ";
    //echo $sql;
    //die;
    return pdo_execute($sql);
}
function loadone_bill($id){
    $sql = "select * from bill where id = $id";
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadall_cart($idbill){
    $sql = "select * from cart where idbill = $idbill";
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_sanpham_bill($idbill){
    $sql = "select cart.soluong,sanpham.name,sanpham.img,taikhoan.name as 'nametk',taikhoan.address,taikhoan.tel,taikhoan.email, taikhoan.id from `cart`
    join `sanpham` on cart.idpro=sanpham.id
    join `taikhoan` on cart.iduser=taikhoan.id
    where idbill = $idbill";
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_cart_count($idbill){
    $sql = "select * from cart where idbill = $idbill";
    $bill = pdo_query($sql);
    return $bill;
}

function loadall_bill($kyw="",$iduser){

    $sql="select * from bill where 1";
    if($iduser>0){
        $sql.=" AND iduser= $iduser";
        }
        if($kyw!=""){
            $sql.=" AND id like '%".$kyw."%'";
        }
        $sql.=" order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function get_ttdh($n){
    switch($n){
        case '0':
            $tt="Đang Chuẩn Bị Hàng";
            break;
        case '1':
        $tt="Đã Giao Hàng";
        break;
        case '2':
            $tt="Đang Giao Hàng";
            break;
        case '3':
        $tt="Huỷ";
        break;
        default:
        $tt= "Đang Chuẩn Bị Hàng";
        break;
            
        
    }
    return $tt;
}
function get_pttt($pt){
    switch($pt){
        case '1':
            $pt="thanh toan truc tuyen";
            break;
        case '2':
            $pt="chuyen khoan";
            break;
        case '3':
        $pt="thanh toan online";
        break;
        default:
        $pt= "ban khong thanh toan' a`?";
        break;
            
        
    }
    return $pt;
}
?>