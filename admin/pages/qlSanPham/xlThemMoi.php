<?php
include "../../../lib/DataProvider.php";


    $MaLoaiSanPham = $_POST["cmbLoaiSP"];
    $MaHangSanXuat = $_POST["cmbHangSX"];
    $TenSP = $_POST["txtNSP"];
    $XuatXu = $_POST["txtXS"];
    $Gia = $_POST["txtGia"];
    $SL = $_POST["txtSL"];
 
    $MoTa = $_POST["txtMoTa"];

    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $ngayLap = date("Y-m-d H:i:s");

    $file = $_FILES['myFile']['tmp_name'];
    $path = "../../../image/".basename($_FILES['myFile']['name']);    
    $fileName = $_FILES['myFile']['name'];
    if (file_exists($path) || !is_uploaded_file($file)) {
        $sql = "INSERT INTO SanPham (TenSanPham, GiaSanPham, NgayNhap, SoLuongTon, 
        SoLuongBan, XuatXu, MoTa, BiXoa, MaLoaiSanPham, MaHangSanXuat) 
        VALUES ('$TenSP', $Gia, '$ngayLap', $SL, 0, '$XuatXu', '$MoTa' , 0 , $MaLoaiSanPham, $MaHangSanXuat)";
    }
    else{
        move_uploaded_file($file,$path);

        $sql = "INSERT INTO SanPham (TenSanPham, HinhURL, GiaSanPham, NgayNhap, SoLuongTon, 
    SoLuongBan, XuatXu, MoTa, BiXoa, MaLoaiSanPham, MaHangSanXuat) 
    VALUES ('$TenSP', '$fileName', $Gia, '$ngayLap', $SL, 0, '$XuatXu', '$MoTa' , 0 , $MaLoaiSanPham, $MaHangSanXuat)";
    }

    DataProvider::ExecuteQuery($sql);
    DataProvider::ChangeURL("../../index.php?c=2");
?>