<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="pages/qlDonDatHang/xlThemMoi.php" method="GET">
                <!-- Modal Header -->
                <div class="modal-header" style="border-bottom-width: 0px;">
                    <h4 class="modal-title">Thêm đơn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">

                    <div class="form-row">
                        <div class="col-8">
                            <label for="cbmTK">Tên khách hàng</label>
                            <select name="id" class="form-control" id="cbmTK">
                                <?php
                                $sql = "SELECT * FROM TaiKhoan WHERE BiXoa=0";
                                $result = DataProvider::ExecuteQuery($sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?php echo $row["MaTaiKhoan"]; ?>"><?php echo $row["TenHienThi"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
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


<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>