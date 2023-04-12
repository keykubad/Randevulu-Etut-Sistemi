<?php

session_start();
include("ayar.php");
include("fonksiyon.php");
$yetkikontrol		=mysql_fetch_assoc(mysql_query("select * from kullanici where kullaniciadi='".$_SESSION["kul"]."'"));
if (($yetkikontrol["yetki"]!=1) && ($yetkikontrol["yetki"]!=2)){		
git("index.php",3);		
die ('<meta charset="utf-8" />Bu alanı görüntülemeye yetkiniz yok.!');			
}
$tarihbas		=$_GET["bas"];
$tarihson		=$_GET["son"];

$starihbas		=cevir($tarihbas);
$starihson		=cevir($tarihson);
?>

<html>

<head>
<script type="text/javascript">
window.onload = function() {
    this.print();
};
</script>
<meta http-equiv="Content-Language" content="tr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $tarihbas; ?> ile <?php echo $tarihson;?> arası randevu listesi</title>
</head>

<body>
<center><input style='background:blue;color:#FFF;width:150px;' type="button" value="Geri Dön" onClick="javascript:history.go(-1)" /></center>
<table border="0" width="100%">
	<tr>
		<td style="border-style: solid; border-width: 1px">
		<p align="center"><b><font size="2"><?php echo $tarihbas; ?> ile <?php echo $tarihson;?> arası randevu listesi</font></b></td>
	</tr>
	</table>
<table border="0" width="100%">
	<tr>
		<td style="border-style: solid; border-width: 1px"><b><font size="2">Öğretmen Adı Soyadı</font></b></td>
		<td style="border-style: solid; border-width: 1px"><b><font size="2">Branş</font></b></td>
		<td style="border-style: solid; border-width: 1px"><b><font size="2">Öğrenci Adı Soyadı</font></b></td>
		<td style="border-style: solid; border-width: 1px"><b><font size="2">Ders Saati</font></b></td>
		<td style="border-style: solid; border-width: 1px"><b><font size="2">Etüt Konusu</font></b></td>
		<td style="border-style: solid; border-width: 1px"><b><font size="2">Tarih </font></b></td>
	</tr>
	<?php
			$etutler	=mysql_query("select * from liste where tarih>='$starihbas' and tarih<='$starihson' and istekmi='1' order by tarih desc");
				while($e=mysql_fetch_assoc($etutler)){
				$ogretmeni		=$e["ogretmen"];
				$ogrencisi		=$e["ogrenci"];
				$saati			=$e["saat"];
				$konusu			=$e["konusu"];
				$tarihi			=$e["tarih"];
				
				$ogretmenkimdir		=mysql_fetch_assoc(mysql_query("select * from kullanici where id='$ogretmeni'"));
				$ogrencikimdir		=mysql_fetch_assoc(mysql_query("select * from kullanici where id='$ogrencisi'"));
				$bransne			=mysql_fetch_assoc(mysql_query("select * from branslar where idogretmen='$ogretmeni'"));
					
	?>
	<tr>
		<td width="250" style="border-style: solid; border-width: 1px"><font size="2"><?php echo $ogretmenkimdir["adsoyad"];?></font></td>
		<td width="100" style="border-style: solid; border-width: 1px"><font size="2"><?php echo $bransne["bransi"];?></font></td>
		<td width="250" style="border-style: solid; border-width: 1px"><font size="2"><?php echo $ogrencikimdir["adsoyad"];?></font></td>
		<td style="border-style: solid; border-width: 1px"><font size="2"><?php echo $saati;?></font></td>
		<td style="border-style: solid; border-width: 1px"><font size="2">  <?php echo $konusu;?> </font></td>
		<td width="75" style="border-style: solid; border-width: 1px"><font size="2"> <?php echo cevir($tarihi);?>  </font></td>
	</tr>
	<?php
		}
	?>

</table>

</body>

</html>
