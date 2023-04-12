<?php

session_start();
include("ayar.php");
include("fonksiyon.php");
$yetkikontrol		=mysql_fetch_assoc(mysql_query("select * from kullanici where kullaniciadi='".$_SESSION["kul"]."'"));
if (($_SESSION["login"]=="") || ($yetkikontrol["yetki"]!=1)){		
git("index.php",3);		
die ('<meta charset="utf-8" />Bu alanı görüntülemeye yetkiniz yok.!');			
}
$idi	=$_GET["ogretmen"];
$bas	=$_GET["bas"];
$son	=$_GET["son"];
			$cekad		=mysql_fetch_assoc(mysql_query("select * from kullanici where yetki='2' and id='$idi'"));
			$etutsay	=mysql_query("select * from randevular where tarih>'$bas' and tarih<='$son' and ogretmen='$idi' ");
			$odevsay	=mysql_query("select * from odevler where verilistarih>'$bas' and verilistarih<='$son' and ogretmeni='$idi' ");
			$saydir		=mysql_num_rows($etutsay);
			$odevtoplam	=mysql_num_rows($odevsay);

?>
<script type="text/javascript">
window.onload = function() {
    this.print();
};
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<meta http-equiv="Content-Language" content="tr">
</head>
<center><a style='background:blue;color:#FFF;width:200px;' href="yonetici.php?sayfa=ogretmenrapor" />Geri dönmek için tıklayınız</a></center>
<table border="1" width="100%" height="15" bordercolor="#000000" style="border-collapse: collapse">
	<tr>
		<td colspan="6">
		<p align="center"><b><font size="4">Öğretmen Rapor Sayfası</font></b> / <?php echo cevir($bas);?> tarihi ile <?php echo cevir($son);?> tarihi arası rapordur
		</td>
	</tr>
	<tr>
		<td width="99%" colspan="6">Öğretmen Adı Soyadı : <?php echo $cekad["adsoyad"];;?></td>
	</tr>
	<tr>
		<td width="51%" colspan="3" >ETÜT RAPORU (Toplam Verilen Etüt Sayısı : <?php echo $saydir;?>)</td>
		<td width="48%" colspan="3" >ÖDEV RAPORU (Toplam Verilen Ödev Sayısı : <?php echo $odevtoplam;?>)</td>
	</tr>
	<tr>
		<td width="17%">Etüt Konusu</td>
		<td width="17%">Tarihi</td>
		<td width="17%">Katılım Sayısı</td>
		<td width="16%">Ödev Konusu</td>
		<td width="16%">Veriliş Tarihi</td>
		<td width="16%">Sınıf</td>
	</tr>
<table border="1" width="51.6%" height="15" bordercolor="#000000" style="border-collapse: collapse;float:left;">
	
	<?php
		while($os=mysql_fetch_assoc($etutsay)){
			$etutkonu	=$os["konu"];
			$tarih		=$os["tarih"];
			$katilim	=$os["katilim"];
	?>
	<tr>
		<td width="17%"><?php echo $etutkonu;?></td>
		<td width="17%"><?php echo cevir($tarih);?></td>
		<td width="17%"><?php echo $katilim;?></td>
</tr>
		<?php
		}
		?>
</table>
<table border="1" width="48.4%" height="15" bordercolor="#000000" style="border-collapse: collapse;float:right;">

		
		<?php
			while	($osx=mysql_fetch_assoc($odevsay)){
			$okonu		=$osx["odevkonu"];
			$otarih		=$osx["verilistarih"];
			$sinifi		=$osx["sinif"];
		?>
	<tr>
		<td width="16%"><?php echo $okonu;?></td>
		<td width="16%"><?php echo cevir($otarih);?></td>
		<td width="16%"><?php echo $sinifi;?></td>
	</tr>
		<?php
		}
		?>
		</table>
</table>
