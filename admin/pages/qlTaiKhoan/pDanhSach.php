<a href="index.php?c=1&a=2" role="button" class="btn btn-success">
    Thêm hãng sản xuất
</a>
<div class="search-container">
    <form action="index.php" method="GET">
        <input type="text" placeholder="Loại sản phẩm" name="txtSearch">
        <input type="hidden" name="c" value="1">
        <input type="hidden" name="a" value="1">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
<table class="table table-striped table-hover" id="myTable">
    <thead>
        <tr class="bg-danger" style="color: white;">
            <th scope="col">ID</th>
            <th scope="col">Tên Đăng nhập</th>
            <th scope="col">Tên hiển thị</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Điện thoại</th>
            <th scope="col">Email</th>
            <th scope="col">Tình Trạng</th>
            <th scope="col">Loại tài khoản</th>
            <th scope="col">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_GET["txtSearch"]))
        {
            $ten = $_GET["txtSearch"];
            $sql = "SELECT t.MaTaiKhoan, t.TenDangNhap, t.TenHienThi, t.DiaChi, t.DienThoai, t.Email, t.BiXoa, l.TenLoaiTaiKhoan 
                    FROM TaiKhoan t, LoaiTaiKhoan l WHERE t.MaLoaiTaiKhoan = l.MaLoaiTaiKhoan AND (t.TenDangNhap LIKE '%$ten%' OR t.TenHienThi like '%$ten%')";
        }
        else{
            $sql = "SELECT t.MaTaiKhoan, t.TenDangNhap, t.TenHienThi, t.DiaChi, t.DienThoai, t.Email, t.BiXoa, l.TenLoaiTaiKhoan 
                    FROM TaiKhoan t, LoaiTaiKhoan l WHERE t.MaLoaiTaiKhoan = l.MaLoaiTaiKhoan";
        }
       
        $result = DataProvider::ExecuteQuery($sql);
        while ($row = mysqli_fetch_array($result)) {

        ?>
            <tr>
                <td><?php echo $row["MaTaiKhoan"]; ?></td>
                <td><?php echo $row["TenDangNhap"]; ?></td>
                <td><?php echo $row["TenHienThi"]; ?></td>
                <td><?php echo $row["DiaChi"]; ?></td>
                <td><?php echo $row["DienThoai"]; ?></td>
                <td><?php echo $row["Email"]; ?></td>
                <td>
                    <?php
                    if ($row["BiXoa"] == 1)
                        echo "Khóa";
                    else
                        echo "Còn hoạt động";
                    ?>
                </td>
                <td><?php echo $row["TenLoaiTaiKhoan"]; ?></td>
                <td class="action">
                    <a href="index.php?c=1&a=3&id=<?php echo $row["MaTaiKhoan"]; ?>"><i class="material-icons update">&#xE254;</i></a>
                    <a href="pages/qlTaiKhoan/xlXoa.php?id=<?php echo $row["MaTaiKhoan"]; ?>"><i class="material-icons remove">&#xE872;</i></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>