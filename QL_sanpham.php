<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include('includes/header.html');

?>

<?php
if($currentUser == 'null'){
    echo '<script>',
     "$('.modal-login').css('display','grid')",
     '</script>'
;
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
    $HSX = $_GET['hangSX'];
    $LSP = $_GET['LoaiSP'];
    $sql = 'SELECT Ten_SP, Hinh_Anh, Don_Gia, Ma_SP, Ma_HSX, Ma_Loai, Mo_Ta
                    FROM san_pham
                    WHERE Ten_SP LIKE "%' . $search . '%"
                    AND Ma_HSX = "' . $HSX . '"
                    AND Ma_Loai = "' . $LSP . '";';
} else    $sql = 'SELECT Ten_SP, Hinh_Anh, Don_Gia, Ma_SP, Ma_HSX, Ma_Loai, Mo_Ta
                FROM san_pham;';
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
    $HSX = $_GET['hangSX'];
    $LSP = $_GET['LoaiSP'];
    $sql = 'SELECT Ten_SP, Hinh_Anh, Don_Gia, Ma_SP, Ma_HSX, Ma_Loai, Mo_Ta
                    FROM san_pham
                    WHERE Ten_SP LIKE "%' . $search . '%"
                    AND Ma_HSX = "' . $HSX . '"
                    AND Ma_Loai = "' . $LSP . '" LIMIT ' . $page_first_result . ',' . $results_per_page;
    //get the lil noti
    $noti = 'Co ' . $number_of_result . ' ket qua trung khop';
    if ($number_of_result == 0)         $noti = 'Khong co ket qua trung khop';
} else    $sql = 'SELECT Ten_SP, Hinh_Anh, Don_Gia, Ma_SP, Ma_HSX, Ma_Loai, Mo_Ta
                FROM san_pham  LIMIT ' . $page_first_result . ',' . $results_per_page;
$result = mysqli_query(connectDB(), $sql);
connectDB()->close();
//CSDL^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

?>

<div class="quanly-container">
    <?php include('quanly/left-control.php') ?>

    <div class="noti" id="noti">some text</div>

    <div class="right-content">
        <form action="QL_sanpham.php" method="GET" id="myForm">
            <table id="table" class='table '>
                <div class="filter-wrapper">
                    <div class="filter">
                        Loại SP: <select name="LoaiSP">
                            <option value="AK">Áo Khoác</option>
                            <option value="AO">Áo</option>
                            <option value="GI">Giày</option>
                            <option value="MU">Nón</option>
                            <option value="QU">Quần</option>
                            <option value="PK">Phụ kiện</option>
                            <option value="TS">Trang Sức</option>
                        </select>
                    </div>
                    <div class="filter">
                        Hãng: <select name="hangSX">
                            <option value="DAZY">DAZY </option>
                            <option value="MOTF">MOTF</option>
                            <option value="ROMWE">ROMWE</option>
                            <option value="ZIAI">ZIAI</option>
                        </select>
                    </div>
                    <div class="filter search-wrapper">
                        <input type="search" class="search" placeholder="Tên SP" name="search" value="<?= @$search_raw ?>">
                        <button type="submit" value="Tim">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                    <a href="ADD_sanpham.php" class="add filter">Thêm mới</a>
                    <p><?= @$noti ?></p>
                </div>
                <thead>
                    <th></th>
                    <th>Tên SP</th>
                    <th>Loại SP</th>
                    <th>Hãng SX</th>
                    <!-- <th>Mo Ta</th> -->
                    <th>Đơn giá</th>
                </thead>
                <tbody>
                    <?php


                    if (mysqli_num_rows($result) <> 0) {
                        $stt = 1;
                        while ($rows = mysqli_fetch_row($result)) {
                            // $stt % 2 == 0 ? $color = '#ccd5ae' : $color = '#d4a373';
                            // '<img src="Hinh_sua/'.$rows[4].'" alt="">'
                    ?>
                            <tr>
                                <td class="id" id="Ma_SP">
                                    <input type='text' name='Ma_SP' value='<?= $rows[3] ?>'>
                                </td>
                                <td>
                                    <img src="<?= $rows[1] ?>" alt="">
                                </td>
                                <td class='input' id="tenSP">
                                    <input type='text' class='inpt' name='tenSP' value='<?= $rows[0] ?>' disabled>
                                </td>
                                <td class='input' id="loaiSP">
                                    <input type='text' class='inpt' name='loaiSP' value='<?= $rows[5] ?>' disabled>
                                </td>
                                <td class='input' id="hangSX">
                                    <input type='text' class='inpt' name='hangSX' value='<?= $rows[4] ?>' disabled>
                                </td>
                                <!-- <td>$rows[6]</td> -->
                                <td class='input' id="donGia">
                                    <input type='text' class='inpt' name='donGia' value='<?= $rows[2] ?>' disabled>
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
                                <td><a href='Edit_sanpham.php?ID=<?= $rows[3] ?>'>Edit</a></td>
                            </tr>
                            <!-- <tr>
                                <td>
                                    <img src="" alt="">
                                </td>
                                <td><input name='tenSua' value=''></td>
                                <td><input name='LoaiSP' value=''></td>
                                <td><input name='trongLuong' value=''></td>
                                <td><input name='donGia' value=''></td>
                                <td><input name='hangSua' value=''></td>
                            </tr> -->
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
                        echo '<a onclick="submit()" href = "  QL_sanpham.php?page=' . 1 . '&search=' . $search . '&LoaiSP=' . $LSP . '&hangSua=' . $HSX . '"> << </a>&nbsp';
                        //redirect to previous
                        if ($page > 1) {
                            echo '<a onclick="submit()" href = "  QL_sanpham.php?page=' . $page - 1 . '&search=' . $search . '&LoaiSP=' . $LSP . '&hangSua=' . $HSX . '"> < </a>&nbsp';
                        } else echo '<span> <&nbsp </span>';
                        //page link group
                        for ($index = 1; $index <= $number_of_page; $index++) {
                            if ($index == $page)
                                echo '<span>' . $index . '&nbsp</span>';
                            else
                                echo '<a onclick="submit()" href = "  QL_sanpham.php?page=' . $index . '&search=' . $search . '&LoaiSP=' . $LSP . '&hangSua=' . $HSX . '">' . $index . '&nbsp</a>';
                        }
                        //redirect to next
                        if ($page < $number_of_page) {
                            echo '&nbsp<a onclick="submit()" href = " QL_sanpham.php?page=' . $page + 1 . '&search=' . $search . '&LoaiSP=' . $LSP . '&hangSua=' . $HSX . '"> > </a>';
                        } else echo '<span> &nbsp> </span>';
                        //redirect to last
                        echo '&nbsp<a onclick="submit()" href = " QL_sanpham.php?page=' . $number_of_page . '&search=' . $search . '&LoaiSP=' . $LSP . '&hangSua=' . $HSX . '"> >> </a>';
                        echo '</div>';
                        echo '</td></tr>';
                    } else {
                        echo '<tr> <td colspan="9" align="center" >';
                        //page link
                        echo '<div class="redirect" style="margin: 0 auto">';
                        //redirect to first
                        echo '<a onclick="submit()" href = "  QL_sanpham.php?page=' . 1 . '"> << </a>&nbsp';
                        //redirect to previous
                        if ($page > 1) {
                            echo '<a onclick="submit()" href = "  QL_sanpham.php?page=' . $page - 1 . '"> < </a>&nbsp';
                        } else echo '<span> <&nbsp </span>';
                        //page link group
                        for ($index = 1; $index <= $number_of_page; $index++) {
                            if ($index == $page)
                                echo '<span>' . $index . '&nbsp</span>';
                            else
                                echo '<a onclick="submit()" href = "  QL_sanpham.php?page=' . $index . '">' . $index . '&nbsp</a>';
                        }
                        //redirect to next
                        if ($page < $number_of_page) {
                            echo '&nbsp<a onclick="submit()" href = " QL_sanpham.php?page=' . $page + 1 . '"> > </a>';
                        } else echo '<span> &nbsp> </span>';
                        //redirect to last
                        echo '&nbsp<a onclick="submit()" href = " QL_sanpham.php?page=' . 1 . '"> >> </a>';
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


$(".delete").click(function () {
  var Ma_SP = $(this).siblings(".id#Ma_SP").children().val();
  var tenSP = $(this).siblings(".input#tenSP").children().val();
  console.log(Ma_SP);
  $.confirm({
    title: "Delete " + tenSP,
    content: "This action cannot be undo!!!",
    type: "red",
    backgroundDismiss: true,
    escapeKey: true,
    typeAnimated: false,
    bgOpacity:.5,
    buttons: {
      confirm: {
        text: "Delete",
        btnClass: "btn-red",
        action: function () {
          $.ajax({
            url: "quanly/Delete.php",
            method: "POST",
            dataType: "json",
            data: {
              Ma_SP: Ma_SP,
            },
            error: function (response) {
              console.log(response);
              console.log("fail");
              $("#noti").text("Delete failed");
              $("#noti").css("background-color", "#ff0000");
              $("#noti").css("color", "white");
              $("#noti")
                .animate({ top: "90vh" })
                .delay(3000)
                .animate({ top: "105vh" });
            },
            success: function (response) {
              console.log(response);
              console.log("success");
              $("#noti").text("Delete success");
              $("#noti").css("background-color", "#39FF14");
              $("#noti")
                .animate({ top: "90vh" })
                .delay(3000)
                .animate({ top: "105vh" });
              setTimeout(reload, 3000);
            },
          });
        },
      },
      cancel: function () {},
    },
  });
  //
});

function reload() {
  location.reload(true);
}

$(".confirm").click(function () {
  var myConfirm = $(this);
  var Ma_SP = $(this).siblings(".id#Ma_SP").children().val();
  var tenSP = $(this).siblings(".input#tenSP").children().val();
  var loaiSP = $(this).siblings(".input#loaiSP").children().val();
  var hangSX = $(this).siblings(".input#hangSX").children().val();
  var donGia = $(this).siblings(".input#donGia").children().val();
  console.log(hangSX);

  $.ajax({
    url: "quanly/Update.php",
    method: "POST",
    dataType: "json",
    data: {
      Ma_SP: Ma_SP,
      tenSP: tenSP,
      loaiSP: loaiSP,
      hangSX: hangSX,
      donGia: donGia,
    },
    error: function (response) {
      console.log(response);
      console.log("fail");
      $("#noti").text("Edit fail");
      $("#noti").css("background-color", "#ff0000");
      $("#noti").css("color", "white");
      $("#noti").animate({ top: "90vh" }).delay(3000).animate({ top: "105vh" });
    },
    success: function (response) {
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
      $("#noti").animate({ top: "90vh" }).delay(3000).animate({ top: "105vh" });
    },
  });
});

</script>
<?php
include('includes/footer.html');
?>