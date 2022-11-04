<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinh Phan So</title>
    <link rel="stylesheet" href="/BT_Hieu/css/main.css">
</head>

<?php
$result = '';
isset($_POST['ts1']) ? $ts1 = $_POST['ts1'] : '';
isset($_POST['ts2']) ? $ts2 = $_POST['ts2'] : '';
isset($_POST['ms1']) ? $ms1 = $_POST['ms1'] : '';
isset($_POST['ms2']) ? $ms2 = $_POST['ms2'] : '';
class phanSo
{
    protected $ts1, $ts2, $ms1, $ms2;

    function setTs1($ts1)
    {
        $this->ts1 = $ts1;
    }
    function getTs1()
    {
        return $this->ts1;
    }

    function setTs2($ts2)
    {
        $this->ts2 = $ts2;
    }
    function getTs2()
    {
        return $this->ts2;
    }

    function setMs1($ms1)
    {
        $this->ms1 = $ms1;
    }
    function getMs1()
    {
        return $this->ms1;
    }

    function setMs2($ms2)
    {
        $this->ms2 = $ms2;
    }
    function getMs2()
    {
        return $this->ms2;
    }

    function UCLN($ts, $ms)
    {
        if ($ts % $ms != 0) {
            return $this->UCLN($ms, $ts % $ms);
        } else
            return $ms;
    }

    function shorten($ts, $ms)
    {
        $ucln = $this->UCLN($ts, $ms);
        global $result;
        $ts = $ts / $ucln;
        $ms = $ms / $ucln;
        if ($ms == 1) {
            $result = $ts;
        } else if ($ms < 0 && $ts > 0) {
            $result = -$ts . '/' . -$ms;
        } else
            $result = $ts . '/' . $ms;
    }

    function cong()
    {
        global $result;
        // $result =. '/' .;
        $this->shorten(($this->ts1 * $this->ms2) + ($this->ts2 * $this->ms1), ($this->ms1 * $this->ms2));
    }
    function tru()
    {
        global $result;
        // $result =  . '/' . ;
        $this->shorten(($this->ts1 * $this->ms2) - ($this->ts2 * $this->ms1), ($this->ms1 * $this->ms2));
    }
    function nhan()
    {
        global $result;
        // $result =  . '/' . ;
        $this->shorten(($this->ts1 * $this->ts2), ($this->ms1 * $this->ms2));
    }
    function chia()
    {
        global $result;
        // $result = . '/' . ;
        $this->shorten(($this->ts1 * $this->ms2), ($this->ms1 * $this->ts2));
    }
}

if (isset($_POST['submit'])) {
    if ($_POST['ts1'] < 1) $noti = 'Tu so khong duoc bang 0';
    else if ($_POST['ts2'] < 1) $noti = 'Tu so khong duoc bang 0';
    else if ($_POST['ms1'] < 1) $noti = 'Mau so khong duoc bang 0';
    else if ($_POST['ms2'] < 1) $noti = 'Mau so khong duoc bang 0';
    else {
        $ps = new phanSo();
        $ps->setTs1($_POST['ts1']);
        $ps->setTs2($_POST['ts2']);
        $ps->setMs1($_POST['ms1']);
        $ps->setMs2($_POST['ms2']);
        switch ($_POST['math']) {
            case 'cong':
                $ps->cong();
                $cong = 'checked';
                break;
            case 'tru':
                $ps->tru();
                $tru = 'checked';
                break;
            case 'nhan':
                $ps->nhan();
                $nhan = 'checked';
                break;
            case 'chia':
                $ps->chia();
                $chia = 'checked';
                break;
        }
    }
}
?>

<body>
    <form action="phanso.php" method="POST">
        <table>
            <thead>
                <th colspan="3">
                    Phep tinh tren phan so
                </th>
            </thead>
            <tr>
                <td colspan="3" style="color: red;">
                    <?= @$noti ?>
                </td>
            </tr>
            <tr>
                <td>Phan so 1:</td>
                <td><input required type="number" name="ts1" value="<?= @$ts1 ?>"></td>
                <td>/<input required type="number" name="ms1" value="<?= @$ms1 ?>"></td>
            </tr>
            <tr>
                <td>Phan so 2:</td>
                <td><input required type="number" name="ts2" value="<?= @$ts2 ?>"></td>
                <td>/<input required type="number" name="ms2" value="<?= @$ms2 ?>"></td>
            </tr>
            <tr>
                <td>Phep tinh:</td>
                <td colspan="2">
                    <input type="radio" name="math" value="cong" checked> Cong
                    <input type="radio" name="math" value="tru" <?= @$tru ?>>Tru
                    <input type="radio" name="math" value="nhan" <?= @$nhan ?>> Nhan
                    <input type="radio" name="math" value="chia" <?= @$chia ?>> Chia
                </td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" id="submit" name="submit" value="Tinh"></td>
            </tr>
            <tr>
                <td>Ket qua:</td>
                <td colspan="2"><textarea name="result" id="" cols="40" rows="1"><?= @$result ?></textarea></td>
            </tr>
        </table>
    </form>
</body>

</html>