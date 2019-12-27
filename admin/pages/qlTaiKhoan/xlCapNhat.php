<?php
    include "../../../lib/DataProvider.php";

    if(isset($_POST["id"])){
        $id = $_POST["id"];
        $us = $_POST["txtUS"];
        $ps = $_POST["txtPS"];
        $name = $_POST["txtName"];
        $add = $_POST["txtADD"];

        $MaLoaiTaiKhoan = $_POST["cmbLoaiTK"];

        $sql = "UPDATE TaiKhoan SET MaLoaiTaiKhoan = '$MaLoaiTaiKhoan', TenDangNhap='$us', MatKhau='$ps', TenHienThi='$name', DiaChi='$add' WHERE MaTaiKhoan =$id";
        DataProvider::ExecuteQuery($sql);

        DataProvider::ChangeURL("../../index.php?c=1"); 
    }
    DataProvider::ChangeURL("../../index.php?c=404");
?>