<?php
    session_start();
    include "../../lib/DataProvider.php";

    if(isset($_POST["us"]))
    {
        $us = $_POST["txtUS"];
        $ps = $_POST["txtPS"];
        $name = $_POST["txtFname"].$_POST["txtLname"];
        $birth = $_POST["lsbYear"].'-'.$_POST["lsbMonth"].'-'.$_POST["lsbDate"];
        $add = $_POST["txtDiaChi"];
       
        $sql = "SELECT * FROM TaiKhoan WHERE TenDangNhap = '$us'";
        $result=DataProvider::ExecuteQuery($sql);
        $row=mysqli_fetch_array($result);
        if($row != null)
        {
            $curURL =$_SESSION["path"];
            DataProvider::ChangeURL("../../..".$curURL."&err=1");
        }
        else
        {
            $sql="INSERT INTO TaiKhoan(TenDangNhap, MatKhau, TenHienthi, DiaChi, NgaySinh, MaLoaiTaiKhoan) 
                    VALUES ('$us', '$ps', '$name', '$add', '$birth' ,1)";

            DataProvider::ExecuteQuery($sql);
            
            $sql = "SELECT MaTaiKhoan FROM TaiKhoan WHERE TenDangNhap='$us' AND MatKhau='$ps'";
            $result = DataProvider::ExecuteQuery($sql);
            $row = mysqli_fetch_array($result);

            $_SESSION["MaTaiKhoan"] = $row["MaTaiKhoan"];
            $_SESSION["MaLoaiTaiKhoan"] = 1;
            $_SESSION["TenHienThi"] = $name;

            DataProvider::ChangeURL("../../index.php");
        }
    }
    else
    {
        DataProvider::ChangeURL("../../index.php?a=404");
    }
?>