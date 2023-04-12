<?php
session_start();
include("ayar.php");
include("fonksiyon.php");
$yetkikontrol		=mysql_fetch_assoc(mysql_query("select * from kullanici where kullaniciadi='".$_SESSION["kul"]."'"));
if (($yetkikontrol["yetki"]!=1) && ($yetkikontrol["yetki"]!=2)){		
git("index.php",3);		
die ('<meta charset="utf-8" />Bu alanı görüntülemeye yetkiniz yok.!');			
}
$kim		=$_GET["ogrenci"];
$kul		=mysql_fetch_assoc(mysql_query("select * from kullanici where yetki='3' and id='$kim'"));
$etutsay	=mysql_query("select * from liste where ogrenci='$kim' and yoklama='2'");
$etut		=mysql_num_rows($etutsay);
$odevsay	=mysql_query("select * from odevkontrol where ogrenciid='$kim' and kontrol='2'");
$odev		=mysql_num_rows($odevsay);
?>
<script type="text/javascript">
window.onload = function() {
    this.print();
};
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<center><input style='background:blue;color:#FFF;width:150px;' type="button" value="Geri Dön" onClick="javascript:history.go(-1)" /></center>
<table border="1" width="100%" height="159" bordercolor="#000000">
	<tr>
		<td width="10%">
		<img border="0" src="<?php echo $kul["resim"];?>" width="159" height="159"></td>
		<td width="89%">
		<p align="center">ADI SOYADI : <?php echo $kul["adsoyad"];?></p>
		<p align="center">Toplam Yapmadığı Ödev Sayısı&nbsp; : <?php echo $odev;?></p>
		<p align="center">Toplam Katılmadığı Etüt Sayısı&nbsp;&nbsp;&nbsp; : <?php echo $etut;?></td>
	</tr>
</table>
<table border="1" width="100%" bordercolor="#000000">
	<tr>
		<td colspan="4"><b>ÖDEV RAPORLARI</b></td>
		<td colspan="4"><b>ETÜT RAPORLARI</b></td>
	</tr>
	<tr>
		<td width="19%">Konu</td>
		<td width="14%">Öğretmen</td>
		<td width="8%">Veriliş Tarihi</td>
		<td width="8%">Durum</td>
		<td width="21%">Konu</td>
		<td width="11%">Öğretmen</td>
		<td width="8%">Etüt Tarihi</td>
		<td width="8%">Durum</td>
	</tr>

	<table border="1" width="50.6%" bordercolor="#000000" style='float:left;'>
	<?php
	$etutsays	=mysql_query("select * from liste where ogrenci='$kim' order by tarih desc");
	$odevsays	=mysql_query("select * from odevkontrol where ogrenciid='$kim' order by verilist desc");
			while($sd=mysql_fetch_assoc($odevsays)){
				$odevkonu	=$sd["konu"];
				$vtarih		=$sd["verilist"];
				$kontrolu	=$sd["kontrol"];
				$ogretmeni	=$sd["ogretmenid"];
				$odevogretmen	=mysql_fetch_assoc(mysql_query("select * from kullanici where yetki='2' and id='$ogretmeni'"));
	?>
	<tr>
		<td width="19%"><?php echo $odevkonu;?></td>
		<td width="14%"><?php echo $odevogretmen["adsoyad"];?></td>
		<td width="8%"><?php echo cevir($vtarih);?></td>
		<td width="8%">
		<?php 
			if($kontrolu==1){
				echo "Yapıldı";
			}elseif($kontrolu==2){
				echo "Yapılmadı";
			}else{
				echo "Yetersiz";
			}
			
					
		?>
		
		</td>
		</tr>
		
	<?php
			}
	?>
	</table>
	<table border="1" width="49.4%" bordercolor="#000000" style='float:right;'>
<?php
		
				while($dw=mysql_fetch_assoc($etutsays)){
					$ogretmenim		=$dw["ogretmen"];
					$ogrencisi		=$dw["ogrenci"];
					$konusu			=$dw["konusu"];
					$etarih			=$dw["tarih"];
					$yoklama		=$dw["yoklama"];
					$eogretmen	=mysql_fetch_assoc(mysql_query("select * from kullanici where yetki='2' and id='$ogretmenim'"));
		?>
		<tr>
		<td width="21%"><?php echo $konusu;?></td>
		<td width="11%"><?php echo $eogretmen["adsoyad"];?></td>
		<td width="8%"><?php echo cevir($etarih);?></td>
		<td width="8%">		<?php 
			if($yoklama==1){
				echo "Katıldı";
			}elseif($yoklama==2){
				echo "Katılmadı";
			}else{
				echo "Mazeretli";
			}
			
					
		?></td>
		</tr>
	<?php
			}	
	?>

</table>
</table>