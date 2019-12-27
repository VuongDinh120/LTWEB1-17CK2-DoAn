<div class="modal fade" id="myModal">
    <div class="modal-dialog ">
        <div class="modal-content">
            <!-- Modal Header -->
            <form action="pages/qlTaiKhoan/xlThemMoi.php" method="POST">
                <div class="modal-header" style="border-bottom-width: 0px;">
                    <h4 class="modal-title">Thông tin tài khoản</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">

                    <div class="form-group">
                        <label for="txtUS">Tên đăng nhập</label>
                        <input type="text" name="txtUS" class="form-control" id="txtUS" value="">
                        <input type="hidden" name="id" class="form-control" id="txtID" value="">
                    </div>
                    <div class="form-group">
                        <label for="txtPS">Mật Khẩu</label>
                        <input type="text" name="txtPS" class="form-control" id="txtPS" value="">

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
                    <div class="form-group">
                        <label for="txtName">Tên Hiển Thị</label>
                        <input type="text" name="txtName" class="form-control" id="txtName" value="">

                    </div>
                    <div class="form-group">
                        <label for="txtADD">Địa Chỉ</label>
                        <input type="text" name="txtADD" class="form-control" id="txtADD" value="">
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
<script>
    function KiemTra() {


        var ten = document.getElementById("txtUS");
        var err = document.getElementById("errUS");

        if (ten.value == "") {
            err.value = "Tên Đăng nhập Không được bỏ trống";
            ten.focus();
            return false;
        } else
            err.innerHTML = "";

        ten = document.getElementById("txtPS");
        err = document.getElementById("errPS");

        if (ten.value == "") {
            err.value = "Mật Khẩu Không được bỏ trống";
            ten.focus();
            return false;
        } else
            err.innerHTML = "";
            
        ten = document.getElementById("txtName");
        err = document.getElementById("errName");

        if (ten.value == "") {
            err.value = "Tên hiển thị Không được bỏ trống";
            ten.focus();
            return false;
        } else
            err.innerHTML = "";

        ten = document.getElementById("txtADD");
        err = document.getElementById("errADD");

        if (ten.value == "") {
            err.value = "Địa Chỉ Không được bỏ trống";
            ten.focus();
            return false;
        } else
            err.innerHTML = "";

        return true;
    }
</script>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>