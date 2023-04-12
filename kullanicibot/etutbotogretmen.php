<?php
include ("../ayar.php");
set_time_limit(0);
@header('Content-Type: text/html; charset=utf-8');
function curl_cek($url){
		$useragent 	= 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:24.0) Gecko/20100101 Firefox/24.0';
		$referer 	= 'https://www.google.com/accounts/ServiceLogin?service=youtube';
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		//curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_REFERER, $referer);
		curl_setopt ($ch, CURLOPT_USERAGENT, $useragent);
		//curl_setopt($ch, CURLOPT_TIMEOUT, 0);
		$rmx = curl_exec($ch);
		curl_close($ch);
		return $rmx;
}

$ac 			= curl_cek("http://etut.hisarciklioglu.k12.tr/kullanicibot/ogretmen.html");
$parcala		=explode ("\n",$ac);
		foreach ($parcala as $parca){
			$site=explode (":",$parca);
			$adisoyadi		=trim($site[0]);
			$adisoyadi		=iconv('ISO-8859-9', 'UTF-8',$adisoyadi);
			$kullaniciadi	=trim($site[2]);
			$sifre			=trim($site[3]);
			$sifre			=md5($sifre);
			$mysql_kayit	=mysql_query("insert into kullanici (kullaniciadi,adsoyad,sifre,yetki) values('$kullaniciadi','$adisoyadi','$sifre',2)");
	
			
		
			
		}
		if($mysql_kayit){
				echo "TÜM KAYITLAR BAŞARIYLA VERİTABANINA EKLENDİ";
			}else{
				echo "HATA VAR!";
			}
?>