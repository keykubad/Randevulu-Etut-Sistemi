<?php 
session_start();
include("ayar.php");
include("fonksiyon.php");

$yetkikontrol		=mysql_fetch_assoc(mysql_query("select * from kullanici where kullaniciadi='".$_SESSION["kul"]."'"));
if (($yetkikontrol["yetki"]!=3)){		
git("index.php",3);		
die ('<meta charset="utf-8" />Bu alanı görüntülemeye yetkiniz yok.!');			
}
include("ogrenciust.php");
$sayfa		=$_GET["sayfa"];
switch ($sayfa){

default:				
	include("ogrencisol.php");		
	include("ogrencimenu.php");						
break;

case etutliste:		
	include("ogrencisol.php");		
	include("etutliste.php");
break;

case ogretmenkontrol:		
	include("ogrencisol.php");		
	include("ogretmendurum.php");
break;

case etutkayit:		
	include("ogrencisol.php");		
	include("etutkayit.php");
break;

case ogrencimesajyaz:		
	include("ogrencisol.php");	
	include("ogrencimesajyaz.php");
break;

case etutistek:		
	include("ogrencisol.php");		
	include("etutistek.php");
break;

case odevlerim:		
	include("ogrencisol.php");		
	include("odevlerim.php");
break;


case cikis:		
	include("ogrencisol.php");	
	session_destroy();
	uyar("<center>Çıkış işlemi başarıyla gerçekleşti!<br>YÖNLENDİRİLİYORSUNUZ...</center>");
	git("index.php",3);
break;

case ogrencisifredegis:		
	include("ogrencisol.php");		
	include("ogrencisifredegis.php");
break;

case ogrencietutisteksil:		
	include("ogrencisol.php");		
	$idsi	=$_GET["id"];
	$sildir	=mysql_query("DELETE FROM liste where lid='$idsi'");
		if($sildir){
			uyar("Seçtiğiniz etüt isteğiniz sistemden tamamen silinmiştir.<br>YÖNLENDİRİLİYORSUNUZ");
			git("ogrenci.php?sayfa=etutliste",5);
		}else{
			uyar("HATA !!! Seçtiğiniz etüt isteğiniz sistemden silinememiştir..<br>YÖNLENDİRİLİYORSUNUZ");
			git("ogrenci.php?sayfa=etutliste",2);
		}
break;

case ogrencimesajoku:		
	include("ogrencisol.php");		
	include("ogrencimesajoku.php");
break;

}
include("ogrencialt.php");

?>