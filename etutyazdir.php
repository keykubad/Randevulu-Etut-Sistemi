<?php

session_start();
include("ayar.php");
include("fonksiyon.php");
$yetkikontrol		=mysql_fetch_assoc(mysql_query("select * from kullanici where kullaniciadi='".$_SESSION["kul"]."'"));
if (($_SESSION["login"]=="") && ($yetkikontrol["yetki"]!=1)){		
git("index.php",3);		
die ('<meta charset="utf-8" />Bu alanı görüntülemeye yetkiniz yok.!');			
}

?>

<html>

<head>
<script type="text/javascript">
window.onload = function() {
    this.print();
};
</script>
<meta http-equiv="Content-Language" content="tr">
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>Etüt Öğrenci Listesi</title>
</head>

<body>
<center><input style='background:blue;color:#FFF;width:150px;' type="button" value="Geri Dön" onClick="javascript:history.go(-1)" /></center>
<table border="0" width="100%">
	<?php
	$tarihim		=$_GET["tarih"];
	$ogretmenim		=$_GET["ogretmen"];
	$saatim			=$_GET["saat"];
			$kullanici	=mysql_query("select * from liste where ogretmen='$ogretmenim' and saat='$saatim' and tarih='$tarihim'");
			$sayogrenci	=mysql_num_rows($kullanici);
			$adalogretmen		=mysql_fetch_assoc(mysql_query("select * from kullanici where id='$ogretmenim'"));
	?>
	<tr>
		<td style="border-style: solid; border-width: 1px">
		<p align="right"><span style="float:left;"><b>Öğretmen Adı :</b> <?php echo $adalogretmen["adsoyad"];?> </span><b><font size="2">Öğrenci Listesi (Toplam öğrenci sayısı : <?php echo $sayogrenci;?> )</font></b></td>
	</tr>
	</table>
<table border="0" width="100%">
	<tr>
		<td style="border-style: solid; border-width: 1px"><font size="2"><b>
		Etüt Tarihi</b></font></td>
		<td style="border-style: solid; border-width: 1px"><b><font size="2">Öğrenci Adı Soyadı</font></b></td>
		<td width="211" style="border-style: solid; border-width: 1px"><b>
		<font size="2">Öğretmen</font></b></td>
		<td width="211" style="border-style: solid; border-width: 1px"><b>
		<font size="2">Saat</font></b></td>
	</tr>
	<?php
			$kullanici	=mysql_query("select * from liste where ogretmen='$ogretmenim' and saat='$saatim' and tarih='$tarihim'");
				while($e=mysql_fetch_assoc($kullanici)){
				$tadsoyad		=$e["ogrenci"];
				$ttarih			=$e["tarih"];
				$tsaat			=$e["saat"];
				$togretmen		=$e["ogretmen"];
				
				$alad		=mysql_fetch_assoc(mysql_query("select * from kullanici where id='$tadsoyad'"));
				$alogrt		=mysql_fetch_assoc(mysql_query("select * from kullanici where id='$togretmen'"));
				
	?>
	<tr>
		<td style="border-style: solid; border-width: 1px"><font size="2"><?php echo cevir($ttarih);?></font></td>
		<td style="border-style: solid; border-width: 1px"><font size="2"><?php echo $alad["adsoyad"];?></font></td>
		<td width="211" style="border-style: solid; border-width: 1px">
		<p align="center"><font size="2"> <?php echo $alogrt["adsoyad"];?></font></td>
		<td width="211" style="border-style: solid; border-width: 1px">
		<p align="center"><font size="2"> <?php echo $tsaat;?></font></td></td>
	</tr>
	<?php
		}
	?>

</table>

</body>

</html>
