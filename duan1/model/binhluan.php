<?php 
    function loadall_binhluan($idsp){
        $sql = "
            SELECT binhluan.id, binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan FROM `binhluan` 
            LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
            LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
            WHERE sanpham.id = $idsp;
        ";
        $result =  pdo_query($sql);
        return $result;
    }
    function insert_binhluan($idpro, $noidung,$id){
        $date = date('Y-m-d');
        $sql = "
            INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
            VALUES ('$noidung','$id','$idpro','$date');
        ";
        //echo $sql;
        //die;
        pdo_execute($sql);
    }
    function delete_binhluan($idbl){
        $sql="DELETE FROM binhluan where id='$idbl'";
    
    pdo_execute($sql);
    }
    function delete_taikhoan($idtk){
        $sql="DELETE FROM taikhoan where id='$idtk'";
    
    pdo_execute($sql);
    }
    

?>