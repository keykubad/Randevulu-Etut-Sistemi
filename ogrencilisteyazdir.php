<?php

session_start();
include("ayar.php");
include("fonksiyon.php");
$yetkikontrol		=mysql_fetch_assoc(mysql_query("select * from kullanici where kullaniciadi='".$_SESSION["kul"]."'"));
if (($yetkikontrol["yetki"]!=1) && ($yetkikontrol["yetki"]!=1)){		
//git("index.php",3);	
echo $yetkikontrol["yetki"];
echo $_SESSION["kul"];	
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Öğrenci Listesi</title>
</head>

<body>
<center><input style='background:blue;color:#FFF;width:150px;' type="button" value="Geri Dön" onClick="javascript:history.go(-1)" /></center>
<table border="0" width="100%">
	<?php
			$kullanici	=mysql_query("select * from kullanici where yetki='3'");
			$sayogrenci	=mysql_num_rows($kullanici);
	?>
	<tr>
		<td style="border-style: solid; border-width: 1px">
		<p align="center"><b><font size="2">Öğrenci Listesi (Toplam kayıtlı öğrenci sayısı : <?php echo $sayogrenci;?> )</font></b></td>
	</tr>
	</table>
<table border="0" width="100%">
	<tr>
		<td style="border-style: solid; border-width: 1px"><b><font size="2">Kayıt Tarihi</font></b></td>
		<td style="border-style: solid; border-width: 1px"><b><font size="2">Öğrenci Adı Soyadı</font></b></td>
		<td width="422" style="border-style: solid; border-width: 1px"><b>
		<font size="2">Devamsızlık Bilgisi</font></b></td>
	</tr>
	<?php
			$kullanici	=mysql_query("select * from kullanici where yetki='3'");
				while($e=mysql_fetch_assoc($kullanici)){
				$adsoyad	=$e["adsoyad"];
				$kayittarih	=$e["tarih"];
				$ids		=$e["id"];
				
				$yoklama		=mysql_query("select * from liste where ogrenci='$ids' and yoklama='3'");
				$mazeretli		=mysql_num_rows($yoklama);
				$yoklama2		=mysql_query("select * from liste where ogrenci='$ids' and yoklama='2'");
				$mazeretsiz		=mysql_num_rows($yoklama2);
				$yoklama3		=mysql_query("select * from liste where ogrenci='$ids' and yoklama='1'");
				$katildigi		=mysql_num_rows($yoklama3);
	?>
	<tr>
		<td style="border-style: solid; border-width: 1px"><font size="2"><?php echo $kayittarih;?></font></td>
		<td style="border-style: solid; border-width: 1px"><font size="2"><?php echo $adsoyad;?></font></td>
		<td width="422" style="border-style: solid; border-width: 1px">
		<p align="center"><font size="2">Mazeretli : <?php echo $mazeretli;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		Mazeretsiz : <?php echo $mazeretsiz;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		Toplam Katıldığı Etüt : <?php echo $katildigi;?></font></td>
	</tr>
	<?php
		}
	?>

</table>

</body>

</html>
