<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include('includes/header.html');
?>
<?php

if ($currentUser == 'null') {
    echo '<script>',
    "$('.modal-login').css('display','grid')",
    '</script>';
}

// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'mango')
    or die('Could not connect to MySQL: ' . mysqli_connect_error());

// set limit rows per page
$results_per_page = 8;

// get rows count
if (trim(isset($_GET['search'])) != '') {
    $search_raw = $_GET['search'];
    $search = str_replace(' ', '%', $search_raw);
    $GT = $_GET['gioiTinh'];
    $MaCV = $_GET['MaCV'];
    $GT == '' ? $GT_sql = '' : $GT_sql = 'AND Gioi_Tinh = "' . $GT . '"';
    $MaCV == '' ? $MaCV_sql = '' : $MaCV_sql = 'AND Ma_CV = "' . $MaCV . '"';
    $sql = 'SELECT* FROM khach_hang
                    WHERE Ten_KH LIKE "%' . $search . '%"
                    ' . $GT_sql . $MaCV_sql . ';';
} else    $sql = 'SELECT * FROM khach_hang;';
$result = mysqli_query($conn, $sql);
$number_of_result = mysqli_num_rows($result);

// calculate total pages
$number_of_page = ceil($number_of_result / $results_per_page);

// get current page index
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

//set first page show on load
$page_first_result = ($page - 1) * $results_per_page;

//result page-ing
if (trim(isset($_GET['search'])) != '') {
    $search_raw = $_GET['search'];
    $search = str_replace(' ', '%', $search_raw);
    $GT = $_GET['gioiTinh'];
    $MaCV = $_GET['MaCV'];
    $GT == '' ? $GT_sql = '' : $GT_sql = 'AND Gioi_Tinh = "' . $GT . '"';
    $MaCV == '' ? $MaCV_sql = '' : $MaCV_sql = 'AND Ma_CV = "' . $MaCV . '"';
    $sql = 'SELECT* FROM khach_hang
                    WHERE Ten_KH LIKE "%' . $search . '%"
                    ' . $GT_sql . $MaCV_sql . '
                    LIMIT ' . $page_first_result . ',' . $results_per_page;
    $noti = 'Co ' . $number_of_result . ' ket qua trung khop';
    if ($number_of_result == 0)         $noti = 'Khong co ket qua trung khop';
} else    $sql = 'SELECT * FROM khach_hang  LIMIT ' . $page_first_result . ',' . $results_per_page;
$result = mysqli_query($conn, $sql);
$conn->close();
//CSDL^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

?>

<div class="quanly-container">
    <?php include('quanly/left-control.php') ?>
    <div class="noti" id="noti">some text</div>

    <div class="right-content">
        <form action="QL_khachhang.php" method="GET" id="myForm">
            <table id="table-KH" class='table'>
                <div class="filter-wrapper">
                    <div class="filter">
                        Chức vụ: <select name="MaCV">
                            <option value="">Tất cả</option>
                            <option value="NV">Nhân viên</option>
                            <option value="KH">Khách hàng</option>
                            <option value="QL">ADMIN</option>
                        </select>
                    </div>
                    <div class="filter">
                        Giới tính: <select name="gioiTinh">
                            <option value="">Tất cả</option>
                            <option value="0">Nữ </option>
                            <option value="1">Nam</option>
                        </select>
                    </div>
                    <div class="filter search-wrapper">
                        <input type="search" class="search" placeholder="Tên Khách Hàng" name="search" value="<?= @$search_raw ?>">
                        <button type="submit" value="Tim">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                    <a href="ADD_khachhang.php" class="add filter">Thêm mới</a>
                    <p><?= @$noti ?></p>
                </div>

                <thead>
                    <th></th>
                    <th>Tên khách hàng</th>
                    <th>Giới tính</th>
                    <th>SDT</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Tài khoản</th>
                    <th>Mật Khẩu</th>
                    <th>Chức vụ</th>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) <> 0) {
                        $stt = 1;
                        while ($rows = mysqli_fetch_row($result)) { ?>
                            <tr>
                                <td class="id" id="Ma_KH">
                                    <input type='text' name='Ma_KH' value='<?= $rows[0] ?>'>
                                </td>
                                <td>
                                </td>
                                <td class='input' id="tenKH" style="width:180px ;">
                                    <input type='text' class='inpt' name='tenKH' value='<?= $rows[1] ?>' disabled>
                                </td>
                                <td class='input' id="gioiTinh" style="width:80px ;">
                                    <input type='text' class='inpt' name='gioiTinh' value='<?php if ($rows[2] == 0) echo 'Nữ';
                                                                                            else echo 'Nam'; ?>' disabled>
                                </td>
                                <td class='input' id="SDT" style="width:100px ;">
                                    <input type='text' class='inpt' name='SDT' value='<?= $rows[4] ?>' disabled>
                                </td>
                                <td class='input' id="diaChi" style="width:250px ;">
                                    <input type='text' class='inpt' name='diaChi' value='<?= $rows[3] ?>' disabled>
                                </td>
                                <td class='input' id="email">
                                    <input type='text' class='inpt' name='email' value='<?= $rows[5] ?>' disabled>
                                </td>
                                <td class='input' id="tk">
                                    <input type='text' class='inpt' name='tk' value='<?= $rows[6] ?>' disabled>
                                </td>
                                <td class='input' id="mk">
                                    <input type='text' class='inpt' name='mk' value='<?= $rows[7] ?>' disabled>
                                </td>
                                <td class='input' id="Ma_CV" style="width:80px ;">
                                    <input type='text' class='inpt' name='Ma_CV' value='<?= $rows[8] ?>' disabled>
                                </td>
                                <td class="confirm">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </td>
                                <td class='update'>
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </td>
                                <td class="delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </td>
                                <td><a href='Edit_khachhang.php?ID=<?= $rows[0] ?>'>Edit</a></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
                <?php
                if ($number_of_result != 0) {
                    if (isset($search)) {
                        echo '<tr> <td colspan="13" align="center"  >';
                        //page link
                        echo '<div class="redirect" style="margin: 0 auto">';
                        //redirect to first
                        echo '<a onclick="submit()" href = "  QL_khachhang.php?page=' . 1 . '&search=' . $search . '&gioiTinh=' . $GT . '&MaCV=' . $MaCV . '"> << </a>&nbsp';
                        //redirect to previous
                        if ($page > 1) {
                            echo '<a onclick="submit()" href = "  QL_khachhang.php?page=' . $page - 1 . '&search=' . $search . '&gioiTinh=' . $GT . '&MaCV=' . $MaCV . '"> < </a>&nbsp';
                        } else echo '<span> <&nbsp </span>';
                        //page link group
                        for ($index = 1; $index <= $number_of_page; $index++) {
                            if ($index == $page)
                                echo '<span>' . $index . '&nbsp</span>';
                            else
                                echo '<a onclick="submit()" href = "  QL_khachhang.php?page=' . $index . '&search=' . $search . '&gioiTinh=' . $GT . '&MaCV=' . $MaCV . '">' . $index . '&nbsp</a>';
                        }
                        //redirect to next
                        if ($page < $number_of_page) {
                            echo '&nbsp<a onclick="submit()" href = " QL_khachhang.php?page=' . $page + 1 . '&search=' . $search . '&gioiTinh=' . $GT . '&MaCV=' . $MaCV . '"> > </a>';
                        } else echo '<span> &nbsp> </span>';
                        //redirect to last
                        echo '&nbsp<a onclick="submit()" href = " QL_khachhang.php?page=' . $number_of_page . '&search=' . $search . '&gioiTinh=' . $GT . '&MaCV=' . $MaCV . '"> >> </a>';
                        echo '</div>';
                        echo '</td></tr>';
                    } else {
                        echo '<tr> <td colspan="13" align="center" >';
                        //page link
                        echo '<div class="redirect" style="margin: 0 auto">';
                        //redirect to first
                        echo '<a onclick="submit()" href = "  QL_khachhang.php?page=' . 1 . '"> << </a>&nbsp';
                        //redirect to previous
                        if ($page > 1) {
                            echo '<a onclick="submit()" href = "  QL_khachhang.php?page=' . $page - 1 . '"> < </a>&nbsp';
                        } else echo '<span> <&nbsp </span>';
                        //page link group
                        for ($index = 1; $index <= $number_of_page; $index++) {
                            if ($index == $page)
                                echo '<span>' . $index . '&nbsp</span>';
                            else
                                echo '<a onclick="submit()" href = "  QL_khachhang.php?page=' . $index . '">' . $index . '&nbsp</a>';
                        }
                        //redirect to next
                        if ($page < $number_of_page) {
                            echo '&nbsp<a onclick="submit()" href = " QL_khachhang.php?page=' . $page + 1 . '"> > </a>';
                        } else echo '<span> &nbsp> </span>';
                        //redirect to last
                        echo '&nbsp<a onclick="submit()" href = " QL_khachhang.php?page=' . 1 . '"> >> </a>';
                        echo '</div>';
                        echo '</td></tr>';
                    }
                }


                echo "</table>";

                ?>
        </form>

    </div>

</div>



<script src="includes/quanly.js"></script>
<script>
    $(".delete").click(function() {
        var Ma_KH = $(this).siblings(".id#Ma_KH").children().val();
        var tenKH = $(this).siblings(".input#tenKH").children().val();
        console.log(Ma_KH);
        $.confirm({
            title: "Delete " + tenKH,
            content: "This action cannot be undo!!!",
            type: "red",
            backgroundDismiss: true,
            escapeKey: true,
            typeAnimated: false,
            bgOpacity: .5,
            buttons: {
                confirm: {
                    text: "Delete",
                    btnClass: "btn-red",
                    action: function() {
                        $.ajax({
                            url: "quanly/DeleteKH.php",
                            method: "POST",
                            dataType: "json",
                            data: {
                                Ma_KH: Ma_KH,
                            },
                            error: function(response) {
                                console.log(response);
                                console.log("fail");
                                $("#noti").text("Delete failed");
                                $("#noti").css("background-color", "#ff0000");
                                $("#noti").css("color", "white");
                                $("#noti")
                                    .animate({
                                        top: "90vh"
                                    })
                                    .delay(3000)
                                    .animate({
                                        top: "105vh"
                                    });
                            },
                            success: function(response) {
                                console.log(response);
                                console.log("success");
                                $("#noti").text("Delete success");
                                $("#noti").css("background-color", "#39FF14");
                                $("#noti")
                                    .animate({
                                        top: "90vh"
                                    })
                                    .delay(3000)
                                    .animate({
                                        top: "105vh"
                                    });
                                setTimeout(reload, 3000);
                            },
                        });
                    },
                },
                cancel: function() {},
            },
        });
        //
    });

    function reload() {
        location.reload(true);
    }

    $(".confirm").click(function() {
        var myConfirm = $(this);
        var Ma_KH = $(this).siblings(".id#Ma_KH").children().val();
        var tenKH = $(this).siblings(".input#tenKH").children().val();
        var gioiTinh = $(this).siblings(".input#gioiTinh").children().val();
        var sdt = $(this).siblings(".input#SDT").children().val();
        var diaChi = $(this).siblings(".input#diaChi").children().val();
        var email = $(this).siblings(".input#email").children().val();
        var tk = $(this).siblings(".input#tk").children().val();
        var mk = $(this).siblings(".input#mk").children().val();
        var maCV = $(this).siblings(".input#Ma_CV").children().val();
        //   console.log(hangSX);

        $.ajax({
            url: "quanly/UpdateKH.php",
            method: "POST",
            dataType: "json",
            data: {
                Ma_KH: Ma_KH,
                tenKH: tenKH,
                gioiTinh: gioiTinh,
                sdt: sdt,
                diaChi: diaChi,
                email: email,
                tk: tk,
                mk: mk,
                maCV: maCV,
            },
            error: function(response) {
                console.log(response);
                console.log("fail");
                $("#noti").text("Edit fail");
                $("#noti").css("background-color", "#ff0000");
                $("#noti").css("color", "white");
                $("#noti").animate({
                    top: "90vh"
                }).delay(3000).animate({
                    top: "105vh"
                });
            },
            success: function(response) {
                console.log(response);
                console.log("success");
                $(myConfirm).siblings(".input").children().toggleClass("active-inpt");
                $(myConfirm)
                    .siblings(".input")
                    .children()
                    .prop("disabled", (i, v) => !v);
                $(myConfirm).toggleClass("visible");
                $(".update").html('<i class="fa fa-pencil" aria-hidden="true"></i>');
                $("#noti").text("Edit success");
                $("#noti").css("background-color", "#39FF14");
                $("#noti").animate({
                    top: "90vh"
                }).delay(3000).animate({
                    top: "105vh"
                });
            },
        });
    });
</script>
<?php
include('includes/footer.html');
?>