<?php
include "../../../lib/DataProvider.php";

    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $sl = $_GET["txtSL"];
        $maDonDatHang =$_GET["idDH"];

        $sql= "SELECT GiaSanPham, SoLuongTon FROM SanPham WHERE MaSanPham = $id";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);

        $soLuongTonHienTai = $row["SoLuongTon"];
        $giaSanPham = $row["GiaSanPham"];

        $sttChiTietDonDatHang=sprintf("%02s",$id);
        $maChiTietDonDatHang =$maDonDatHang.$sttChiTietDonDatHang;

        $sql = "INSERT INTO ChiTietDonDatHang (MaChiTietDonDatHang, SoLuong, GiaBan, MaDonDatHang, MaSanPham) 
                VALUES('$maChiTietDonDatHang', $sl, $giaSanPham, '$maDonDatHang','$id')";

        DataProvider::ExecuteQuery($sql);

        $soLuongTonMoi = $soLuongTonHienTai - $sl;

        $sql = "UPDATE SanPham Set SoLuongTon = $soLuongTonMoi WHERE MaSanPham = $id";
        DataProvider::ExecuteQuery($sql);

            
        DataProvider::ChangeURL("../../index.php?c=3&a=2&id=$maDonDatHang");
    }
    else
        DataProvider::ChangeURL("../../index.php?c=404");
?>