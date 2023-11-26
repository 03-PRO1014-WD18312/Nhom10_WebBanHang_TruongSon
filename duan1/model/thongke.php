<?php
function load_thongke_sanpham_danhmuc(){
    $sql="SELECT dm.id,dm.name,COUNT(sp.id) as 'soluong', MIN(price) as 'gia_min',MAX(price) as 'gia_max',AVG(price) as 'gia_avg' 
    FROM danhmuc dm LEFT JOIN sanpham sp ON dm.id=sp.iddm GROUP BY dm.id, dm.name ORDER BY id ";
    return pdo_query($sql);
}
function load_thongke_binhluan(){
    $sql = "
        SELECT id, noidung, iduser, idpro, ngaybinhluan FROM `binhluan` 
    ";
    $result =  pdo_query($sql);
    return $result;
}
function load_thongke_taikhoan(){
    $sql = "
        SELECT id, user, pass, email, role FROM `taikhoan` 
    ";
    $result =  pdo_query($sql);
    return $result;
}