<?php
if (!isset($_GET["id"]))
    DataProvider::ChangeURL("index.php?c=404");
$id = $_GET["id"];
$sql = "SELECT * FROM HangSanXuat WHERE MaHangSanXuat = $id";

$result = DataProvider::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);
?>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="pages/qlNhaSX/xlCapNhat.php" method="GET" onsubmit="return KiemTra();">
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
                            <label for="txtTen">Tên hãng sản xuất</label>
                            <input type="text" name="txtTen" class="form-control" id="txtTen" value="<?php echo $row["TenHangSanXuat"] ?>">
                            <div class="err" id="errTen"></div>
                            <input type="hidden" name="id" class="form-control" id="txtID" value="<?php echo $id ?>">
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


        var ten = document.getElementById("txtTen");
        var err = document.getElementById("errTen");

        if (ten.value == "") {
            err.value = "Tên Loại sản phẩm Không được bỏ trống";
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