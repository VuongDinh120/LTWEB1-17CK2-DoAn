<?php
    include "../../../lib/DataProvider.php";

        $us = $_POST["txtUS"];
        $ps = $_POST["txtPS"];
        $name = $_POST["txtName"];
        $add = $_POST["txtADD"];

        $MaLoaiTaiKhoan = $_POST["cmbLoaiTK"];

        $sql = "INSERT INTO TaiKhoan (TenDangNhap,MatKhau,TenHienThi,DiaChi, MaLoaiTaiKhoan, BiXoa)
        VALUES ('$us','$ps','$name','$add','$MaLoaiTaiKhoan',0)";
        DataProvider::ExecuteQuery($sql);
    
    DataProvider::ChangeURL("../../index.php?c=1");
?>