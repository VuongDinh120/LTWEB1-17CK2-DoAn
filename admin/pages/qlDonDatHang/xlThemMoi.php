<?php
include "../../../lib/DataProvider.php";

    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $ngayLap = date("Y-m-d H:i:s");
        $ngayLapTam = date("Y-m-d");
        $maTinhTrang = 1;
        $tongGia = 0;

        $sql = "SELECT MaDonDatHang FROM DonDatHang WHERE NgayLap like '$ngayLapTam%' ORDER BY MaDonDatHang DESC LIMIT 1";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        //$r = "081012003";
        $sttMaDonDatHang=0;
        if($row != null)
        {
            $sttMaDonDatHang = substr($row["MaDonDatHang"],6,3);
        }
        $sttMaDonDatHang += 1;
        $sttMaDonDatHang = sprintf("%03s",$sttMaDonDatHang);

        $maDonDatHang = date("d").date("m").substr(date("Y"),2,2).$sttMaDonDatHang;

        $sql = "INSERT INTO DonDatHang (MaDonDatHang, NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang)
        VALUES ('$maDonDatHang', '$ngayLap', $tongGia, $id, $maTinhTrang)";

        DataProvider::ExecuteQuery($sql);
        DataProvider::ChangeURL("../../index.php?c=3");
    }
    else
    DataProvider::ChangeURL("../../index.php?c=404");
    

   
?>