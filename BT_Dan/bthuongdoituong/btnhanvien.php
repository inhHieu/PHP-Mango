<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
if(isset($_POST['HoTen']))
$HoTen=$_POST['HoTen'];
else
$HoTen="";
if(isset($_POST['GioiTinh']))
$GioiTinh=$_POST['GioiTinh'];
else
$GioiTinh="";
if(isset($_POST['Ngayvaolam']))
$Ngayvaolam=$_POST['Ngayvaolam'];
else
$Ngayvaolam="";
if(isset($_POST['Hesoluong']))
$Hesoluong=$_POST['Hesoluong'];
else
$Hesoluong="";
if(isset($_POST['Socon']))
$Socon=$_POST['Socon'];
else
$Socon="";
if(isset($_POST['loainhanvien']))
$Loainhanvien=$_POST['loainhanvien'];
else
$Loainhanvien="";
if(isset($_POST['Songayvang']))
    $songayvang=$_POST['Songayvang'];
else
    $songayvang="";
if(isset($_POST['Sosanpham']))
    $sosanpham=$_POST['Sosanpham'];
else
    $sosanpham="";
if(isset($_POST['Tienluong']))
    $tienluong=$_POST['Tienluong'];
else
    $tienluong="";
if(isset($_POST['Trocap']))
    $trocap=$_POST['Trocap'];
else
    $trocap="";
if(isset($_POST['Tienphat']))
    $tienphat=$_POST['Tienphat'];
else
    $tienphat="";
if(isset($_POST['Tienthuong']))
    $tienthuong=$_POST['Tienthuong'];
else
    $tienthuong="";
if(isset($_POST['TienLinhDuoc']))
    $TienLinhDuoc=$_POST['TienLinhDuoc'];
else
    $TienLinhDuoc="";
$LuongCoBan=1500000;
$dinhmucsanpham=10;
$dongiasanpham=20000;
$dinhmucvang=5;
    class NhanVien
    {
        protected $Hoten;
        protected $GioiTinh;
        protected $Ngayvaolam;
        protected $Hesoluong;
        protected $Socon;
        protected $LuongCoBan;
        public function __construct($Hoten, $GioiTinh, $Ngayvaolam, $Hesoluong, $Socon, $LuongCoBan)
        {
            $this->Hoten = $Hoten;
            $this->GioiTinh = $GioiTinh;
            $this->Ngayvaolam = $Ngayvaolam;
            $this->Hesoluong = $Hesoluong;
            $this->Socon = $Socon;
            $this->LuongCoBan = $LuongCoBan;
        }

        public function getHoten() { return $this->Hoten; }
        public function getGioiTinh() {return $this->GioiTinh; }
        public function getNgayvaolam() {return $this->Ngayvaolam; }
        public function getHesoluong() {return $this->Hesoluong; }
        public function getSocon() { return $this->Socon; }
        public function getLuongCoBan() { return $this->LuongCoBan; }
        public function TienThuongNhanVien($Ngayvaolam)
        {
            $namvaolam=explode("/",$Ngayvaolam);
            $namvaolam_to_int=intval($namvaolam[2]);
            $namhientai=date("Y");
            $namhientai_to_int=intval($namhientai);
            $Sonamlam=$namhientai_to_int-$namvaolam_to_int;
            $tienthuong=$Sonamlam*1000000;
            return $tienthuong;
        }
    }
    
    class NhanVienVanPhong extends NhanVien
    {
        protected $Songayvang;
        protected $dinhmucvang;
        protected $dongiaphat;
        public function __construct($Songayvang)
        {
            $this->Songayvang=$Songayvang;
        }

        public function TienPhat($Songayvang,$dinhmucvang)
        {
            if($Songayvang>$dinhmucvang)
            {
                $tienphat=$Songayvang*$dinhmucvang;
                return $tienphat;
            }
            else
            return $tienphat=0;
        } 

        function Trocap($GioiTinh,$Socon)
        {
            if($GioiTinh=="Nữ")
                $trocap=200000*$Socon*1.5;
            else
                $trocap=200000*$Socon;
                return $trocap;
        }

         function TienLuong($LuongCoBan,$Hesoluong,$tienphat)
        {
            $tienluong=$LuongCoBan*$Hesoluong-$tienphat;
            return $tienluong;
        }
    }
    class NhanVienSanXuat extends NhanVien
    {
        protected $Sosanpham;
        protected $dinhmucsanpham;
        protected $dongiasanpham;
        public function __construct($Sosanpham)
        {
            $this->Sosanpham=$Sosanpham;
        }
        function TienThuong($Sosanpham,$dinhmucsanpham,$dongiasanpham)
        {
            if($Sosanpham>$dinhmucsanpham)
            {
                $tienthuong=($Sosanpham-$dinhmucsanpham)*$dongiasanpham*0.03;
                return $tienthuong;
            }
        }
        function TroCap($Socon)
        {
            $trocap=$Socon*120000;
            return $trocap;
        }
        function TienLuong($Sosanpham,$dongiasanpham,$tienthuong)
        {
            $tienluong=($Sosanpham*$dongiasanpham)+$tienthuong;
            return $tienluong;
        }
    }
    if(isset($_POST['Tinh']))
    {
        $nv=new NhanVien($HoTen, $GioiTinh, $Ngayvaolam, $Hesoluong, $Socon, $LuongCoBan);
        
        if($Loainhanvien=="Vanphong")
        {
            $nvvp=new NhanVienVanPhong($songayvang);
            $tienphat=$nvvp->TienPhat($songayvang,$dinhmucvang);
            $trocap=$nvvp->Trocap($GioiTinh,$Socon);
            $tienluong=$nvvp->TienLuong($LuongCoBan,$Hesoluong,$tienphat);
            $tienthuong=$nv->TienThuongNhanVien($Ngayvaolam);
            $TienLinhDuoc=$trocap+$tienluong+$tienthuong-$tienphat;
        }
        if($Loainhanvien=="SanXuat")
        {
            $nvsx=new NhanVienSanXuat($sosanpham);
            $tienthuong=$nvsx->Tienthuong($sosanpham,$dinhmucsanpham,$dongiasanpham);
            $trocap=$nvsx->TroCap($Socon);
            $tienluong=$nvsx->TienLuong($sosanpham,$dongiasanpham,$tienthuong);
            $TienLinhDuoc=$trocap+$tienluong+$tienthuong;
        }
    }
?>

    <form action="bthuongdt2.php" method="POST">
        <table border="1">
            <tr>
                <td>
                    <label for="">Họ và Tên:</label>
                </td>
                <td>
                    <input type="text" name="HoTen">
                </td>
                <td>
                    <Label>Số con:</Label>
                </td>
                <td>
                    <input type="text" name="Socon">
                </td>
            </tr>
            <tr>
                <td>
                <Label>Ngày Sinh:</Label>
                </td>
                <td>
                    <input type="text" name="Ngaysinh" id="">
                </td>
                <td>
                    <Label>Ngày vào làm:</Label>
                </td>
                <td>
                    <input type="text" name="Ngayvaolam">
                </td>
            </tr>
            <tr>
                <td>
                    <Label>Giới tính:</Label>
                </td>
                <td>
                    <input type="radio" name="sex" id="" value="Nam">Nam</input>
                    <input type="radio" name="sex" id="" value="Nữ">Nữ</inpput>
                </td>
                <td>
                    <Label>Hệ số lương:</Label>
                </td>
                <td>
                    <input type="text" name="Hesoluong">
                </td>
            </tr>
            <tr>
                <td>
                    <Label>Loại nhân viên:</Label>
                </td>
                <td>
                    <input type="radio" name="loainhanvien" id="" value="Vanphong">Văn Phòng
                </td>
                <td>
                    <input type="radio" name="loainhanvien" id="" value="SanXuat">Sản Xuất
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <Label>Số ngày vắng:</Label>
                    <input type="text" name="Songayvang" id="">
                </td>
                <td>
                    <Label>Số sản phẩm:</Label>
                    <input type="text" name="Sosanpham" id="">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="Tinh" value="Tính lương">
                </td>
            </tr>
            <tr>
                <td>
                <label for="">Tiền Lương:</label>
                </td>
                <td>
                 <input type="text" name="Tienluong" value="<?php echo "$tienluong" ?>" disabled="disabled">
                </td>
                <td>
                    <Label>Trợ Cấp:</Label>
                </td>
                <td>
                    <input type="text" name="Trocap" id="" value="<?php echo "$trocap" ?>" disabled="disabled">
                </td>
            </tr>
            <tr>
                <td>
                    <Label>Tiền thưởng:</Label>
                </td>
                <td>
                    <input type="text" name="Tienthuong" id="" value="<?php echo $tienthuong ?>" disabled="disabled">
                </td>
                <td>
                    <Label>Tiền Phạt:</Label>
                </td>
                <td>
                    <input type="text" name="Tienphat" id="" value="<?php echo "$tienphat" ?>" disabled="disabled">
                </td>
            </tr>
            <tr>
                <td>
                    <Label>Tiền lãnh Được:</Label>
                    <input type="text" name="TienLinhDuoc" id="" value="<?php echo "$TienLinhDuoc" ?>" disabled="disabled">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>