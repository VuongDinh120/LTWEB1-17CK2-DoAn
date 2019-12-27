<?php
include "../../../lib/DataProvider.php";

    if(isset( $_GET["id"]))
    {
        $id = $_GET["id"];
        $Ten = $_GET["txtTen"];

        $sql = "UPDATE LoaiSanPham SET TenLoaiSanPham='$Ten'";

        DataProvider::ExecuteQuery($sql);
        DataProvider::ChangeURL("../../index.php?c=5");
    }
    else
    DataProvider::ChangeURL("../../index.php?c=404");
    

   
?>