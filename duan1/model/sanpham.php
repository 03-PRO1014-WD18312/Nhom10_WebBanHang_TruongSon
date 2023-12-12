<?php
function loadall_sanpham_home(){
    $sql="select * from sanpham where 1 order by id asc limit 0,4";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}
function loadall_sanpham_top10(){
    $sql="select * from sanpham where 1 order by luotxem desc limit 0,4";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham($keyw="",$iddm=0){
    $sql="SELECT sanpham.*,COUNT(binhluan.id) as soBinhLuan 
    from sanpham 
    left join binhluan on binhluan.idpro=sanpham.id 
    where trangthai=0 ";
    // where 1 tức là nó đúng
    if($keyw!=""){
        $sql.=" and name like '%".$keyw."%'";
    }
    if($iddm>0){
        $sql.=" and iddm ='".$iddm."'";
    }
    $sql.=" group by sanpham.id";
    $sql.=" order by sanpham.id desc";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}
// function loadall_sanpham1($keyw="",$iddm=0){
//     $sql="select * from sanpham where trangthai=0";
//     // where 1 tức là nó đúng
//     if($keyw!=""){
//         $sql.=" and name like '%".$keyw."%'";
//     }
//     if($iddm>0){
//         $sql.=" and iddm ='".$iddm."'";
//     }
//     $sql.=" order by id desc";
//     $listsanpham=pdo_query($sql);
//     return  $listsanpham;
// }

// 

function loadone_sanpham($id){
    $sql = "select * from sanpham where id = $id";
    $result = pdo_query_one($sql);
    return $result;
}
function load_sanpham_cungloai($id, $iddm){
    $sql = "select * from sanpham where iddm = $iddm and id <> $id";
    $result = pdo_query($sql);
    return $result;
}
function insert_sanpham($tensp,$giasp,$hinh,$mota,$material,$size,$quantity,$iddm){
    $sql="INSERT INTO sanpham(`name`,`price`,`img`,`mota`,`material`,`size`,`quantity`,`iddm`) values ('$tensp','$giasp','$hinh','$mota','$material','$size','$quantity','$iddm');";
    pdo_execute($sql);
}

function update_sanpham($id,$iddm,$tensp,$giasp,$giacu,$mota,$material,$size,$quantity,$hinh){
    if($hinh!=""){
        $sql="UPDATE sanpham SET `name`='$tensp',`price`='$giasp',`old_price`='$giacu',`mota`='$mota',`img`='$hinh',`material`='$material',`quantity`='$quantity',`size`='$size',`iddm`='$iddm' where sanpham.`id`=$id";
    }else{
        $sql="UPDATE sanpham SET `name`='$tensp',`price`='$giasp',`old_price`='$giacu',`mota`='$mota',`img`='$hinh',`material`='$material',`quantity`='$quantity',`size`='$size',`iddm`='$iddm' where sanpham.`id`=$id";
    }
    pdo_execute($sql);
}


function hard_delete($id){
    $sql= "DELETE FROM sanpham WHERE id=".$id;
    pdo_execute($sql);
}
function soft_delete($id){
    $sql= "UPDATE sanpham SET trangthai=1 where sanpham.`id`=$id";
    pdo_execute($sql);
}