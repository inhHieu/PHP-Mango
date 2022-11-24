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

//get CV
$sql_CV = 'SELECT Ma_CV, Ten_CV FROM chuc_vu;';
$result_CV = mysqli_query($conn, $sql_CV);

$conn->close();
?>

<div class="quanly-container">
    <?php include('quanly/left-control.php') ?>
    <div class="noti" id="noti">some text</div>

    <div class="center">
        <form action="ADD_khachhnag.php" method="post" id="myForm" enctype='multipart/form-data'>
            <!-- <p id="noti"><?= @$noti ?></p> -->
            <table class="table">
                <tr>
                    <th >Thêm Khách hàng mới</th>
                </tr>
                <tr>
                    <td>Mã KH: </td>
                    <td><input type="text" id="Ma_KH" name="Ma_KH"></td>
                    <td>Chức vụ: </td>
                    <td>
                        <select name="Ma_CV" id="Ma_CV">
                            <?php while ($rows = mysqli_fetch_row($result_CV))
                                echo "<option value='" . $rows[0] . "'>" . $rows[1] . "</option>";
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tên KH: </td>
                    <td><input type="text" id="Ten_KH" name="Ten_KH"></td>
                    <td>Giới tính: </td>
                    <td>
                        <!-- <input type="text" id="loaiSua" name="loaiSua"> -->
                        <select name="Gioi_Tinh" id="Gioi_Tinh">
                            <option value="0">Nữ</option>
                            <option value="1">Nam</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <!-- <td>Trong luong: </td>
                    <td><input type="text" id="trongLuong" name="trongLuong"></td> -->
                    <td>Địa Chỉ: </td>
                    <td> <input type="text" id="Dia_Chi" name="Dia_Chi"> </td>
                </tr>
                <tr>
                    <td>Số điện thoại: </td>
                    <td ><input type="tel" id="SDT" name="SDT"></td>
                    <td>Email: </td>
                    <td ><input type="text" id="Email" name="Email"></td>
                </tr>

                <tr>
                    <td>Tài khoản: </td>
                    <td ><input type="text" id="Tai_Khoan" name="Tai_Khoan"></td>
                    <td>Mật Khẩu: </td>
                    <td ><input type="text" id="Mat_Khau" name="Mat_Khau"></td>
               </tr>
                
                <tr>
                    <td >
                        <p class="submit" name="submit"> Thêm</p>
                    </td>
                </tr>   
            </table>
        </form>

    </div>

</div>


<script>
    $(".submit").click(function() {
        var Ma_KH = $('#Ma_KH').val();
        var Ten_KH = $('#Ten_KH').val();
        var Ma_CV = $('#Ma_CV').val();
        var Dia_Chi = $('#Dia_Chi').val();
        var Gioi_Tinh = $('#Gioi_Tinh').val();
        var sdt = $('#SDT').val();
        var Email = $('#Email').val();
        var Tai_Khoan = $('#Tai_Khoan').val();
        var Mat_Khau = $('#Mat_Khau').val();

        $.ajax({
            url: "quanly/AddKH.php",
            method: "POST",
            dataType: "json",
            data: {
                Ma_KH: Ma_KH,
                Ten_KH: Ten_KH,
                Ma_CV: Ma_CV,
                Dia_Chi: Dia_Chi,
                Gioi_Tinh : Gioi_Tinh,
                sdt:sdt,
                Email:Email,
                Tai_Khoan: Tai_Khoan,
                Mat_Khau: Mat_Khau,
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
    //     let inputF = document.getElementById('Tai_Khoan');
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
    //     if ($('#Tai_Khoan').val() == '') {
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