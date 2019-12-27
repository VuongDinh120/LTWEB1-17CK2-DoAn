<?php
    include "../../../lib/DataProvider.php";

    if(isset($_GET["idCTHD"])&&isset($_GET["id"]))
    {
        $idDH=$_GET["id"];
        $id = $_GET["idCTHD"];
        $sql = "DELETE ChiTietDonDatHang WHERE MaChiTietDonDatHang = $id";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=2&id=$idDH");
?>
