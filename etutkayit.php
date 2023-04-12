<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='page-header'>
    <h1 class='pull-left'>
        <i class='icon-dashboard'></i>
        <span>Randevu Sistemi</span>
    </h1>
    <div class='pull-right'>

    </div>
</div>

<div class='row-fluid'>
    <div class='span12 box'>

		
 <div class='box-content'>
<?php 
$idsi	=$_GET["id"];
		$ogretmeni 	=$_POST["ogretmeni"];
		$saat	 	=$_POST["saat"];
		$konune	 	=$_POST["konusu"];
		$tarih 		=cevir($_POST["tarihi"]);
		$ogrenciid 	=$_POST["ogrenciid"];
		$kontrolyap		=mysql_fetch_assoc(mysql_query("select * from liste where saat='$saat' and ogrenci='$ogrenciid' "));
		
		if($kontrolyap){
					uyar("<center>$tarih randevusuna daha önce katılım isteğinde bulunmuşsunuz.Lütfen onay bekleyiniz.</center>");
					git("ogrenci.php?sayfa=etutliste",8);
		}else{
		
			$radenvukayit	=mysql_query("insert into liste (ogrenci,tarih,saat,ogretmen,konusu,onayi) values 
			('$ogrenciid','$tarih','$saat','$ogretmeni','$konune',0)");
				if($radenvukayit){
					$katil	=mysql_query("update randevular set katilim=katilim+1 where rid='$idsi'");
					uyar("<center>$tarih Randevusuna katılıma isteğiniz başarıyla alındı.İncelenip onaylandıktan sonra katılımınız gerçekleşecektir.<br><br>YÖNLENDİRİLİYORSUNUZ</center>");
					git("ogrenci.php?sayfa=etutliste",8);					
				}else{
					uyar("<center>$tarih Randevusuna katılma işlemi başarısız.Lütfen tekrar deneyiniz.</center>");
				}
		}
?>
        
</div>
</div>
</div>








  

</div>


</div>
</div>
</div>
</section>

