<a href="index.php?c=2&a=2" role="button" class="btn btn-success">
    Thêm sản phẩm mới
</a>
<div class="search-container">
    <form action="index.php" method="GET">
        <input type="text" placeholder="Loại sản phẩm" name="txtSearch">
        <input type="hidden" name="c" value="2">
        <input type="hidden" name="a" value="1">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
<table class="table table-striped table-hover" id="myTable">
    <thead>
        <tr class="bg-danger" style="color: white;">
            <th scope="col">ID</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Hình url</th>
            <th scope="col">Giá</th>
            <th scope="col">Ngày Nhập</th>
            <th scope="col">Số lượng tồn</th>
            <th scope="col">Số lượng bán</th>
            <th scope="col">Số lượt xem</th>
            <th scope="col">Loại</th>
            <th scope="col">Hãng</th>
            <th scope="col">Xuất xứ</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_GET["txtSearch"]))
        {
            $ten = $_GET["txtSearch"];
            $sql = "SELECT s.MaSanPham, s.TenSanPham, s.HinhURL, s.GiaSanPham, s.NgayNhap 
            , s.SoLuongTon, s.SoLuongBan, s.SoLuotXem, s.XuatXu, s.MoTa, s.BiXoa, l.TenLoaiSanPham, 
            h.TenHangSanXuat 
            FROM SanPham s, LoaiSanPham l, HangSanXuat h WHERE s.MaLoaiSanPham = l.MaLoaiSanPham 
            AND s.MaHangSanXuat=h.MaHangSanXuat and (s.TenSanPham LIKE '%$ten%' OR l.TenLoaiSanPham = '%$ten%'OR  h.TenHangSanXuat = '%$ten%') ORDER BY s.MaSanPham ASC";
        }
        else{
            $sql = "SELECT s.MaSanPham, s.TenSanPham, s.HinhURL, s.GiaSanPham, s.NgayNhap 
            , s.SoLuongTon, s.SoLuongBan, s.SoLuotXem, s.XuatXu, s.MoTa, s.BiXoa, l.TenLoaiSanPham, 
            h.TenHangSanXuat 
            FROM SanPham s, LoaiSanPham l, HangSanXuat h WHERE s.MaLoaiSanPham = l.MaLoaiSanPham 
            AND s.MaHangSanXuat=h.MaHangSanXuat ORDER BY s.MaSanPham ASC";
        }
       
        $result = DataProvider::ExecuteQuery($sql);
        while ($row = mysqli_fetch_array($result)) {

        ?>
            <tr>
                <td><?php echo $row["MaSanPham"]; ?></td>
                <td><?php echo $row["TenSanPham"]; ?></td>
                <td>
                    <img src="../image/<?php echo $row["HinhURL"]; ?>" height="50">
                </td>
                <td><?php echo $row["GiaSanPham"]; ?>đ</td>
                <td><?php echo $row["NgayNhap"]; ?></td>
                <td><?php echo $row["SoLuongTon"]; ?></td>
                <td><?php echo $row["SoLuongBan"]; ?></td>
                <td><?php echo $row["SoLuotXem"]; ?></td>
                <td><?php echo $row["TenLoaiSanPham"]; ?></td>
                <td><?php echo $row["TenHangSanXuat"]; ?></td>
                <td><?php echo $row["XuatXu"]; ?></td>
                <td>
                    <?php
                    if (strlen($row["MoTa"]) > 20)
                        $sMoTa = substr($row["MoTa"], 0, 20) . "...";
                    else
                        $sMoTa = $row["MoTa"];
                    echo $sMoTa;
                    ?>
                </td>
                <td>
                    <?php
                    if ($row["BiXoa"] == 1)
                        echo "Khóa";
                    else
                        echo "Đang bán";
                    ?>
                </td>
                <td class="action">
                    <a href="index.php?c=2&a=3&id=<?php echo $row["MaSanPham"]; ?>"><i class="material-icons update">&#xE254;</i></a>
                    <a href="pages/qlSanPham/xlXoa.php?id=<?php echo $row["MaSanPham"]; ?>"><i class="material-icons remove">&#xE872;</i></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>