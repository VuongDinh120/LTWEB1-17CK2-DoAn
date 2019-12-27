<?php
if (!isset($_GET["id"]))
    DataProvider::ChangeURL("index.php?c=404");
$id = $_GET["id"];
$sql = "SELECT d.MaDonDatHang, d.NgayLap, d.TongThanhTien, t.TenHienThi, t.DiaChi, t.DienThoai, tt.MaTinhTrang, tt.TenTinhTrang 
    FROM DonDatHang d, TaiKhoan t, TinhTrang tt 
    WHERE d.MaTaiKhoan = t.MaTaiKhoan and d.MaTinhTrang = tt.MaTinhTrang and MaDonDatHang = $id";

$result = DataProvider::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);

?>
<div class="contain" style=" width: 70%; margin: auto;  ">
<fieldset class="inform">
    <legend>Thông tin đơn đặt hàng</legend>
    <table style="border-width:0">
        <tr>
            <td>Mã đơn đặt hàng:</td>
            <td><?php echo $row["MaDonDatHang"]; ?></td>
        </tr>
        <tr>
            <td>Ngày đặt hàng:</td>
            <td><?php echo $row["NgayLap"]; ?></td>
        </tr>
        <tr>
            <td>Tên Khách hàng:</td>
            <td><?php echo $row["TenHienThi"]; ?></td>
        </tr>
        <tr>
            <td>Số điện thoại:</td>
            <td><?php echo $row["DienThoai"]; ?></td>
        </tr>
        <tr>
            <td>Địa chỉ giao hàng:</td>
            <td><?php echo $row["DiaChi"]; ?></td>
        </tr>
        <tr>
            <td>Tổng thành tiền:</td>
            <td><?php echo $row["TongThanhTien"]; ?></td>
        </tr>
        <tr>
            <td>Tình trạng:</td>
            <td><?php echo $row["TenTinhTrang"]; ?></td>
        </tr>
    </table>
    <a href="pages/qlDonDatHang/xlDonDatHang.php?a=2&id=<?php echo $id; ?>" class="btn btn-GiaoHang classGiaoHang" ;>
        Giao Hàng
    </a>
    <a href="pages/qlDonDatHang/xlDonDatHang.php?a=3&id=<?php echo $id; ?>" class="btn btn-ThanhToan classThanhToan" ;>
        Thanh toán
    </a>
    <a href="pages/qlDonDatHang/xlDonDatHang.php?a=4&id=<?php echo $id; ?>" class="btn btn-Huy classHuy" ;>
        Hủy đơn hàng
    </a>

</fieldset>
<h2 style="text-align: center">Chi tiết đơn hàng</h2>

<a href="index.php?c=3&a=3&id=<?php echo $id; ?>" role="button" class="btn btn-success">
    Thêm sản phẩm
</a>
<table class="table table-striped table-hover" id="myTable">
    <thead>
        <tr class="bg-danger" style="color: white;">
            <th scope="col">STT</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Hình</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá bán</th>
            <th scope="col">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT c.MaChiTietDonDatHang, s.TenSanPham, s.HinhURL, c.SoLuong, c.GiaBan FROM ChiTietDonDatHang c, SanPham s WHERE c.MaSanPham = s.MaSanPham AND c.MaDonDatHang = $id";
        $result = DataProvider::ExecuteQuery($sql);

        $i = 1;
        while ($row = mysqli_fetch_array($result)) {

        ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row["TenSanPham"]; ?></td>
                <td>
                    <img src="../image/<?php echo $row["HinhURL"]; ?>" height="50">
                </td>
                <td><?php echo $row["SoLuong"]; ?></td>
                <td><?php echo $row["GiaBan"]; ?> đ</td>
                <td class="action">
                    <a href="index.php?c=3&a=4&id=<?php echo $id; ?>&idCTHD=<?php echo $row["MaChiTietDonDatHang"]; ?>"><i class="material-icons update">&#xE254;</i></a>
                    <a href="pages/qlDonDatHang/xlXoa.php?id=<?php echo $id; ?>&idCTHD=<?php echo $row["MaChiTietDonDatHang"]; ?>"><i class="material-icons remove">&#xE872;</i></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>
</div>


