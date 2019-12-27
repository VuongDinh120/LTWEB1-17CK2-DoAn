<div class="header">
    <h1>Hệ thống quản lý YouthShop</h1>
    <div class="nav">
        <a href="index.php?c=1" class="<?php if($c==1) echo "active" ?>">Quản lý tài khoản</a>
        <a href="index.php?c=2" class="<?php if($c==2) echo "active" ?>">Quản lý sản phẩm</a>
        <a href="index.php?c=3" class="<?php if($c==3) echo "active" ?>">Quản lý đơn hàng</a>
        <a href="index.php?c=4" class="<?php if($c==4) echo "active" ?>">Quản lý nhà sản xuất</a>
        <a href="index.php?c=5" class="<?php if($c==5) echo "active" ?>">Quản lý loại sản phẩm</a>
        <?php include "modules/mLogin.php"; ?>
    </div>
</div>