<div class="register-contain" style="background-color: white;">
    <h1 style="text-align: center; color: #70c5c0; margin-bottom: 50px;">Đăng ký</h1>
    <form action="/pages/TaoTaiKhoan/xlTaoTaiKhoan.php" method="POST" onsubmit="return KiemTra()">

        <div class="row">
            <div class="col">
                <label>Tên đăng nhập</label>
                <input type="text" name="txtUS" id="txtUS" class="form-control" placeholder=" UserName">
                <div class="invalid-feedback" id="eUS"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Mật khẩu</label>
                <input type="password" name="txtPS" id="txtPS" class="form-control" placeholder="PassWord">
                <div class="invalid-feedback" id="ePS"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Xác nhận Mật khẩu</label>
                <input type="password" id="txtRePS" class="form-control" placeholder="Re-PassWord">
                <div class="invalid-feedback" id="eRPS"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Họ và tên đệm</label>
                <input type="text" name="txtFname" class="form-control alphaonly" placeholder="First name">
                <div class="invalid-feedback" id="eNAME"></div>
            </div>
            <div class="col">
                <label>Tên</label>
                <input type="text" name="txtLname" class="form-control alphaonly" placeholder="Last name">
                <div class="invalid-feedback" id="eNAME"></div>
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
                <input type="text" name="txtDiaChi" class="form-control" id="txtDiaChi" placeholder="Address">
                <div class="invalid-feedback" id="eADD"></div>
            </div>
        </div>
        <input class="btn btn-primary" type="submit" value="Đăng ký" style="float: right;">

    </form>
</div>
<script src="js/calender.js" type="text/javascript"></script>
<script type="text/javascript">
    dates('option');
    months('option');
    years('option', 1900, 2017);
</script>

<script type="text/javascript">
    $('.alphaonly').bind('keyup blur', function() {
        var node = $(this);
        node.val(node.val().replace(/[^a-z]/g, ''));
    });

    function KiemTra() {
        var co = true;

        var control = document.getElementById('txtUS');
        var err = document.getElementById('eUS');
        if (control.value == "") {
            co = false;
            control.classList.add("is-invalid");
            err.innerHTML = "Tên đăng nhập không được rỗng";
        } else {
            err.innerHTML = "";
            control.classList.remove("is-invalid");
        }

        control = document.getElementById('txtPS');
        err = document.getElementById('ePS');
        if (control.value == "") {
            co = false;
            control.classList.add("is-invalid");
            err.innerHTML = "Mật khẩu không được rỗng";
        } else {
            err.innerHTML = "";
            control.classList.remove("is-invalid");
        }

        var control1 = document.getElementById('txtRePS');
        err = document.getElementById('eRPS');
        if (control.value != control1.value) {
            co = false;
            control.classList.add("is-invalid");
            err.innerHTML = "Nhập lại Mật khẩu không trùng khớp";
        } else {
            err.innerHTML = "";
            control.classList.remove("is-invalid");
        }

        control = document.getElementById('txtRePS');
        err = document.getElementById('eRPS');
        if (control.value == "") {
            co = false;
            control.classList.add("is-invalid");
            err.innerHTML = "Nhập lại Mật khẩu không được rỗng";
        } else {
            err.innerHTML = "";
            control.classList.remove("is-invalid");
        }

        control = document.getElementById('txtFname');
        err = document.getElementById('eNAME');
        if (control.value == "") {
            co = false;
            control.classList.add("is-invalid");
            err.innerHTML = "Tên hiển thị không được rỗng";
        } else {
            err.innerHTML = "";
            control.classList.remove("is-invalid");
        }

        control = document.getElementById('txtLname');
        err = document.getElementById('eNAME');
        if (control.value == "") {
            co = false;
            control.classList.add("is-invalid");
            err.innerHTML = "Tên hiển thị không được rỗng";
        } else {
            err.innerHTML = "";
            control.classList.remove("is-invalid");
        }

        control = document.getElementById('txtDiaChi');
        err = document.getElementById('eADD');
        if (control.value == "") {
            co = false;
            control.classList.add("is-invalid");
            err.innerHTML = "Địa chỉ không được rỗng";
        } else {
            err.innerHTML = "";
            control.classList.remove("is-invalid");
        }



        return co;
    }
</script>
<?php
if (isset($_GET["err"])) {
?>
    <div>
        <div class="invalid-feedback">Tên đăng nhập đã tồn tại</div>
    </div>
<?php
}
?>