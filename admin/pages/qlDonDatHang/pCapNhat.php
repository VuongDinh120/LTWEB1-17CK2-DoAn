<?php
if (!isset($_GET["idCTHD"]))
    DataProvider::ChangeURL("index.php?c=404");
$id = $_GET["idCTHD"];
$idDH = $_GET["id"];
$sql = "SELECT * FROM ChiTietDonDatHang WHERE MaChiTietDonDatHang = $id";

$result = DataProvider::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);

?>
<div class="modal fade" id="myModal">
    <div class="modal-dialog" >
        <div class="modal-content">
            <form action="pages/qlDonDatHang/xlCapNhat.php" method="GET" onsubmit="return KiemTra();">
                <!-- Modal Header -->
                <div class="modal-header" style="border-bottom-width: 0px;">
                    <h4 class="modal-title">Cập nhật đơn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">

                    <div class="form-row">
                        <div class="col-5">
                            <label for="cmbSP">Sản Phẩm</label>
                            <select name="id" class="form-control" id="cmbSP">
                                <?php
                                $sql = "SELECT * FROM SanPham WHERE SoLuongTon!=0 and BiXoa=0";
                                $result = DataProvider::ExecuteQuery($sql);
                                while ($row1 = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?php echo $row1["MaSanPham"]; ?>" <?php if ($row["MaSanPham"] == $row1["MaSanPham"]) echo "selected"; ?>>
                                        <?php echo $row1["TenSanPham"]; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-4">
                        <label for="txtSL">Số lượng</label>
                            <input type="number" name="txtSL" class="form-control" id="txtSL" value="<?php echo $row["SoLuong"]; ?>">
                            <div class="err" id="errSL"></div>
                            <input type="hidden" name="idCTDH" class="form-control" value="<?php echo $id ?>">
                            <input type="hidden" name="idDH" class="form-control" value="<?php echo $idDH ?>">
                        </div>
                        <div class="col-4">
                        <label for="txtSL">Giá Bán</label>
                            <input type="number" name="txtBan" class="form-control" id="txtBan" value="<?php echo $row["GiaBan"]; ?>">
                            <div class="err" id="errBan"></div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer" style="border-bottom-width: 0px;border-top-width: 0px;">
                    <input type="submit" class="btn btn-primary" value="Thêm">
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


        var ten = document.getElementById("txtSL");
        var err = document.getElementById("errSL");

        if (ten.value == "") {
            err.value = "Số lượng Không được bỏ trống";
            ten.focus();
            return false;
        } else
            err.innerHTML = "";

        ten = document.getElementById("txtBan");
        err = document.getElementById("errBan");

        if (ten.value == "") {
            err.value = "Giá bán Không được bỏ trống";
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