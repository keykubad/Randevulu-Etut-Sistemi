<?php
session_start();
include("ayar.php");
include("fonksiyon.php"); 
$yetkikontrol		=mysql_fetch_assoc(mysql_query("select * from kullanici where kullaniciadi='".$_SESSION["kul"]."'"));

if (($_SESSION['login'] ="") || ($yetkikontrol["yetki"]!=1)){		
	git("index.php",3);		
	die ('<meta charset="utf-8" />Bu alanı görüntülemeye yetkiniz yok.!');			
}


include("header.php");
$sayfa		=$_GET["sayfa"];

switch ($sayfa){
default:		
		include("menuleft.php");
		include("main.php");		
				
break;

case cikis :
		include("menuleft.php");
		include("cikis.php");
break;

case kullaniciekle :
		include("menuleft.php");
		include("kullaniciekle.php");
break;

case kullaniciduzen :
		include("menuleft.php");
		include("kullaniciduzen.php");
break;

case kullaniciduzenle :
		include("menuleft.php");
		include("kullaniciduzenle.php");
break;

case resimduzenle :
		include("resimduzenle.php");
break;

case kullanicisil :
		$id=$_GET["id"];
		include("menuleft.php");
		$sil	=mysql_query("DELETE FROM kullanici where id='$id'");
		if($sil){
			uyar("Seçilen kayıt başarıyla silindi");
			git("yonetici.php?sayfa=kullaniciduzen",2);
		}else{
			uyar("HATA !!! Seçilen kayıt silinemedi!");
			git("yonetici.php?sayfa=kullaniciduzen",2);
		}
break;

case randevuekle :
		include("menuleft.php");
		include("randevuekle.php");
break;

case randevuduzen :
		include("menuleft.php");
		include("randevuduzen.php");
break;

case randevuduzenle :
		include("menuleft.php");
		include("randevuduzenle.php");
break;

case randevusil :
		$id=$_GET["id"];
		include("menuleft.php");
		$sil	=mysql_query("DELETE FROM randevular where rid='$id'");
		if($sil){
			uyar("Seçilen kayıt başarıyla silindi");
			git("yonetici.php?sayfa=randevuduzen",2);
		}else{
			uyar("HATA !!! Seçilen kayıt silinemedi!");
			git("yonetici.php?sayfa=randevuduzen",2);
		}
break;

case randevuyap :
include("menuleft.php");
$id=$_GET["id"];
		$baglanonay	=mysql_query("update randevular set yap='1' where rid='$id'");
		if($baglanonay){
			uyar("Randevu yapıldı olarak işaretlendi.");
			git("yonetici.php?sayfa=randevuduzen",3);
		}else{
			uyar("HATA !!! Randevu işlemi sırasında hata oluştu!");
			git("yonetici.php?sayfa=randevuistekyonetici",3);
		}
break;

case mazeretliste :
		include("menuleft.php");
		include("mazeretliste.php");
break;

case mazeretok :
$id=$_GET["id"];
$cekb		=mysql_fetch_assoc(mysql_query("select * from mazeretler where mid='$id'"));
$tarih		=$cekb["tarih"];
$ogid		=$cekb["ogrenciid"];
$saati		=$cekb["saat"];
$maz		=mysql_query("update mazeretler set kabul='1' where mid='$id' ");

		include("menuleft.php");
		if($maz){
		$baglanonay	=mysql_query("update liste set yoklama='3' where tarih='$tarih' and ogrenci='$ogid' and saat='$saati'");
		
			uyar("Mazeret kabul edilip öğrenci mazeretli devamsızlıklarına eklendi.");
			git("yonetici.php?sayfa=mazeretliste",2);
		}else{
			uyar("HATA !!! Mazeret kabulü sırasında hata oluştu!");
			git("yonetici.php?sayfa=mazeretliste",2);
		}
break;

case mazeretduzenle :
		include("menuleft.php");
		include("mazeretduzenle.php");
break;

case mazeretsil :
		$id=$_GET["id"];
		include("menuleft.php");
		$sil	=mysql_query("DELETE FROM mazeretler where mid='$id'");
		if($sil){
			uyar("Seçilen kayıt başarıyla silindi");
			git("yonetici.php?sayfa=mazeretliste",2);
		}else{
			uyar("HATA !!! Seçilen kayıt silinemedi!");
			git("yonetici.php?sayfa=mazeretliste",2);
		}
break;

case ogrenciliste :
		include("menuleft.php");
		include("ogrenciliste.php");
break;

case ogrencilisteyazdir :
		include("ogrencilisteyazdir.php");
break;

case randevuyazdir :
		include("menuleft.php");
		include("randevuyazdir.php");
break;

case etutyazdir :
		include("etutyazdir.php");
break;

case yoklamaal :
		include("menuleft.php");
		include("yoklamaal.php");
break;

case odevekle :
		include("menuleft.php");
		include("odevekle.php");
break;

case odevduzen :
		include("menuleft.php");
		include("odevduzen.php");
break;

case odevduzenle :
		include("menuleft.php");
		include("odevduzenle.php");
break;

case odevsil :
		$id=$_GET["id"];
		include("menuleft.php");
		$sil	=mysql_query("DELETE FROM odevler where odevid='$id'");
		if($sil){
			uyar("Seçilen kayıt başarıyla silindi");
			git("yonetici.php?sayfa=odevduzen",2);
		}else{
			uyar("HATA !!! Seçilen kayıt silinemedi!");
			git("yonetici.php?sayfa=odevduzen",2);
		}
break;

case odevyoklama :
		include("menuleft.php");
		include("odevyoklama.php");
break;

case odevyoklamaal :
		include("menuleft.php");
		include("odevyoklamaal.php");
break;

case odevyoklamaduzenle :
		include("menuleft.php");
		include("odevyoklamaduzenle.php");
break;

case ogretmenrapor :
		include("menuleft.php");
		include("ogretmenrapor.php");
break;

case ogrencirapor :
		include("menuleft.php");
		include("ogrencirapor.php");
break;

case bransekle :
		include("menuleft.php");
		include("bransekle.php");
break;

case bransduzen :
		include("menuleft.php");
		include("bransduzen.php");
break;

case bransduzenle :
		include("menuleft.php");
		include("bransduzenle.php");
break;

case branssil :
		$id=$_GET["id"];
		include("menuleft.php");
		$sil	=mysql_query("DELETE FROM branslar where bid='$id'");
		if($sil){
			uyar("Seçilen kayıt başarıyla silindi");
			git("yonetici.php?sayfa=bransduzen",2);
		}else{
			uyar("HATA !!! Seçilen kayıt silinemedi!");
			git("yonetici.php?sayfa=bransduzen",2);
		}
break;

case ogrenciodevrapor :
		include("menuleft.php");
		include("ogrenciodevrapor.php");
break;

case ogrenciodevraporuekran :
		include("menuleft.php");
		include("ogrenciodevraporuekran.php");
break;

case randevuistekyonetici :
		include("menuleft.php");
		include("randevuistekyonetici.php");
break;

case randevuistekok :
include("menuleft.php");

if($_POST){
	$kul	=$_POST["ad"];
	$onay	=$_POST["onayla"];
			for ($a=0;$a<=count($kul);$a++){
			
			$kaydetyok		=mysql_query("update liste set onayi='$onay[$a]' where ogrenci='$kul[$a]' ");

			
			}
				if($kaydetyok){
					uyar("Randevu isteği onaylandı.");
					git("yonetici.php?sayfa=randevuistekyonetici",2);
				}else{
					uyar("HATA !!! Randevu kabulü sırasında hata oluştu!");
					git("yonetici.php?sayfa=randevuistekyonetici",2);
				}
}else{
$id=$_GET["id"];
		$baglanonay	=mysql_query("update liste set onayi='1' where lid='$id'");
		if($baglanonay){
			uyar("Randevu isteği onaylandı.");
			git("yonetici.php?sayfa=randevuistekyonetici",2);
		}else{
			uyar("HATA !!! Randevu kabulü sırasında hata oluştu!");
			git("yonetici.php?sayfa=randevuistekyonetici",2);
		}
}
break;

case randevuistekduzenle :
		include("menuleft.php");
		include("randevuistekduzenle.php");
break;

case randevuisteksil :
		$id=$_GET["id"];
		include("menuleft.php");
		$sil	=mysql_query("DELETE FROM liste where lid='$id'");
		if($sil){
			uyar("Seçilen kayıt başarıyla silindi");
			git("yonetici.php?sayfa=randevuistekyonetici",2);
		}else{
			uyar("HATA !!! Seçilen kayıt silinemedi!");
			git("yonetici.php?sayfa=randevuistekyonetici",2);
		}
break;

case ogretmenizinekle :
		include("menuleft.php");
		include("ogretmenizinekle.php");
break;

case ogretmenizinduzen :
		include("menuleft.php");
		include("ogretmenizinduzen.php");
break;

case ogretmenizinsil :
		$id=$_GET["id"];
		include("menuleft.php");
		$sil	=mysql_query("DELETE FROM izinler where izid='$id'");
		if($sil){
			uyar("Seçilen kayıt başarıyla silindi");
			git("yonetici.php?sayfa=ogretmenizinduzen",2);
		}else{
			uyar("HATA !!! Seçilen kayıt silinemedi!");
			git("yonetici.php?sayfa=ogretmenizinduzen",2);
		}
break;

case ogretmenizinduzenle :
		include("menuleft.php");
		include("ogretmenizinduzenle.php");
break;

case ogrencirandevuistekyaz :
		include("menuleft.php");
		include("ogrencirandevuistekyaz.php");
break;

case topluizinekle :
		include("menuleft.php");
		include("topluizinekle.php");
break;

case randevukatilma :
		include("menuleft.php");
		include("randevukatilma.php");
break;

case etutkapat :
		include("menuleft.php");
		include("etutkapat.php");
break;

case yoneticimesaj :
		include("menuleft.php");
		include("yoneticimesaj.php");
break;

case yoneticimesajoku :
		include("menuleft.php");
		include("yoneticimesajoku.php");
break;

case yoneticimesajyaz :
		include("menuleft.php");
		include("yoneticimesajyaz.php");
break;

case yoneticimesajsil :
		$id=$_GET["id"];
		include("menuleft.php");
		$sil	=mysql_query("DELETE FROM mesajlar where mid='$id'");
		if($sil){
			uyar("Seçilen kayıt başarıyla silindi");
			git("yonetici.php?sayfa=yoneticimesaj",2);
		}else{
			uyar("HATA !!! Seçilen kayıt silinemedi!");
			git("yonetici.php?sayfa=yoneticimesaj",2);
		}
break;

case yoneticiogrencimesaj :
		include("menuleft.php");
		include("yoneticiogrencimesaj.php");
break;

case yoneticikullanicikontrol :
		include("menuleft.php");
		include("yoneticikullanicikontrol.php");
break;

}
		
include("footer.php");	

?>