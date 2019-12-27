<div class="header">
    <div class="top-header">
        <a class="logo" href="index.php">
            <img src="img/logo3_200x200.png" width="150" height="70" alt="Logo">
        </a>
        <div class="login-container">
            <?php
            if (isset($_SESSION["MaTaiKhoan"])) {
            ?>
                <div class="dropdown" style="float:right;">
                    <a href="" class="dropbtn">
                        <i class="fa fa-user-circle" aria-hidden="true">
                        </i>
                        <?php echo $_SESSION["TenHienThi"]; ?>
                    </a>
                    <div class="dropdown-content">
                        <a href="#">Tài khoản của tôi</a>
                        <a href="index.php?a=5">Giỏ hàng</a>
                        <a href="modules/xlDangXuat.php">Đăng xuất</a>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div id="myModal" class="modal fade">
                    <div class="modal-dialog modal-login">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="avatar">
                                    <img src="img/avatar.png" alt="Avatar">
                                </div>
                                <h4 class="modal-title">Đăng nhập</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form name="frmLogin" action="modules/xlDangNhap.php" method="post" onsubmit="return KiemTraDangNhap()">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="txtUS" id="txtUS" placeholder="Tên đăng nhập" required="required">
                                        <div class="err" id="eUS"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="txtPS" id="txtPS" placeholder="Mật khẩu" required="required">
                                        <div class="err" id="ePS"></div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" data-toggle="modal" data-target="#myModal">
                    <h6>Đăng nhập</h6>
                </a>
                <a href="./index.php?a=6">
                    <h6>Đăng ký</h6>
                </a>
        </div>
        <script type="text/javascript">
            function KiemTraDangNhap() {
                var co = true;

                var control = document.getElementById('txtUS');
                var err = document.getElementById('eUS');
                if (control.value == "") {
                    co = false;

                    err.innerHTML = "Tên đăng nhập không được rỗng";
                } else {
                    err.innerHTML = "";

                }

                control = document.getElementById('txtPS');
                err = document.getElementById('ePS');
                if (control.value == "") {
                    co = false;

                    err.innerHTML = "Mật khẩu không được rỗng";
                } else {
                    err.innerHTML = "";

                }

                return co;
            }
        </script>
    <?php
            }
    ?>
    </div>
</div>
<div class="bottom-header">
    <a href="index.php">Trang chủ</a>
    <a href="#">Sản phẩm</a>
    <a href="#">Liên hệ</a>
    <a href="#">Thông tin</a>
    <div class="search-container">
        <form action="#" method="GET">
            <input type="text" placeholder="Tìm kiếm sản phẩm" name="txtSearch">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
</div>