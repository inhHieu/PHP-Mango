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

//get Loai
// $sql_Loai = 'SELECT Ma_Loai, Ten_Loai FROM loai_sp;';
// $result_Loai = mysqli_query($conn, $sql_Loai);

//get khachhang
$sql_KH = 'SELECT Ma_KH, Ten_KH FROM khach_hang;';
$result_HSX = mysqli_query($conn, $sql_KH);

$conn->close();
?>

<div class="quanly-container">
    <?php include('quanly/left-control.php') ?>
    <div class="noti" id="noti">some text</div>

    <div class="right-content">
        <div class="modal-detail">
            <div class="info-wrap">
                <p class="receipt">Hóa Đơn</p>
                <table class="tb-info">
                    <tbody>
                        <tr>
                            <td> Khach hang:</td>
                            <td>
                                <input type="text" name="TenKH" value="">
                            </td>
                            <td>SDT:</td>
                            <td>
                                <input type="number" name="SDT" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>Dia chi:</td>
                            <td colspan="3">
                                <input type="text" name="DiaCHi" value="">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <table class="tb-detail table">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td style="width:280px ;">Ten San pham</td>
                        <td>Gia</td>
                        <td>So luong</td>
                        <td>Tong</td>
                    </tr>
                </thead>
                <tbody class="body-detail">
                    <tr class="inp-row">
                        <td>1</td>
                        <td>
                            <input style="width:280px ;" type="text" id="TenSP" name="TenSP" value="">
                            <div id="suggesstion-box"></div>
                        </td>
                        <td>
                            <p id="gia">0</p>
                        </td>
                        <td><input id="sl" type="number" name="" value=""></td>
                        <td>
                            <p id="total" class="total">0<? ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: center ;">
                            <p class="add-more">add more</p>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td>Tong cong:</td>
                        <td>
                            <p id="sub-total" class="sub-total">0<? ?></p>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <div class="add-hd">Lưu</div>
        </div>
    </div>
</div>


<script>
    //get suggestion
    $(document).ready(function() {
        $("#TenSP").keyup(function() {
            $.ajax({
                type: "POST",
                url: "quanly/SPsearch.php",
                data: 'keyword=' + $(this).val(),
                // beforeSend: function() {
                //     $("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                // },
                success: function(data) {
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    // $("#search-box").css("background", "#FFF");
                }
            });
        });
    });
    //To select a country name
    function selectCountry(val) {
        $("#TenSP").val(val);
        $("#suggesstion-box").hide();
    }
    //get detail
    $("#TenSP").focusout(function() {
        setTimeout(() => {
            $.ajax({
                type: "POST",
                url: "quanly/SPdetail.php",
                data: 'TenSP=' + $(this).val(),
                success: function(data) {
                    $("#gia").html(data);
                }
            });
        }, 500);

    });
    // click out hide suggest
    $('body,html').not('#TenSP,#suggesstion-box').click(function() {
        $("#suggesstion-box").hide();
    })
    // cal total, subtotal
    function calculate() {
        // console.log($(this).val() * $('#gia').html())

        $('#total').html($("#sl").val() * $('#gia').html());
        //get sum subtotal
        var sum = 0;
        $('.total').each(function() {
            sum += parseFloat($(".total").text());
            $('#sub-total').html(sum);
        });
        console.log(sum)
    };
    setInterval(calculate, 500);

    // $('.add-more').click(function() {
    //     $('.body-detail').append($('.input-row'))
    //     console.log('a');
    // });
</script>
<script src="includes/quanly.js"></script>
<?php
include('includes/footer.html');
?>

<!-- chinh sua giao dien -->