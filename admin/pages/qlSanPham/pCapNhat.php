<?php
if (!isset($_GET["id"]))
    DataProvider::ChangeURL("index.php?c=404");
$id = $_GET["id"];
$sql = "SELECT s.MaSanPham, s.TenSanPham, s.HinhURL, s.GiaSanPham, s.NgayNhap, s.SoLuongTon, s.SoLuongBan, 
s.SoLuotXem, s.XuatXu, s.MoTa, s.BiXoa, l.MaLoaiSanPham, h.MaHangSanXuat 
FROM SanPham s, LoaiSanPham l, HangSanXuat h WHERE s.MaLoaiSanPham = l.MaLoaiSanPham 
AND s.MaHangSanXuat = h.MaHangSanXuat AND s.MaSanPham=$id";

$result = DataProvider::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);

?>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="pages/qlSanPham/xlCapNhat.php" method="POST" onsubmit="return KiemTra()" enctype="multipart/form-data">
                <!-- Modal Header -->
                <div class="modal-header" style="border-bottom-width: 0px;">
                    <h4 class="modal-title">Thông tin sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col-8">
                            <label for="txtNSP">Tên Sản Phẩm</label>
                            <input type="text" name="txtNSP" class="form-control" id="txtNSP" value="<?php echo $row["TenSanPham"]; ?>">
                            <div class="err" id="errNSP"></div>
                            <input type="hidden" name="id" class="form-control" id="txtID" value="<?php echo $id ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-4">
                            <label for="cmbHangSX">Hãng sản xuất</label>
                            <select name="cmbHangSX" class="form-control" id="cmbHangSX">
                                <?php
                                $sql = "SELECT * FROM HangSanXuat WHERE BiXoa=0";
                                $result = DataProvider::ExecuteQuery($sql);
                                while ($row1 = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?php echo $row1["MaHangSanXuat"]; ?>" <?php if ($row["MaHangSanXuat"] == $row1["MaHangSanXuat"]) echo "selected"; ?>>
                                        <?php echo $row1["TenHangSanXuat"]; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="cmbLoaiSP">Loại sản phẩm</label>
                            <select name="cmbLoaiSP" class="form-control" id="cmbLoaiSP">
                                <?php
                                $sql = "SELECT * FROM LoaiSanPham WHERE BiXoa=0";
                                $result = DataProvider::ExecuteQuery($sql);
                                while ($row1 = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?php echo $row1["MaLoaiSanPham"]; ?>" <?php if ($row["MaLoaiSanPham"] == $row1["MaLoaiSanPham"]) echo "selected"; ?>>
                                        <?php echo $row1["TenLoaiSanPham"]; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="txtXS">Xuất xứ</label>
                            <input type="text" name="txtXS" class="form-control" id="txtXS" value="<?php echo $row["XuatXu"] ?>">
                            <div class="err" id="errXS"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="txtGia">Giá</label>
                            <input type="number" name="txtGia" class="form-control" id="txtGia" value="<?php echo $row["GiaSanPham"] ?>">
                            <div class="err" id="errGia"></div>
                        </div>
                        <div class="col">
                            <label for="txtSL">Số Lượng Tồn</label>
                            <input type="number" name="txtSL" class="form-control" id="txtSL" value="<?php echo $row["SoLuongTon"] ?>">
                            <div id="errSL"></div>
                        </div>
                        <div class="col">
                            <label for="txtSL">Số Lượng Bán</label>
                            <input type="number" name="txtBan" class="form-control" id="txtBan" value="<?php echo $row["SoLuongBan"] ?>">
                            <div class="err" id="errSL"></div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="txtMoTa">Mô tả</label>
                        <textarea class="form-control" name="txtMoTa" id="txtMoTa" rows="3"><?php echo $row["MoTa"] ?></textarea>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="txtHinhURL">Hình sản phẩm</label>
                            <input type="file" name="myFile" class="form-control-file" id="txtHinhURL" />
                        </div>
                        <div class="col">
                            <img src="../image/<?php echo $row["HinhURL"] ?>" width="75" />
                        </div>

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


var ten = document.getElementById("txtNSP");
var err = document.getElementById("errNSP");

if (ten.value == "") {
    err.value = "Tên sản phẩm không được bỏ trống";
    ten.focus();
    return false;
} else
    err.innerHTML = "";

ten = document.getElementById("txtXS");
err = document.getElementById("errXS");

if (ten.value == "") {
    err.value = "Xuất xứ không được bỏ trống";
    ten.focus();
    return false;
} else
    err.innerHTML = "";

ten = document.getElementById("txtGia");
err = document.getElementById("errGia");

if (ten.value == "") {
    err.value = "Giá Không được bỏ trống";
    ten.focus();
    return false;
} else
    err.innerHTML = "";

ten = document.getElementById("txtSL");
err = document.getElementById("errSL");

if (ten.value == "") {
    err.value = "Số lượng Không được bỏ trống";
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