<div class="register-contain" style="background-color: white;">
    <h1 style="text-align: center; color: #70c5c0; margin-bottom: 50px;">Đăng ký</h1>
    <form action="pages/TaoTaiKhoan/xlTaoTaiKhoan.php"  onsubmit="return KiemTra()" method="POST">

        <div class="row">
            <div class="col">
                <label>Tên đăng nhập</label>
                <input type="text" id="username" name="us" class="form-control" placeholder="UserName" >
                <div class="err" id="errUS"></div>
                <?php
                if (isset($_GET["err"])) {
                ?>

                    <div class="err">Tên đăng nhập đã tồn tại</div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Mật khẩu</label>
                <input type="password"  id="password" name="ps" class="form-control" placeholder="PassWord" >
                <div class="err" id="errPS"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Xác nhận Mật khẩu</label>
                <input type="password" id="txtRePS" class="form-control" placeholder="Re-PassWord" >
                <div class="err" id="eRPS"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Họ và tên đệm</label>
                <input type="text" id="txtFname" name="txtFname" class="form-control" placeholder="First name" >
                <div class="err" id="eFNAME"></div>
            </div>
            <div class="col">
                <label>Tên</label>
                <input type="text" id="txtLname" name="txtLname" class="form-control" placeholder="Last name" >
                <div class="err" id="eLNAME"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="birth-date">Ngày sinh</label>
                <select class="bear-dates form-control" name="lsbDate" id="birth-date"></select>
            </div>
            <div class="col">
                <label for="birth-month">Tháng sinh</label>
                <select class="bear-months form-control" name="lsbMonth" id="birth-month"></select>
            </div>
            <div class="col">
                <label for="birth-year">Năm sinh</label>
                <select class="bear-years form-control" name="lsbYear" id="birth-year"></select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="city">Sống tại</label>
                <input type="text" name="txtDiaChi" class="form-control" id="txtDiaChi" placeholder="Address" >
                <div class="err" id="eADD"></div>
            </div>
        </div>
        <input class="btn btn-primary" type="submit" value="Đăng ký" style="float: right;"">

    </form>

</div>
<script type="text/javascript">
function KiemTra() {
        var co = true;

        var control = document.getElementById('username');
        var err = document.getElementById('errUS');

        if (control.value == '') {
            co = false;

            err.innerHTML = "Tên đăng nhập không được rỗng";
        } else {
            err.innerHTML = "";
        }

        control = document.getElementById('password');
        err = document.getElementById('errPS');
        if (control.value == "") {
            co = false;

            err.innerHTML = "Mật khẩu không được rỗng";
        } else {
            err.innerHTML = "";

        }


        control = document.getElementById('txtRePS');
        err = document.getElementById('eRPS');
        if (control.value == "") {
            co = false;

            err.innerHTML = "Nhập lại Mật khẩu không được rỗng";
        } else {
            err.innerHTML = "";

        }

        var control1 = document.getElementById('txtRePS');
        control = document.getElementById('password');
        err = document.getElementById('eRPS');
        if (control.value != control1.value) {
            co = false;

            err.innerHTML = "Nhập lại Mật khẩu không trùng khớp";
        } else {
            err.innerHTML = "";

        }

        control = document.getElementById('txtFname');
        err = document.getElementById('eFNAME');
        if (control.value == "") {
            co = false;

            err.innerHTML = "Họ không được rỗng";
        } else {
            err.innerHTML = "";

        }

        control = document.getElementById('txtLname');
        err = document.getElementById('eLNAME');
        console.log(control.value);
        if (control.value == "") {
            co = false;

            err.innerHTML = "Tên không được rỗng";
        } else {
            err.innerHTML = "";

        }

        control = document.getElementById('txtDiaChi');
        err = document.getElementById('eADD');
        if (control.value == "") {
            co = false;

            err.innerHTML = "Địa chỉ không được rỗng";
        } else {
            err.innerHTML = "";

        }



        return co;
    }
</script>

<script src="js/calender.js" type="text/javascript"></script>
<script type="text/javascript">
    dates('option');
    months('option');
    years('option', 1900, 2017);
</script>