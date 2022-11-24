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
    $sql = 'SELECT *
        FROM loai_sp
        WHERE Ten_Loai 
        LIKE "%' . $search . '%";';
} else    $sql = '  SELECT *
                    FROM loai_sp;';
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
    $sql = 'SELECT *
        FROM loai_sp
        WHERE Ten_Loai 
        LIKE "%' . $search . '%" 
        LIMIT ' . $page_first_result . ',' . $results_per_page;
    //get the lil noti
    $noti = 'Co ' . $number_of_result . ' ket qua trung khop';
    if ($number_of_result == 0)         $noti = 'Khong co ket qua trung khop';
} else    $sql = '   SELECT *
                    FROM loai_sp  
                    LIMIT ' . $page_first_result . ',' . $results_per_page;
$result = mysqli_query(connectDB(), $sql);
connectDB()->close();
//CSDL^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

?>

<div class="quanly-container">
    <?php include('quanly/left-control.php') ?>

    <div class="noti" id="noti">some text</div>

    <div class="right-content">
        <form action="QL_loaisanpham.php" method="GET" id="myForm">
            <table id="table" class='table '>
                <div class="filter-wrapper">
                    <div class="filter search-wrapper">
                        <input type="search" class="search" placeholder="Tên Loại sản phẩm" name="search" value="<?= @$search_raw ?>">
                        <button type="submit" value="Tim">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                    <p><?= @$noti ?></p>
                    <a class="add filter" id="add-btn">Thêm mới</a>
                </div>
                <thead>
                    <th style="width: 300px ;">Mã loại SP</th>
                    <th style="width: 300px ;">Tên Loại SP</th>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) <> 0) {
                        $stt = 1;
                        while ($rows = mysqli_fetch_row($result)) {
                    ?>
                            <tr>
                                <td class="input" id="Ma_Loai">
                                    <input type='text' class='inpt' name='Ma_Loai' value='<?= $rows[0] ?>' disabled>
                                </td>

                                <td class='input' id="Ten_Loai" style="width:300px ;">
                                    <input type='text' class='inpt' name='Ten_Loai' value="<?= $rows[1] ?>" disabled>
                                </td>

                                <td class="delete" style="width: 30px ;">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </td>

                                <td style="width: 1px ;"></td>
                                <td style="width: 1px ;"></td>
                                <td style="width: 1px ;"></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    <tr id="add">
                        <td class="input" id="Ma_Loai_Add">
                            <input type='text' class='inpt active-inpt' name='Ma_Loai' value=''>
                        </td>

                        <td class='input' id="Ten_Loai_Add" style="width:300px ;">
                            <input type='text' class='inpt active-inpt' name='Ten_Loai' value="">
                        </td>
                        <td class="confirm-add">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </td>
                        <td style="width: 1px ;"></td>
                        <td style="width: 1px ;"></td>
                        <td style="width: 1px ;"></td>
                    </tr>
                </tbody>
                <?php
                if ($number_of_result != 0) {
                    if (isset($search)) {
                        echo '<tr> <td colspan="9" align="center"  >';
                        //page link
                        echo '<div class="redirect" style="margin: 0 auto">';
                        //redirect to first
                        echo '<a onclick="submit()" href = "  QL_loaisanpham.php?page=' . 1 . '&search=' . $search . '"> << </a>&nbsp';
                        //redirect to previous
                        if ($page > 1) {
                            echo '<a onclick="submit()" href = "  QL_loaisanpham.php?page=' . $page - 1 . '&search=' . '"> < </a>&nbsp';
                        } else echo '<span> <&nbsp </span>';
                        //page link group
                        for ($index = 1; $index <= $number_of_page; $index++) {
                            if ($index == $page)
                                echo '<span>' . $index . '&nbsp</span>';
                            else
                                echo '<a onclick="submit()" href = "  QL_loaisanpham.php?page=' . $index . '&search=' . '">' . $index . '&nbsp</a>';
                        }
                        //redirect to next
                        if ($page < $number_of_page) {
                            echo '&nbsp<a onclick="submit()" href = " QL_loaisanpham.php?page=' . $page + 1 . '&search=' . '"> > </a>';
                        } else echo '<span> &nbsp> </span>';
                        //redirect to last
                        echo '&nbsp<a onclick="submit()" href = " QL_loaisanpham.php?page=' . $number_of_page . '&search=' . '"> >> </a>';
                        echo '</div>';
                        echo '</td></tr>';
                    } else {
                        echo '<tr> <td colspan="9" align="center" >';
                        //page link
                        echo '<div class="redirect" style="margin: 0 auto">';
                        //redirect to first
                        echo '<a onclick="submit()" href = "  QL_loaisanpham.php?page=' . 1 . '"> << </a>&nbsp';
                        //redirect to previous
                        if ($page > 1) {
                            echo '<a onclick="submit()" href = "  QL_loaisanpham.php?page=' . $page - 1 . '"> < </a>&nbsp';
                        } else echo '<span> <&nbsp </span>';
                        //page link group
                        for ($index = 1; $index <= $number_of_page; $index++) {
                            if ($index == $page)
                                echo '<span>' . $index . '&nbsp</span>';
                            else
                                echo '<a onclick="submit()" href = "  QL_loaisanpham.php?page=' . $index . '">' . $index . '&nbsp</a>';
                        }
                        //redirect to next
                        if ($page < $number_of_page) {
                            echo '&nbsp<a onclick="submit()" href = " QL_loaisanpham.php?page=' . $page + 1 . '"> > </a>';
                        } else echo '<span> &nbsp> </span>';
                        //redirect to last
                        echo '&nbsp<a onclick="submit()" href = " QL_loaisanpham.php?page=' . 1 . '"> >> </a>';
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
        var Ma_Loai = $(this).siblings(".input#Ma_Loai").children().val();
        var Ten_Loai = $(this).siblings(".input#Ten_Loai").children().val();
        console.log(Ma_Loai);
        $.confirm({
            title: "Delete " + Ten_Loai,
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
                            url: "quanly/DeleteLSP.php",
                            method: "POST",
                            dataType: "json",
                            data: {
                                Ma_Loai: Ma_Loai,
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
                                setTimeout(reload, 2000);
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
    $('#add-btn').click(function() {
        $('#add').css("visibility", "visible");
    })



    $(".confirm-add").click(function() {
        var myConfirm = $(this);
        var Ma_Loai = $(this).siblings(".input#Ma_Loai_Add").children().val();
        var Ten_Loai = $(this).siblings(".input#Ten_Loai_Add").children().val();

        $.ajax({
            url: "quanly/AddLSP.php",
            method: "POST",
            dataType: "json",
            data: {
                Ma_Loai: Ma_Loai,
                Ten_Loai: Ten_Loai,
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
                setTimeout(reload, 2000);
            },
        });
    });
</script>
<?php
include('includes/footer.html');
?>