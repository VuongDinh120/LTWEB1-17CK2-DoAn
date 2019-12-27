<a href="index.php?c=3&a=1" role="button" class="btn btn-success">
    Thêm đơn hàng
</a>
<div class="search-container">
    <form action="index.php" method="GET">
        <input type="text" placeholder="Loại sản phẩm" name="txtSearch">
        <input type="hidden" placeholder="Loại sản phẩm" name="c" value="3">
        <input type="hidden" placeholder="Loại sản phẩm" name="a" value="0">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
<table class="table table-striped table-hover" id="myTable">
    <thead>
        <tr class="bg-danger" style="color: white;">
            <th scope="col">STT</th>
            <th scope="col">Mã đơn đặt hàng</th>
            <th scope="col">Ngày lập</th>
            <th scope="col">Khách hàng</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_GET["txtSearch"]))
        {
            $ten = $_GET["txtSearch"];
            $sql = "SELECT d.MaDonDatHang, d.NgayLap, d.MaTinhTrang, t.TenHienThi, tt.TenTinhTrang 
            FROM DonDatHang d, TaiKhoan t, TinhTrang tt 
            WHERE d.MaTaiKhoan = t.MaTaiKhoan and d.MaTinhTrang = tt.MaTinhTrang AND (d.MaDonDatHang LIKE '%$ten%' OR t.TenHienThi LIKE '%$ten%' OR tt.TenTinhTrang LIKE '%$ten%') ";
        }
        else{
            $sql = "SELECT d.MaDonDatHang, d.NgayLap, d.MaTinhTrang, t.TenHienThi, tt.TenTinhTrang 
            FROM DonDatHang d, TaiKhoan t, TinhTrang tt 
            WHERE d.MaTaiKhoan = t.MaTaiKhoan and d.MaTinhTrang = tt.MaTinhTrang
            ORDER BY d.MaTinhTrang, d.NgayLap";
        }
       
        $result = DataProvider::ExecuteQuery($sql);
        $i=1;
        while ($row = mysqli_fetch_array($result)) {
            $c = "";
            switch($row["MaTinhTrang"]){
                case 2:
                    $c="classGiaoHang";
                break;
                case 3:
                    $c="classThanhToan";
                break;
                case 4:
                    $c="classHuy";
                break;
            }
        ?>
            <tr class="<?php echo $c ;?>">
                <td><?php echo $i++; ?></td>
                <td><?php echo $row["MaDonDatHang"]; ?></td>
                <td><?php echo $row["NgayLap"]; ?></td>
                <td><?php echo $row["TenHienThi"]; ?></td>
                <td><?php echo $row["TenTinhTrang"]; ?></td>
                <td class="action">
                    <a href="index.php?c=3&a=2&id=<?php echo $row["MaDonDatHang"]; ?>"><i class="material-icons update">&#xE254;</i></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>