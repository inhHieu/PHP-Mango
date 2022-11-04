<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan ly nhan vien</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">
</head>
<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

abstract class employee
{
    protected $name, $sex, $DoW, $HSL, $childs;
    const baseLuong = 1000000;


    function setName($name)
    {
        $this->name = $name;
    }
    function getName()
    {
        return $this->name;
    }

    function setSex($sex)
    {
        $this->sex = $sex;
    }
    function getSex()
    {
        return $this->sex;
    }

    function setDow($DoW)
    {
        $this->DoW = $DoW;
    }
    function getDow()
    {
        return $this->DoW;
    }

    function setHSL($HSL)
    {
        $this->HSL = $HSL;
    }
    function getHSL()
    {
        return $this->HSL;
    }

    function setChilds($childs)
    {
        $this->childs = $childs;
    }
    function getChilds()
    {
        return $this->childs;
    }


    function tinhThuong()
    {
        return 1000000 * (int)((int)date("Y-m-d") - (int) $this->DoW);
    }
    abstract function tinhLuong();
    abstract function tinhSuport();
}

class vanPhong extends employee
{
    protected $daysOff;
    const baseOff = 2;
    const basePenaly = 100000;


    function setDaysoff($daysOff)
    {
        $this->daysOff = $daysOff;
    }
    function getDaysoff()
    {
        return $this->daysOff;
    }

    function tinhPhat()
    {
        if ($this->daysOff > self::baseOff)
            return ($this->daysOff - self::baseOff) * self::basePenaly;
        else return 0;
    }
    function tinhSuport()
    {
        if ($this->sex == 'Nu')
            return 200000 * (int)$this->childs * 1.5;
        else return 200000 * (int)$this->childs;
    }
    function tinhLuong()
    {
        return self::baseLuong * $this->HSL - $this->tinhPhat();
    }
}

class sanXuat extends employee
{
    protected $ssp;
    const dmsp = 10;
    const dgsp = 3000;

    function setSsp($ssp)
    {
        $this->ssp = $ssp;
    }
    function getSsp()
    {
        return $this->ssp;
    }


    function tinhBonus()
    {
        if ($this->ssp > self::dmsp)
            return ($this->ssp - self::dmsp) * self::dgsp * 0.03;
        else return 1;
    }
    function tinhSuport()
    {
        return $this->childs * 120000;
    }

    function tinhLuong()
    {
        return (self::dmsp * self::dgsp) + $this->tinhBonus();
    }
}


if (@trim($_POST['name']) == '') $noti = 'empty name';
else {
    $name = $_POST['name'];
    if ($_POST['level'] == 'VP') {
        if (trim($_POST['daysOff']) == '') {
            $noti = 'Nhap so ngay vang';
        } else {
            $vp = new vanPhong();
            $vp->setName($_POST['name']);
            $vp->setChilds($_POST['childs']);
            $vp->setDow($_POST['DoW']);
            $vp->setSex($_POST['sex']);
            $vp->setHSL($_POST['HSL']);
            $vp->setDaysoff($_POST['daysOff']);
            $tienLuong = $vp->tinhLuong();
            $tienThuong = $vp->tinhThuong();
            $tienPhat = $vp->tinhPhat();
            $tienSuport = $vp->tinhSuport();
            $total = $tienLuong + $tienThuong + $tienSuport;
        }
    }
    if ($_POST['level'] == 'SX') {
        if (trim($_POST['ssp'])== '') {
            $noti = 'Nhap so san pham';
        } else {
            $sx = new sanXuat();
            $sx->setName($_POST['name']);
            $sx->setChilds($_POST['childs']);
            $sx->setDow($_POST['DoW']);
            $sx->setSex($_POST['sex']);
            // $vp-> setHSL($_POST['HSL']);
            $sx->setSsp($_POST['ssp']);
            $tienLuong = $sx->tinhLuong();
            $tienThuong = $sx->tinhBonus() + $sx->tinhThuong();
            $tienSuport = $sx->tinhSuport();
            $total = $tienLuong + $tienThuong + $tienSuport - $sx->tinhBonus();
        }
    }
}




?>

<body>
    <!-- <?= @(int)$_POST['DoB'] - (int)date("Y-m-d") ?> -->
    <form action="" method="POST">
        <h2 align='center'>QUAN LY NHAN VIEN</h2>
        <table>
            <tr>
                <td>Ho va ten:</td>
                <td><input required type="text" name="name" value="<?= @$_POST['name'] ?>"></td>
                <td>So con:</td>
                <td><input required type="number" name="childs" value="<?= @$_POST['childs'] ?>"></td>
            </tr>
            <tr>
                <td>Ngay sinh:</td>
                <td><input required type="date" name="DoB" value="<?= @$_POST['DoB'] ?>"></td>
                <td>Ngay vao lam:</td>
                <td><input required type="date" name="DoW" value="<?= @$_POST['DoW'] ?>"></td>
            </tr>
            <tr>
                <td>Gioi tinh:</td>
                <td>
                    <input type="radio" name="sex" value="Nam" checked>Nam
                    <input type="radio" name="sex" value="Nu">Nu
                </td>
                <td>He so luong</td>
                <td><input required type="number" name="HSL" value="<?= @$_POST['HSL'] ?>"></td>
            </tr>
            <tr>
                <td>Loai nhan vien</td>
                <td><input type="radio" name="level" value="VP" checked>Van phong</td>
                <td><input type="radio" name="level" value="SX">San Xuat</td>
            </tr>
            <tr>
                <td></td>
                <td> So ngay vang: <input type="number" name="daysOff" value="<?= @$_POST['daysOff'] ?>"></td>
                <td>So san pham: <input type="number" name="ssp" value="<?= @$_POST['ssp'] ?>"></td>
            </tr>
            <tr>
                <td colspan="4" align="center"><input type="submit" name="submit" value="Tinh"></td>
            </tr>
            <tr>
                <td>Tien luong:</td>
                <td><input type="text" name="tienLuong" value="<?= @$tienLuong ?>" disabled></td>
                <td>Tien tro cap:</td>
                <td><input type="text" name="tienSuport" value="<?= @$tienSuport ?>" disabled></td>
            </tr>
            <tr>
                <td>Tien thuong:</td>
                <td><input type="text" name="tienThuong" value="<?= @$tienThuong ?>" disabled></td>
                <td>Tien phat:</td>
                <td><input type="text" name="tienPhat" value="<?= @$tienPhat ?>" disabled></td>
            </tr>
            <tr>
                <td colspan="4" align="center">Thuc Linh: <input type="text" name="total" value="<?= @$total ?>" disabled></td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                    <p style="color: red;"><?= @$noti ?></p>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>