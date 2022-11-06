<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include('includes/header.html');
?>

<?php

// Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'mango')
    or die('Could not connect to MySQL: ' . mysqli_connect_error());

//get Loai
$sql_Loai = 'SELECT Ma_Loai, Ten_Loai FROM loai_sp;';
$result_Loai = mysqli_query($conn, $sql_Loai);

//get HSX
$sql_HSX = 'SELECT Ma_HSX, Ten_HSX FROM hang_sx;';
$result_HSX = mysqli_query($conn, $sql_HSX);
$conn->close();
?>

<div class="quanly-container">
    <?php include('quanly/left-control.php') ?>
    <div class="noti" id="noti">some text</div>

    <div class="center">
        <form action="ADD_sanpham.php" method="post" id="myForm" enctype='multipart/form-data'>
            <p id="noti"><?= @$noti ?></p>
            <table class="table">
                <tr>
                    <th colspan="4">Thêm sản phẩm mới</th>
                </tr>
                <tr>
                    <td>Mã SP: </td>
                    <td><input type="text" id="Ma_SP" name="Ma_SP"></td>
                    <td>Tên SP: </td>
                    <td><input type="text" id="Ten_SP" name="Ten_SP"></td>
                </tr>
                <tr>
                    <td>Hãng Sản Xuất: </td>
                    <td>
                        <select name="Ma_HSX" id="Ma_HSX">
                            <?php while ($rows = mysqli_fetch_row($result_HSX))
                                echo "<option value='" . $rows[0] . "'>" . $rows[1] . "</option>";
                            ?>
                        </select>
                    </td>
                    <td>Phân Loại: </td>
                    <td>
                        <!-- <input type="text" id="loaiSua" name="loaiSua"> -->
                        <select name="Ma_Loai" id="Ma_Loai">
                            <?php while ($rows = mysqli_fetch_row($result_Loai))
                                echo "<option value='" . $rows[0] . "'>" . $rows[1] . "</option>";
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <!-- <td>Trong luong: </td>
                    <td><input type="text" id="trongLuong" name="trongLuong"></td> -->
                    <td>Don gia: </td>
                    <td> <input type="text" id="Don_Gia" name="Don_Gia"> </td>
                </tr>
                <tr>
                    <td>Mô tả: </td>
                    <td colspan="3"><textarea id="Mo_Ta" name="Mo_Ta" id="" cols="48" rows="5"></textarea></td>
                </tr>
                <!-- <tr>
                    <td>Loi ich: </td>
                    <td colspan="3"><textarea id="loiIch" name="loiIch" id="" cols="48" rows="5"></textarea></td>
                </tr> 
                <tr>
                    <td>Hinh anh: </td>
                    <td colspan="3"><input type="file" id="Hinh_Anh" name="Hinh_Anh" onchange="validateImage()"></td>
                </tr>-->
                <tr>
                    <td>Hinh anh: </td>
                    <td colspan="3"><input type="text" id="Hinh_Anh" name="Hinh_Anh"></td>
                </tr>
                <tr>
                    <td colspan="4"> <button class="submit"name="submit" value="Them"></td>
                </tr>
            </table>
        </form>

    </div>

</div>


<script>
    $(".submit").click(function() {
        var Ma_SP = $('#Ma_SP');
        var Ten_SP = $('#Ten_SP');
        var Ma_HSX = $('#Ma_HSX');
        var Ma_Loai = $('#Ma_Loai');
        var Don_Gia = $('#Don_Gia');
        var Mo_Ta = $('#Mo_Ta');
        var Hinh_Anh = $('#Hinh_Anh');

        $.ajax({
            url: "quanly/Add.php",
            method: "POST",
            dataType: "json",
            data: {
                Ma_SP: Ma_SP,
                Ten_SP: Ten_SP,
                Ma_HSX: Ma_HSX,
                Ma_Loai: Ma_Loai,
                Don_Gia: Don_Gia,
                Mo_Ta: Mo_Ta,
                Hinh_Anh: Hinh_Anh,
            },
            error: function(response) {
                console.log(response);
                console.log("fail");
                $("#noti").text("Add fail");
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
                $("#noti").text("Add success");
                $("#noti").css("background-color", "#39FF14");
                $("#noti").animate({
                    top: "90vh"
                }).delay(3000).animate({
                    top: "105vh"
                });
            },
        });
    });





    // function validateImage() {
    //     let inputF = document.getElementById('Hinh_Anh');
    //     let inputFPath = inputF.value;
    //     let imgFormat = /(\.jpg|\.jpeg|\.png)$/i;
    //     if (!imgFormat.exec(inputFPath)) {
    //         alert('Invalid file type');
    //         inputF.value = '';
    //         return false;
    //     }
    // }
    // $('#myForm').submit(function() {
    //     if ($('#maSua').val().trim().length == 0) {
    //         $('#noti').html('empty id')
    //         return false
    //     } else if ($('#tenSua').val().trim().length == 0) {
    //         $('#noti').html('empty name')
    //         return false
    //     } else if ($('#hangSua').val().trim().length == 0) {
    //         $('#noti').html('empty hang sua')
    //         return false
    //     } else if ($('#loaiSua').val().trim().length == 0) {
    //         $('#noti').html('empty type')
    //         return false
    //     } else if ($('#trongLuong').val().trim().length == 0) {
    //         $('#noti').html('empty weight')
    //         return false
    //     } else if ($('#donGia').val().trim().length == 0) {
    //         $('#noti').html('empty price')
    //         return false
    //     } else if ($('#TPDD').val().trim().length == 0) {
    //         $('#noti').html('empty nutrient')
    //         return false
    //     } else if ($('#loiIch').val().trim().length == 0) {
    //         $('#noti').html('empty good')
    //         return false
    //     } else
    //     if ($('#Hinh_Anh').val() == '') {
    //         $('#noti').html('empty hinh')
    //         return false
    //     } else return true
    // })
</script>
<script src="includes/quanly.js"></script>
<?php
include('includes/footer.html');
?>

<!-- chinh sua giao dien -->