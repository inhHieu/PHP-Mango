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
$results_per_page = 4;

// get rows count
if (trim(isset($_GET['search'])) != '') {
    $search_raw = $_GET['search'];
    $search = str_replace(' ', '%', $search_raw);
    $sql = 'SELECT hoa_don.Ma_HD, hoa_don.Ngay_Tao,khach_hang.Ten_KH, hoa_don.Tri_gia 
            FROM hoa_don
            INNER JOIN khach_hang ON hoa_don.Ma_KH=khach_hang.Ma_KH
            WHERE Ten_KH LIKE "%' . $search . '%";';
} else
    $sql = '   SELECT hoa_don.Ma_HD, hoa_don.Ngay_Tao,khach_hang.Ten_KH, hoa_don.Tri_gia 
            FROM hoa_don 
            INNER JOIN khach_hang ON hoa_don.Ma_KH=khach_hang.Ma_KH;';
$result = mysqli_query(connectDB(), $sql);
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
    $sql = 'SELECT hoa_don.Ma_HD, hoa_don.Ngay_Tao,khach_hang.Ten_KH, hoa_don.Tri_gia 
            FROM hoa_don
            INNER JOIN khach_hang ON hoa_don.Ma_KH=khach_hang.Ma_KH
            WHERE Ten_KH LIKE "%' . $search . '%" 
            LIMIT ' . $page_first_result . ',' . $results_per_page;
    //get the lil noti
    $noti = 'Co ' . $number_of_result . ' ket qua trung khop';
    if ($number_of_result == 0)         $noti = 'Khong co ket qua trung khop';
} else
    $sql = '   SELECT hoa_don.Ma_HD, hoa_don.Ngay_Tao,khach_hang.Ten_KH, hoa_don.Tri_gia 
            FROM hoa_don 
            INNER JOIN khach_hang ON hoa_don.Ma_KH=khach_hang.Ma_KH
            LIMIT ' . $page_first_result . ',' . $results_per_page;
$result = mysqli_query(connectDB(), $sql);



connectDB()->close();
//CSDL^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

?>

<div class="quanly-container">
    <?php include('quanly/left-control.php') ?>

    <div class="noti" id="noti">some text</div>

   

    <div class="right-content">
        <form action="QL_hoadon.php" method="GET" id="myForm">
            <table id="table" class='table '>
                <div class="filter-wrapper">
                    <div class="filter search-wrapper">
                        <input type="search" class="search" placeholder="Tên Khách Hàng" name="search" value="<?= @$search_raw ?>">
                        <button type="submit" value="Tim">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                    <a href="ADD_hoadon.php" class="add filter">Thêm mới</a>
                    <p><?= @$noti ?></p>
                </div>
                <thead>
                    <th>Mã hóa đơn</th>
                    <th>Ngày tạo</th>
                    <th>Tên khách hàng</th>
                    <th>Trị giá</th>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) <> 0) {
                        $stt = 1;
                        while ($rows = mysqli_fetch_row($result)) {
                    ?>
                            <tr>
                                <td class="Ma_HD" id="Ma_HD">
                                    <p><?= $rows[0] ?></p>
                                </td>
                                <td class='input' id="Ngay_Tao" style="width:300px ;">
                                    <input type='date' class='inpt' name='tenSP' value="<?= $rows[1] ?>" disabled>
                                </td>
                                <td class='input' id="Ten_KH">
                                    <input type='text' class='inpt' name='loaiSP' value='<?= $rows[2] ?>' disabled>
                                </td>
                                <td class='input' id="Tri_Gia">
                                    <input type='text' class='inpt' name='hangSX' value='<?= $rows[3] ?>' disabled>

                                <td class="detail">
                                    <a href="<?php echo "CTHD.php?MaHD=".$rows[0];?> "><i class="fa fa-info" aria-hidden="true"></i></a>
                                </td>
                                <td class="delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
                <?php
                if ($number_of_result != 0) {
                    if (isset($search)) {
                        echo '<tr> <td colspan="9" align="center"  >';
                        //page link
                        echo '<div class="redirect" style="margin: 0 auto">';
                        //redirect to first
                        echo '<a onclick="submit()" href = "  QL_hoadon.php?page=' . 1 . '&search=' . $search . '"> << </a>&nbsp';
                        //redirect to previous
                        if ($page > 1) {
                            echo '<a onclick="submit()" href = "  QL_hoadon.php?page=' . $page - 1 . '&search=' . $search . '"> < </a>&nbsp';
                        } else echo '<span> <&nbsp </span>';
                        //page link group
                        for ($index = 1; $index <= $number_of_page; $index++) {
                            if ($index == $page)
                                echo '<span>' . $index . '&nbsp</span>';
                            else
                                echo '<a onclick="submit()" href = "  QL_hoadon.php?page=' . $index . '&search=' . $search .  '">' . $index . '&nbsp</a>';
                        }
                        //redirect to next
                        if ($page < $number_of_page) {
                            echo '&nbsp<a onclick="submit()" href = " QL_hoadon.php?page=' . $page + 1 . '&search=' . $search .  '"> > </a>';
                        } else echo '<span> &nbsp> </span>';
                        //redirect to last
                        echo '&nbsp<a onclick="submit()" href = " QL_hoadon.php?page=' . $number_of_page . '&search=' . $search . '"> >> </a>';
                        echo '</div>';
                        echo '</td></tr>';
                    } else {
                        echo '<tr> <td colspan="9" align="center" >';
                        //page link
                        echo '<div class="redirect" style="margin: 0 auto">';
                        //redirect to first
                        echo '<a onclick="submit()" href = "  QL_hoadon.php?page=' . 1 . '"> << </a>&nbsp';
                        //redirect to previous
                        if ($page > 1) {
                            echo '<a onclick="submit()" href = "  QL_hoadon.php?page=' . $page - 1 . '"> < </a>&nbsp';
                        } else echo '<span> <&nbsp </span>';
                        //page link group
                        for ($index = 1; $index <= $number_of_page; $index++) {
                            if ($index == $page)
                                echo '<span>' . $index . '&nbsp</span>';
                            else
                                echo '<a onclick="submit()" href = "  QL_hoadon.php?page=' . $index . '">' . $index . '&nbsp</a>';
                        }
                        //redirect to next
                        if ($page < $number_of_page) {
                            echo '&nbsp<a onclick="submit()" href = " QL_hoadon.php?page=' . $page + 1 . '"> > </a>';
                        } else echo '<span> &nbsp> </span>';
                        //redirect to last
                        echo '&nbsp<a onclick="submit()" href = " QL_hoadon.php?page=' . 1 . '"> >> </a>';
                        echo '</div>';
                        echo '</td></tr>';
                    }
                }
                ?>
            </table>
        </form>

    </div>

</div>



<script src="includes/quanly.js"></script>
<script>

    $(".delete").click(function() {
        var Ma_HD = $(this).siblings(".Ma_HD#Ma_HD").children().text();
        console.log(Ma_HD);
        $.confirm({
            title: "Delete receipt: " + Ma_HD,
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
                            url: "quanly/DeleteHD.php",
                            method: "POST",
                            dataType: "json",
                            data: {
                                Ma_HD: Ma_HD,
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
</script>
<?php
include('includes/footer.html');
?>