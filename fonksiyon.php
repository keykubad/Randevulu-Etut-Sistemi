<?php
//yonlendirme
function git ($yer,$sure){			
echo '<meta http-equiv="refresh" content="'.$sure.';URL='.$yer.'">';
}
//mavi uyarı led
function uyar($cikis){	
echo "<div class='alert alert-info'>    	
<a class='close' data-dismiss='alert' href='#'>&times;</a>   ".$cikis."  </div>";
}
//Tarih Çevirme Fonksiyonu
function cevir($tarih) {	
			$parcala = explode("-",$tarih);	
			$yeni_tarih= $parcala[2]."-".$parcala[1]."-".$parcala[0];	
			return $yeni_tarih;
}

//İki tarih arası hesaplama fonksiyonu +5 days +7 days gibi ekle

function sonrakitarih($kac,$gun){


$start_date = date("Y-m-d", strtotime($kac, strtotime($gun)));

return $start_date;
}
//iki tarih arası gün sayısını bulur
function fark_bul($tarih1,$tarih2,$ayrac)
 {
  list($g1,$a1,$y1) = explode($ayrac,$tarih1);
  list($g2,$a2,$y2) = explode($ayrac,$tarih2);
  
  $t1_timestamp = mktime('0','0','0',$a1,$g1,$y1);
  $t2_timestamp = mktime('0','0','0',$a2,$g2,$y2);
  
  if ($t1_timestamp > $t2_timestamp)
  {
   $result = ($t1_timestamp - $t2_timestamp) / 86400;
  }
  else if ($t2_timestamp > $t1_timestamp)
  {
   $result = ($t2_timestamp - $t1_timestamp) / 86400;
  }
  
  return $result;
 }  
 //İki Tarih Arasındaki Günleri Bulma ve Sıralama
Function tarihara($bas,$son,$bulunacak){
	$dt=Array($bas,$son);
	$dates=Array();
	$i=0;
			while (strtotime($dt[1])>=strtotime("+".$i." day",strtotime($dt[0])))
			$dates[]=date("d-m-Y",strtotime("+".$i++." day",strtotime($dt[0])));

	foreach ($dates as $value){

			if(stristr($value,$bulunacak)){
			return "1";//1 dönerse var demek oluyor

			}
	}
}

 //İki Tarih Arasındaki Günleri Bulma ve Sıralama
function tarihbul($baslangic,$bitis) {
	$kes1=explode('-',$baslangic);
	$kes2=explode('-',$bitis);
	$time1=mktime(0,0,0,$kes1[1],$kes1[0],$kes1[2]);
	$time2=mktime(0,0,0,$kes2[1],$kes2[0],$kes2[2]);
		while($time1<=$time2) {
			$x=date('Y-m-d', ($time1));
			echo $x;
			$time1=$time1+86400;
		}
}
//gelen tarih unix zaman damgasına cevirir
function unixzaman($tarih){
    //Veriyi Gün, Ay, Yıl olarak ayırıyoruz.
 list($gun,$ay,$yil) = split("[-]",$tarih);   
     
    //ben saat dakikayı kullanmacağım için 0 a eşitledim
    $saat=$dakika=$saniye=0;
    $unixzaman = mktime($saat,$dakika,$saniye, $ay, $gun, $yil);   
    //Parçalara Ayrılmış Tarih verileri Unix Zaman Damgasına Çevriliyor... 
    return $unixzaman;
}

?>