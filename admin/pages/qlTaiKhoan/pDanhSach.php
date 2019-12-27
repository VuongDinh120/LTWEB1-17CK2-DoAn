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
        $sql = "SELECT t.MaTaiKhoan, t.TenDangNhap, t.TenHienThi, t.DiaChi, t.DienThoai, t.Email, t.BiXoa, l.TenLoaiTaiKhoan 
                    FROM TaiKhoan t, LoaiTaiKhoan l WHERE t.MaLoaiTaiKhoan = l.MaLoaiTaiKhoan";
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
                    <a href="index.php?c=1&a=1&id=<?php echo $row["MaTaiKhoan"]; ?>"><i class="material-icons update">&#xE254;</i></a>
                    <a href="pages/qlTaiKhoan/xlXoa.php?id=<?php echo $row["MaTaiKhoan"]; ?>"><i class="material-icons remove">&#xE872;</i></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>