<?php

$conn = mysqli_connect('localhost', 'root', '', 'mango')
    or die('Could not connect to MySQL: ' . mysqli_connect_error());

$sql = 'SELECT hoa_don.Ma_HD, hoa_don.Ngay_Tao, khach_hang.Ten_KH,
                hoa_don.Tri_gia, ct_hd.Ma_SP, san_pham.Don_Gia, 
                ct_hd.So_luong, san_pham.Don_Gia * ct_hd.So_luong AS Thanh_Tien 
        FROM hoa_don 
        INNER JOIN khach_hang ON hoa_don.Ma_KH=khach_hang.Ma_KH 
        INNER JOIN ct_hd ON ct_hd.Ma_HD = hoa_don.Ma_HD 
        INNER JOIN san_pham ON ct_hd.Ma_SP = san_pham.Ma_SP        
        WHERE hoa_don.Ma_HD = 1;
';

$HD_result = mysqli_query($conn, $sql);

if ($conn->query($sql)) {
    $status = "success";
    $response = "Data deleted successfully";
} else {
    $status = "failed";
    $response = "Something is wrong: <br>" . $conn->error;
}
exit(json_encode(array("status" => $status, "response" => $response)));
$conn->close();

/*
 <div class="modal-detail">
        <div class="info-wrap">
            <p>Hóa Đơn</p>
            <table class="tb-info">
                <tbody>
                    <tr>
                        <td>Khach hang:</td>
                        <td>
                            <p><? ?></p>
                        </td>
                        <td>SDT:</td>
                        <td>
                            <p><? ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>Dia chi:</td>
                        <td colspan="3">
                            <p><? ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <table class="tb-detail">
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

                <tr>
                    <td colspan="3"></td>
                    <td>Tong cong:</td>
                    <td><? ?>123</td>
                </tr>
            </tbody>
        </table>
    </div> */