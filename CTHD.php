<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include('includes/header.html');

if ($currentUser == 'null') {
    echo '<script>',
    "$('.modal-login').css('display','grid')",
    '</script>';
}
$conn = mysqli_connect('localhost', 'root', '', 'mango')
    or die('Could not connect to MySQL: ' . mysqli_connect_error());

$MaHD = $_GET['MaHD'];

//get KH
$sql = 'SELECT hoa_don.Ma_HD, khach_hang.Ten_KH,khach_hang.SDT, khach_hang.Dia_Chi 
        FROM hoa_don 
        INNER JOIN khach_hang ON hoa_don.Ma_KH=khach_hang.Ma_KH 
        WHERE hoa_don.Ma_HD = ' . $MaHD . ';';
$KH_result = mysqli_query($conn, $sql);
$KH_info = mysqli_fetch_row($KH_result);
//get HD
$sql = 'SELECT hoa_don.Ma_HD, hoa_don.Ngay_Tao, khach_hang.Ten_KH,
                hoa_don.Tri_gia, ct_hd.Ma_SP, san_pham.Don_Gia, 
                ct_hd.So_luong, san_pham.Don_Gia * ct_hd.So_luong AS Thanh_Tien 
        FROM hoa_don 
        INNER JOIN khach_hang ON hoa_don.Ma_KH=khach_hang.Ma_KH 
        INNER JOIN ct_hd ON ct_hd.Ma_HD = hoa_don.Ma_HD 
        INNER JOIN san_pham ON ct_hd.Ma_SP = san_pham.Ma_SP        
        WHERE hoa_don.Ma_HD = ' . $MaHD . ';';
$HD_result = mysqli_query($conn, $sql);
//Get Sum
$sql = 'SELECT
        SUM(san_pham.Don_Gia * ct_hd.So_luong) 
        FROM hoa_don 
        INNER JOIN khach_hang ON hoa_don.Ma_KH=khach_hang.Ma_KH 
        INNER JOIN ct_hd ON ct_hd.Ma_HD = hoa_don.Ma_HD 
        INNER JOIN san_pham ON ct_hd.Ma_SP = san_pham.Ma_SP 
        WHERE hoa_don.Ma_HD = ' . $MaHD . ';';
$SUM_result = mysqli_query($conn, $sql);
$sum = mysqli_fetch_row($SUM_result);


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
                                <?= $KH_info[1] ?>
                            </td>
                            <td>SDT:</td>
                            <td>
                                <?= $KH_info[2] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Dia chi:</td>
                            <td colspan="3">
                                <?= $KH_info[3]  ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <table class="tb-detail table">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Ten San pham</td>
                        <td>Gia</td>
                        <td>So luong</td>
                        <td>Tong</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($HD_result) <> 0) {
                        $stt = 1;
                        while ($HD_rows = mysqli_fetch_row($HD_result)) {
                            // $stt % 2 == 0 ? $color = '#ccd5ae' : $color = '#d4a373';
                            // '<img src="Hinh_sua/'.$rows[4].'" alt="">'
                    ?>
                            <tr>
                                <td><?= $stt ?></td>
                                <td><?= $HD_rows[4] ?></td>
                                <td><?= $HD_rows[5] ?></td>
                                <td><?= $HD_rows[6] ?></td>
                                <td><?= $HD_rows[7] ?></td>
                            </tr>
                    <?php
                            $stt += 1;
                        }
                    }
                    ?>
                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td>Tong cong:</td>
                        <td><?= $sum[0] ?></td>
                    </tr>
                </tfoot>

                </tbody>
            </table>
        </div>
    </div>

</div>



<script src="includes/quanly.js"></script>
<?php
include('includes/footer.html');
?>