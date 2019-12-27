<?php
include "../../../lib/DataProvider.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sl = $_GET["txtSL"];
    $gia = $_GET["txtBan"];
    $maDonDatHang = $_GET["idDH"];
    $maChiTietDonDatHang = $_GET["idDH"];

    $sql = "SELECT GiaSanPham, SoLuongTon FROM SanPham WHERE MaSanPham = $id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);

    $soLuongTonHienTai = $row["SoLuongTon"];

    $sql = "SELECT MaSanPham, SoLuong FROM ChiTietDonDatHang WHERE MaChiTietDonDatHang = $maChiTietDonDatHang  ";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);

    $slCTHDHienTai = $row["SoLuong"];
    $idSPHienTai = $row["MaSanPham"];
    
    if ($id != $idSPHienTai) {
        $soLuongTonMoi = $soLuongTonHienTai - $sl;
        $sql = "UPDATE SanPham Set SoLuongTon = $soLuongTonMoi
        WHERE MaSanPham = $id";
        DataProvider::ExecuteQuery($sql);

        $sql = "UPDATE SanPham Set SoLuongTon = $slCTHDHienTai
        WHERE MaSanPham = $idSPHienTai";
        DataProvider::ExecuteQuery($sql);
    }
    else{
        $soLuongTonMoi = $soLuongTonHienTai + ($slCTHDHienTai - $sl);
        $sql = "UPDATE SanPham Set SoLuongTon = $soLuongTonMoi
        WHERE MaSanPham = $id";
        DataProvider::ExecuteQuery($sql);
    }
    $sql = "UPDATE ChiTietDonDatHang Set SoLuong = $sl, GiaBan = $gia, MaSanPham = $id
        WHERE MaChiTietDonDatHang = $maChiTietDonDatHang";
    DataProvider::ExecuteQuery($sql);

    DataProvider::ChangeURL("../../index.php?c=3&a=4&id=$maDonDatHang");
} else
    DataProvider::ChangeURL("../../index.php?c=404");
?>