<?php

$id = $_GET["id"];
$sql = "SELECT TenDangNhap, MaLoaiTaiKhoan FROM TaiKhoan WHERE MaTaiKhoan = $id";
$result = DataProvider::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);
$TenDangNhap = $row["TenDangNhap"];
$MaLoaiTaiKhoan = $row["MaLoaiTaiKhoan"];

?>
<!-- <button type="button" id="btnThemSp" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                Thêm sản phẩm mới
            </button> -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog ">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="border-bottom-width: 0px;">
                <h4 class="modal-title">Thông tin tài khoản</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <!-- Modal body -->
            <form action="pages/qlTaiKhoan/xlCapNhat.php" method="GET">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="txtUS">Tên đăng nhập</label>
                        <input type="text" name="txtUS" class="form-control" id="txtUS" value="<?php echo $TenDangNhap; ?>" disabled>
                        <input type="hidden" name="id" class="form-control" id="txtID" value="<?php echo $id ?>">
                    </div>
                    <div class="form-group">
                        <label for="cmbLoaiTK">Loại tài khoản</label>
                        <select name="cmbLoaiTK" class="form-control" id="cmbLoaiTK">
                            <?php
                            $sql = "SELECT * FROM LoaiTaiKhoan";
                            $result = DataProvider::ExecuteQuery($sql);
                            while ($row = mysqli_fetch_array($result)) {
                                if ($row["MaLoaiTaiKhoan"] == $MaLoaiTaiKhoan)
                                    echo "<option value='" . $row["MaLoaiTaiKhoan"] . "' selected>" . $row["TenLoaiTaiKhoan"] . "</option>";
                                else
                                    echo "<option value='" . $row["MaLoaiTaiKhoan"] . "'>" . $row["TenLoaiTaiKhoan"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer" style="border-bottom-width: 0px;border-top-width: 0px;">
                    <input type="submit" class="btn btn-primary" value="Cập nhật">
                    <button type="button" class="btn btn-danger" id="btnHuy" data-dismiss="modal">
                        Hủy thao tác
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>