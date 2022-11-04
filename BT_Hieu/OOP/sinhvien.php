<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<?php
abstract class person
{
    protected $name, $address, $sex;

    function setName($name)
    {
        $this->name = $name;
    }
    function getName()
    {
        return $this->name;
    }

    function setAddress($address)
    {
        $this->address = $address;
    }
    function getAddress()
    {
        return $this->address;
    }

    function setSex($sex)
    {
        $this->sex = $sex;
    }
    function getSex()
    {
        return $this->sex;
    }
    abstract function diemThuong();
    abstract function luong();
}

class student extends person
{
    protected $lop, $nganh;

    function setNganh($nganh)
    {
        $this->nganh = $nganh;
    }
    function getNganh()
    {
        return $this->nganh;
    }

    function setLop($lop)
    {
        $this->lop = $lop;
    }
    function getLop()
    {
        return $this->lop;
    }

    function diemThuong()
    {
        if ($this->nganh == 'CNTT') return 1;
        else if ($this->nganh == 'KT') return 1;
        else return 0;
    }
    function luong()
    {
    }
}

class teacher extends person
{
    protected $trinhdo;
    const baseLuong = 1500000;

    function setTrinhdo($trinhdo)
    {
        $this->trinhdo = $trinhdo;
    }
    function getTrinhdo()
    {
        return $this->trinhdo;
    }

    function diemThuong()
    {
    }
    function luong()
    {
        if ($this->trinhdo == 'Cu nhan') return self::baseLuong * 2.34;
        else if ($this->trinhdo == 'Thac si') return self::baseLuong * 3.67;
        else if ($this->trinhdo == 'Tien si') return self::baseLuong * 5.66;
        else return 0;
    }
}

trim(@$_POST['name']) != '' ? $name = $_POST['name'] :'';
trim(@$_POST['address']) != '' ? $address = $_POST['address'] : '';




if (isset($_POST['submit'])) {
    if (trim($_POST['name']) == '') {
        $noti = 'empty name';
    } else if (trim($_POST['address']) == '') {
        $noti = 'empty address';
    } else {
        $_POST['sex'] == 'Nu' ? $Nu = 'checked' : '';
        if ($_POST['person'] == 'SV') {
            if (trim($_POST['nganh']) != '') {
                trim($_POST['nganh']) != '' ? $nganh = $_POST['nganh'] : '';
                if (trim($_POST['lop']) != '') {
                    trim($_POST['lop']) != '' ? $lop = $_POST['lop'] : '';
                    $sv = new student();
                    $sv->setName($_POST['name']);
                    $sv->setAddress($_POST['address']);
                    $sv->setSex($_POST['sex']);
                    $sv->setLop($_POST['lop']);
                    $sv->setNganh($_POST['nganh']);
                    $output = $sv->getName() . "\n" . $sv->getAddress() . "\n" .
                        $sv->getSex() . "\n" . $sv->getNganh() . '-'  . $sv->getLop() . "\n" .
                        "Diem thuong:" . $sv->diemThuong();
                } else {
                    $noti = 'Vui long nhap Lop!';
                }
            } else {
                $noti = 'Vui long nhap Nganh!';
            }
        } else if ($_POST['person'] == 'GV') {
            $giangvien = 'checked';
            $_POST['trinhDo'] != 'Thac Si' ? $ths = 'checked' : '';
            $_POST['trinhDo'] != 'Tien Si' ? $ts = 'checked' : '';
            $gv = new teacher();
            $gv->setName($_POST['name']);
            $gv->setAddress($_POST['address']);
            $gv->setSex($_POST['sex']);
            $gv->setTrinhdo(@$_POST['trinhDo']);
            $output = $gv->getName() . "\n" . $gv->getAddress() . "\n" . $gv->getSex() . "\n"
                . $gv->getTrinhdo() . "\n" . $gv->luong();
        }
    }
}
?>






<body>
    <form action="" method="post">
        <table>
            <th align="center">Tinh luong - diem thuong</th>
            <tr>
                <td>Vi tri:</td>
                <td><input class="person" id="sv" type="radio" name="person" value="SV" checked> Sinh vien
                    <input class="person" id="gv" type="radio" name="person" value="GV" <?= @$giangvien ?>> Giang vien
                </td>
            </tr>
            <tr>
                <td>Name:</td>
                <td colspan="2"><input required type="text" name="name" id="" value="<?= @$name ?>"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td colspan="2"><input required type="text" name="address" id="" value="<?= @$address ?>"></td>
            </tr>
            <tr>
                <td>Gioi tinh:</td>
                <td><input type="radio" name="sex" value="Nam" checked> Nam
                    <input type="radio" name="sex" value="Nu" <?= @$Nu ?>> Nu
                </td>
            </tr>
            <tr>
                <td class="sv">Nganh hoc:</td>
                <td class="sv" colspan="2"><input type="text" name="nganh" value="<?= @$nganh ?>"></td>
            </tr>
            <tr>
                <td class="sv">Lop hoc:</td>
                <td class="sv" colspan="2"><input type="text" name="lop" value="<?= @$lop ?>"></td>
            </tr>
            <tr>
                <td class="gv">Trinh do</td>
                <td class="gv"><input type="radio" name="trinhDo" value="Cu nhan" checked>Cu Nhan
                    <input type="radio" name="trinhDo" value="Thac si" <?= @$ths ?>>Thac Si
                    <input type="radio" name="trinhDo" value="Tien si" <?= @$ts ?>>Tien Si
                </td>
            </tr>
            <tr>
                <td colspan="4" align="center"><input type="submit" id="submit" name="submit" value="Tinh"></td>
            </tr>
            <tr>
                <td colspan="4" align="center" style="color: red ;"><?= @$noti ?></td>
            </tr>
        </table>
    </form>
    <textarea name="output" id="" cols="30" rows="5"><?= @$output ?></textarea>
    <script>
        $(".gv").hide();
        $(".person").click(function() {
            if ($("#sv").prop("checked") == true) {
                $(".gv").hide();
                $(".sv").show();
                console.log('sv');
            }
            if ($("#gv").prop("checked") == true) {
                $(".sv").hide();
                $(".gv").show();
            }
            console.log('clicked');
        });
    </script>
</body>
<!-- <script>
    function myF() {
        var sv = document.getElementById("sv").checked;
        var gv = document.getElementById("gv").checked;
        var gvVisual = document.getElementsByClassName("gv");
        var svVisual = document.getElementsByClassName("sv");
        var x;
        if (sv == true) {
            for (i = 0; i < gvVisual.length; i++) {
                gvVisual[i].style.display = "none";
            }
            for (i = 0; i < svVisual.length; i++) {
                svVisual[i].style.display = "block";
            }
        }
        if (gv == true) {
            for (i = 0; i < svVisual.length; i++) {
                svVisual[i].style.display = "none";
            }
            for (i = 0; i < gvVisual.length; i++) {
                gvVisual[i].style.display = "block";
            }
        }
        document.getElementById("noti").innerHTML = x;

    }
</script> -->

</html>