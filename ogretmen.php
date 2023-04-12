<?php 
session_start();
include("ayar.php");
include("fonksiyon.php");
$yetkikontrol		=mysql_fetch_assoc(mysql_query("select * from kullanici where kullaniciadi='".$_SESSION["kul"]."'"));
if (($yetkikontrol["yetki"]!=2)){		
git("index.php",3);		
die ('<meta charset="utf-8" />Bu alanı görüntülemeye yetkiniz yok.!');			
}

include("ogretmenust.php");
$sayfa		=$_GET["sayfa"];

switch ($sayfa){
default:		
		include("ogretmensol.php");
		include("ogretmenmenu.php");		
				
break;

case cikis :
		include("ogretmensol.php");
		include("ogretmencikis.php");
break;

case ogrenciekle :
		include("ogretmensol.php");
		include("ogrenciekle.php");
break;


case resimduzenle :
		include("resimduzenle.php");
break;


case ogretmenrandevuekle :
		include("ogretmensol.php");
		include("ogretmenrandevuekle.php");
break;

case ogretmenrandevuliste :
		include("ogretmensol.php");
		include("ogretmenrandevuliste.php");
break;

case ogretmenrandevuyazdir :
		include("ogretmensol.php");
		include("ogretmenrandevuyazdir.php");
break;

case ogretmenyoklamaal :
		include("ogretmensol.php");
		include("ogretmenyoklamaal.php");
break;

case ogretmenodevekle :
		include("ogretmensol.php");
		include("ogretmenodevekle.php");
break;

case ogretmenodevyoklama :
		include("ogretmensol.php");
		include("ogretmenodevyoklama.php");
break;

case ogretmenodevyoklamaal :
		include("ogretmensol.php");
		include("ogretmenodevyoklamaal.php");
break;

case ogretmenogrenciodevrapor :
		include("ogretmensol.php");
		include("ogretmenogrenciodevrapor.php");
break;

case ogretmenogrencirapor :
		include("ogretmensol.php");
		include("ogretmenogrencirapor.php");
break;

case ogretmenrandevuistek :
		include("ogretmensol.php");
		include("ogretmenrandevuistek.php");
break;

case ogretmenogrenciodevraporuekran :
		include("ogretmensol.php");
		include("ogretmenogrenciodevraporuekran.php");
break;

case ogretmenogrenciraporyazdir :
		include("ogretmensol.php");
		include("ogretmenogrenciraporyazdir.php");
break;

case mazeretok :
$id=$_GET["id"];
$cekb		=mysql_fetch_assoc(mysql_query("select * from mazeretler where mid='$id'"));
$tarih		=$cekb["tarih"];
$ogid		=$cekb["ogrenciid"];
$saati		=$cekb["saat"];
$maz		=mysql_query("update mazeretler set kabul='1' where mid='$id' ");

		include("ogretmensol.php");
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
		include("ogretmensol.php");
		include("mazeretduzenle.php");
break;

case mazeretsil :
		$id=$_GET["id"];
		include("ogretmensol.php");
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
		include("ogretmensol.php");
		include("ogrenciliste.php");
break;

case ogrencilisteyazdir :
		include("ogrencilisteyazdir.php");
break;

case randevuyazdir :
		include("ogretmensol.php");
		include("randevuyazdir.php");
break;

case etutyazdir :
		include("etutyazdir.php");
break;

case yoklamaal :
		include("ogretmensol.php");
		include("yoklamaal.php");
break;

case odevekle :
		include("ogretmensol.php");
		include("odevekle.php");
break;

case odevduzen :
		include("ogretmensol.php");
		include("odevduzen.php");
break;

case odevduzenle :
		include("ogretmensol.php");
		include("odevduzenle.php");
break;

case odevsil :
		$id=$_GET["id"];
		include("ogretmensol.php");
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
		include("ogretmensol.php");
		include("odevyoklama.php");
break;

case odevyoklamaal :
		include("ogretmensol.php");
		include("odevyoklamaal.php");
break;

case odevyoklamaduzenle :
		include("ogretmensol.php");
		include("odevyoklamaduzenle.php");
break;

case ogretmenrapor :
		include("ogretmensol.php");
		include("ogretmenrapor.php");
break;

case ogrencirapor :
		include("ogretmensol.php");
		include("ogrencirapor.php");
break;

case ogrenciodevrapor :
		include("ogretmensol.php");
		include("ogrenciodevrapor.php");
break;

case ogrenciodevraporuekran :
		include("ogretmensol.php");
		include("ogrenciodevraporuekran.php");
break;

case randevuistekyonetici :
		include("ogretmensol.php");
		include("randevuistekyonetici.php");
break;

case ogretmenrandevuistekok :
include("ogretmensol.php");
$id=$_GET["id"];
		$baglanonay	=mysql_query("update liste set onayi='1' where lid='$id'");
		if($baglanonay){
			uyar("Randevu isteği onaylandı.");
			git("ogretmen.php?sayfa=ogretmenrandevuistek",2);
		}else{
			uyar("HATA !!! Randevu kabulü sırasında hata oluştu!");
			git("ogretmen.php?sayfa=ogretmenrandevuistek",2);
		}
break;

case ogretmenrandevuistekyap :
include("ogretmensol.php");
$id=$_GET["id"];
		$baglanonay	=mysql_query("update liste set yapildimi='1' where lid='$id'");
		if($baglanonay){
			uyar("Etüt yapıldı olarak güncellendi.");
			git("ogretmen.php?sayfa=ogretmenrandevuistek",2);
		}else{
			uyar("HATA !!! İşlem sırasında hata oluştu!");
			git("ogretmen.php?sayfa=ogretmenrandevuistek",2);
		}
break;

case ogretmenetutyap :
include("ogretmensol.php");
$id=$_GET["id"];
		$baglanonay	=mysql_query("update randevular set yap='1' where rid='$id'");
		if($baglanonay){
			uyar("Etüt yapıldı olarak güncellendi.");
			git("ogretmen.php?sayfa=ogretmenrandevuliste",2);
		}else{
			uyar("HATA !!! İşlem sırasında hata oluştu!");
			git("ogretmen.php?sayfa=ogretmenrandevuliste",2);
		}
break;

case ogretmenetutonay :
include("ogretmensol.php");
$id=$_GET["id"];
		$baglanonay	=mysql_query("update randevular set onay='1' where rid='$id'");
		if($baglanonay){
			uyar("Etüt başarıyla onaylandı.");
			git("ogretmen.php?sayfa=ogretmenrandevuliste",2);
		}else{
			uyar("HATA !!! İşlem sırasında hata oluştu!");
			git("ogretmen.php?sayfa=ogretmenrandevuliste",2);
		}
break;

case ogretmeneskietut :
		include("ogretmensol.php");
		include("ogretmenetuteski.php");
break;

case ogretmenogrencikontrol :
		include("ogretmensol.php");
		include("ogretmenogrencikontrol.php");
break;

case ogretmensifredegis :
		include("ogretmensol.php");
		include("ogretmensifredegis.php");
break;

case ogretmenrandevuduzen :
		include("ogretmensol.php");
		include("ogretmenrandevuduzen.php");
break;

case ogretmenrandevuyap :
include("menuleft.php");
$id=$_GET["id"];
		$baglanonay	=mysql_query("update randevular set yap='1' where rid='$id'");
		if($baglanonay){
			uyar("Randevu yapıldı olarak işaretlendi.");
			git("ogretmen.php?sayfa=ogretmenrandevuduzen",3);
		}else{
			uyar("HATA !!! Randevu işlemi sırasında hata oluştu!");
			git("ogretmen.php?sayfa=ogretmenrandevuduzen",3);
		}
break;

case ogretmenrandevusil :
		$id=$_GET["id"];
		include("menuleft.php");
		$sil	=mysql_query("DELETE FROM randevular where rid='$id'");
		if($sil){
			uyar("Seçilen kayıt başarıyla silindi");
			git("ogretmen.php?sayfa=ogretmenrandevusil",2);
		}else{
			uyar("HATA !!! Seçilen kayıt silinemedi!");
			git("ogretmen.php?sayfa=ogretmenrandevusil",2);
		}
break;

case ogretmenrandevukatilma :
		include("ogretmensol.php");
		include("ogretmenrandevukatilma.php");
break;
}
		
include("ogretmenalt.php");		
?>