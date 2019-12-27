<?php
include "../../../lib/DataProvider.php";

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $MaLoaiSanPham = $_POST["cmbLoaiSP"];
    $MaHangSanXuat = $_POST["cmbHangSX"];
    $TenSP = $_POST["txtNSP"];
    $XuatXu = $_POST["txtXS"];
    $Gia = $_POST["txtGia"];
    $SL = $_POST["txtSL"];
    $SLBan = $_POST["txtBan"];
    $MoTa = $_POST["txtMoTa"];

    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $ngayLap = date("Y-m-d H:i:s");

    $file = $_FILES['myFile']['tmp_name'];
    $path = "../../../image/".basename($_FILES['myFile']['name']);    
    $fileName = $_FILES['myFile']['name'];
    if (file_exists($path) || !is_uploaded_file($file)) {
       
        $sql = "UPDATE SanPham SET TenSanPham = '$TenSP', GiaSanPham = $Gia, 
    NgayNhap = '$ngayLap', SoLuongTon = $SL, SoLuongBan = $SLBan, XuatXu = '$XuatXu', MoTa ='$MoTa', 
    BiXoa = 0, MaLoaiSanPham = $MaLoaiSanPham, MaHangSanXuat = $MaHangSanXuat  
    WHERE MaSanPham =$id";

    }
    else{
        move_uploaded_file($file,$path);

        $sql = "UPDATE SanPham SET TenSanPham = '$TenSP', HinhURL='$fileName', GiaSanPham = $Gia, 
        NgayNhap = '$ngayLap', SoLuongTon = $SL, SoLuongBan = $SLBan, XuatXu = '$XuatXu', MoTa ='$MoTa', 
        BiXoa = 0, MaLoaiSanPham = $MaLoaiSanPham, MaHangSanXuat = $MaHangSanXuat  
        WHERE MaSanPham = $id";
    }

    

    DataProvider::ExecuteQuery($sql);
}
DataProvider::ChangeURL("../../index.php?c=2");
?>