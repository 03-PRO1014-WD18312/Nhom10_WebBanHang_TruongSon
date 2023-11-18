<?php
function viewcart($del){
    global $img_path;
    $tong=0;
    $i=0;
    if($del==1){
        $xoasp_th='<th>thao tác</th>';
        $xoasp_td2='<td></td>';
    }else{
        $xoasp_th='';
        $xoasp_td2='';
    }
        echo '<tr>
                    <th>hình</th>
                    <th>sản phẩm</th>
                    <th>đơn giá</th>
                    <th>số lượng</th>
                    <th>thành tiền</th>
                    '.$xoasp_th.'
                </tr>';
            foreach($_SESSION['mycart'] as $cart){
                $hinh=$img_path.$cart[2];
                $tong+=$cart[5]; 
                if($del==1){
                    $xoasp_td='<td><a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="xoa"></a></td>';
                }else{
                    $xoasp_td='';
                }
            echo ' 
                   <tr>
                    <td><img src="'.$hinh.'" alt="" height="80px"></td>
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

function insert_bill($iduser,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang){
    $sql = "
        INSERT INTO `bill`(`iduser`,`bill_name`, `bill_email`, `bill_address`, `bill_tel`,`bill_pttt`,`ngaydathang`,`total`) 
        VALUES ('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang');
    ";
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
function loadall_cart_count($idbill){
    $sql = "select * from cart where idbill = $idbill";
    $bill = pdo_query($sql);
    return sizeof($bill);
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
            $tt="don hang moi";
            break;
        case '1':
        $tt="dang xu li";
        break;
        case '2':
            $tt="dang giao hang";
            break;
        case '3':
        $tt="da giao hang";
        break;
        default:
        $tt= "don hang moi";
        break;
            
        
    }
    return $tt;
}
?>