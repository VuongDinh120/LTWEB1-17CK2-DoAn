<?php
include "../../../lib/DataProvider.php";

    if(isset( $_GET["id"]))
    {
        $id = $_GET["id"];
        $Ten = $_GET["txtTen"];

        $sql = "UPDATE HangSanXuat SET TenHangSanXuat='$Ten'";

        DataProvider::ExecuteQuery($sql);
        DataProvider::ChangeURL("../../index.php?c=4");
    }
    else
    DataProvider::ChangeURL("../../index.php?c=404");
    

   
?>