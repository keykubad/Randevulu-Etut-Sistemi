<?php
session_start();
$guvenlik=$_POST["guvenlik_kodu"];
 //Güvenlik kodu kontrol ediliyor
if($_SESSION['guvenlik_kodu'] != $_POST['guvenlik_kodu']) {
    echo '<center><span class="hata"><b>Hata:</b> Güvenlik kodunu hatalı girdiniz! Lütfen tekrar deneyiniz. <br><a href="javascript:history.go(-1)">Geri dön</a></center> ';
  }

else {
    // Güvenlik kodu doğru ise yapılacak işlemler
$genel	=mysql_fetch_array(mysql_query("select * from genel_ayar"));
$mailalici	=$genel["site_mail"];	
$gonder_isim=$_POST["adi"];
$gonder_mail=$_POST["email"];
$alan_mail=$_POST["alan_mail"];
$mesaj=$_POST["mesaj"];
$baslik=$_POST["konu"];
$mesaj="Merhaba <b>" . $mailalici . "<br></b>Aşağıdaki Mail Size <b>" .
$gonder_isim . " </b>Tarafından Gönderilmiştir.
<br><br><br><b>Mesaj:</b><br><br>" . $mesaj;


$mailtanim = "MIME-Version: 1.0\r\n"; // bu kısım tanımlama kısmı
$mailtanim .= "Content-type: text/plain; charset=iso-8859-9\r\n";
$mailtanim .= "From: $gonder_isim <$gonder_mail>\r\n";
$mailtanim .= "Reply-To: $gonder_isim <$gonder_mail>\r\n";


mail($mailalici,$baslik,stripslashes($mesaj),$mailtanim);

echo "<center>Mailiniz Gönderilmiştir.<br>Yönlendiriliyorsunuz...<meta http-equiv='refresh' content='5;URL=iletisim.html'></center>";

}
?>