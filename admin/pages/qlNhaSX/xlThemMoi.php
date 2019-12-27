<?php
include "../../../lib/DataProvider.php";

    if(isset($_GET["txtTen"]))
    {
        $id = $_GET["id"];
        $Ten = $_GET["txtTen"];

        $sql = "INSERT INTO HangSanXuat (TenHangSanXuat, BiXoa)
        VALUES ('$Ten',0)";

        DataProvider::ExecuteQuery($sql);
        DataProvider::ChangeURL("../../index.php?c=4");
    }
    else
    DataProvider::ChangeURL("../../index.php?c=404");
    

   
?>