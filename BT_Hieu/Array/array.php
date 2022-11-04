<!-- <!DOCTYPE html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Xử lý n</title>

</head>

<body>

<?php

	if(isset($_POST['n'])) $n=$_POST['n'];

	else $n=0;



	$ketqua="";

	if(isset($_POST['hthi'])) 

	{	//tạo mảng có n phần tử, các phần tử có giá trị [-100,200]

		$arr=array();

		for($i=0;$i<$n;$i++)

		{

			$x=rand(-100,200);

			$arr[$i]=$x;

		}

		//In ra mảng vừa tạo

		$ketqua="Mảng được tạo là:" .implode(" ",$arr)."&#13;&#10;";



		//Tìm và in ra các số dương chẵn trong mảng dùng hàm foreach

		$count=0;

		foreach($arr as $v){

			if($v%2==0 && $v>0 )

				$count++;

		}

		$ketqua.="Có $count số chẵn >0 trong mảng". "&#13;&#10;";



		//Tìm và in ra các số <n có chữ số cuối là số lẻ

		$ketqua .="Các số có chữ số cuối là số lẻ là: ";

		$daySo = "";

		for($i=0;$i<count($arr);$i++){

			$soCuoi = $arr[$i]%10;

			if($soCuoi %2 !=0)

				$daySo .= "$arr[$i]  ";

		}

		$ketqua .= $daySo;

				

	}

?>

<form action="" method="post">

	Nhập n: <input type="text" name="n" value="<?php echo $n?>"/>

	<input type="submit" name="hthi" value="Hiển thị"/><br>

	Kết quả: <br>

	<textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua?></textarea>

</form>

</body>

</html> -->

<!--------------------------------- -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Tinh chu vi va dien tich</title>

<style>

fieldset {

  background-color: #eeeeee;

}



legend {

  background-color: gray;

  color: white;

  padding: 5px 10px;

}



input {

  margin: 5px;

}

</style>

</head>

<body>

<?php 

abstract class Hinh{

	protected $ten, $dodai;

	public function setTen($ten){

		$this->ten=$ten;

	}

	public function getTen(){

		return $this->ten;

	}

	public function setDodai($doDai){

		$this->dodai=$doDai;

	}

	public function getDodai(){

		return $this->dodai;

	}

	abstract public function tinh_CV();

	abstract public function tinh_DT();

}

class HinhTron extends Hinh{

	const PI=3.14;

	function tinh_CV(){

		return $this->dodai*2*self::PI;

	}

	function tinh_DT(){

		return pow($this->dodai,2)*self::PI;

	}

}

class HinhVuong extends Hinh{

	public function tinh_CV(){

		return $this->dodai*4;

	}

	public function tinh_DT(){

		return pow($this->dodai,2);

	}

}

$str=NULL;

if(isset($_POST['tinh'])){

	if(isset($_POST['hinh']) && ($_POST['hinh'])=="hv"){

		$hv=new HinhVuong();

		$hv->setTen($_POST['ten']);

		$hv->setDodai($_POST['dodai']);

		$str= "Diện tích hình vuông ".$hv->getTen()." là : ".$hv->tinh_DT()." \n".

		 		"Chu vi của hình vuông ".$hv->getTen()." là : ".$hv->tinh_CV();

	}

	if(isset($_POST['hinh']) && ($_POST['hinh'])=="ht"){

		$ht=new HinhTron();

		$ht->setTen($_POST['ten']);

		$ht->setDodai($_POST['dodai']);

		$str= "Diện tích của hình tròn ".$ht->getTen()." là : ".$ht->tinh_DT()." \n".

				"Chu vi của hình tròn ".$ht->getTen()." là : ".$ht->tinh_CV();

	}

}

?>

<form action="" method="post">

<fieldset>

	<legend>Tính chu vi và diện tích các hình học đơn giản</legend>

	<table border='0'>

		<tr><td>Chọn hình</td><td><input type="radio" name="hinh" value="hv" <?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="hv") echo 'checked="checked"'?>/>Hình vuông

								<input type="radio" name="hinh" value="ht"<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="ht") echo 'checked="checked"'?>/>Hình tròn</td></tr>

		<tr><td>Nhập tên:</td><td><input type="text"  name="ten" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>"/></td></tr>

		<tr><td>Nhập độ dài:</td><td><input type="text"  name="dodai" value="<?php if(isset($_POST['dodai'])) echo $_POST['dodai'];?>"/></td></tr>

		<tr><td>Kết quả:</td>

			<td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td></tr>

		<tr><td colspan="2" align="center"><input type="submit" name="tinh" value="TÍNH"/></td></tr>

	</table>

</fieldset>

</form>



</body>

</html>