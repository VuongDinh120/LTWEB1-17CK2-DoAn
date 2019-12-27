<a href="index.php?c=5&a=2" role="button" class="btn btn-success">
    Thêm loại sản phẩm mới
</a>
<div class="search-container">
    <form action="index.php" method="GET">
        <input type="text" placeholder="Loại sản phẩm" name="txtSearch">
        <input type="hidden" name="c" value="5">
        <input type="hidden" name="a" value="1">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
<table class="table table-striped table-hover" id="myTable">
    <thead>
        <tr class="bg-danger" style="color: white;">
            <th scope="col">ID</th>
            <th scope="col">Tên loại sản phẩm</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_GET["txtSearch"]))
        {
            $ten = $_GET["txtSearch"];
            $sql = "SELECT * FROM LoaiSanPham WHERE TenLoaiSanPham LIKE '%$ten%' ";
        }
        else{
            $sql = "SELECT * FROM LoaiSanPham";
        }
       
        $result = DataProvider::ExecuteQuery($sql);
        while ($row = mysqli_fetch_array($result)) {

        ?>
            <tr>
                <td><?php echo $row["MaLoaiSanPham"]; ?></td>
                <td><?php echo $row["TenLoaiSanPham"]; ?></td>
                <td>
                    <?php
                    if ($row["BiXoa"] == 1)
                        echo "Khóa";
                    else
                        echo "Hoạt động";
                    ?>
                </td>
                <td class="action">
                    <a href="index.php?c=5&a=3&id=<?php echo $row["MaLoaiSanPham"]; ?>"><i class="material-icons update">&#xE254;</i></a>
                    <a href="pages/qlLoaiSanPham/xlXoa.php?id=<?php echo $row["MaLoaiSanPham"]; ?>"><i class="material-icons remove">&#xE872;</i></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>