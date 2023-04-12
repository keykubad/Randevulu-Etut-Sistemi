<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden sisteme öğrenci ekleyebilirsiniz.</small>
            </div>
        </div>
    </div>
</div>
<?php 
if($_POST){
$yetki			=$_POST["yetki"];
$adsoyad		=$_POST["adsoyad"];
$kullanici		=$_POST["kullanici"];
$sifre			=md5($_POST["sifre"]);
$kayittarih		=$_POST["kayittarih"];
$sinif			=$_POST["sinif"];
$resimf			=$_FILES["resim"]["tmp_name"];

	if (($yetki=="") || ($adsoyad=="") || ($kullanici=="") || ($sifre=="") || ($kayittarih=="") || ($resimf=="")){
		uyar("HATA!! Lütfen boş alan bırakmayınız!!");
		
	}
					$resimadioyna	=rand(0,10000);
					$resimyuklenme	=$resimadioyna."_".$_FILES['resim']['name'];
					$resimboyut		=$_FILES['resim']['size'];
					$resimtipi		=$_FILES['resim']['type'];
					//resim kontrol
					if($resimboyut>1000000 || strpos($resimtipi,"php")){
						uyar("HATA!!","Yüklediğiniz resim 1MB dan büyük yada resim değil!");
						exit();
					}else{
					
						$yuklenenresim	 = "yuklenenler/kullanici/" .$resimyuklenme;
						copy($resimf,$yuklenenresim);
						
						$kaydet		=mysql_query("insert into kullanici (kullaniciadi,adsoyad,sifre,tarih,yetki,resim,sinif)
						values ('$kullanici','$adsoyad','$sifre','$kayittarih','$yetki','$yuklenenresim','$sinif')");
							if($kaydet){
								uyar("Kayıt işlemi başarılı!");
							}else{
								uyar("HATA!! Kayıt işlemi sırasında mysql hatası oluştu.!");
							
							}
					}
						
}
?>
<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header blue-background'>
            <div class='title'>
                <div class='icon-user'></div>
                Kullanıcı ekleme menüsü
            </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content'>
            <form class="form form-horizontal" method="post" style="margin-bottom: 0;" enctype="multipart/form-data"/><div style="margin:0;padding:0;display:inline">
                                <div class='control-group'>
                    <label class='control-label'>Yetki</label>
                    <div class='controls'>
                        <select class='span3' name="yetki">
                           <option value="3">Öğrenci</option>
                        </select>
                    </div>
                </div>
				
				<div class='control-group'>
                    <label class='control-label'>Adı Soyadı</label>
                    <div class='controls'>
                        <input class='input-block-level' name="adsoyad" placeholder='Adı Soyadı' type='text' />
                    </div>
                </div>				<div class='control-group'>                    <label class='control-label'>Sınıfı <p style="font-size:8px;">Öğrenci ise belirtiniz</p></label>                    <div class='controls'>                        <input class='input-block-level' name="sinif" placeholder='Sınıfını yazınız' type='text' />                    </div>                </div>
				 <div class='control-group'>
                    <label class='control-label'>Kullanıcı Adı</label>
                    <div class='controls'>
                        <input class='input-block-level' name="kullanici" placeholder='Kullanıcı adı' type='text' />
						<small>Kullanıcı girişinde kullanılacak olan adı giriniz</small>
                    </div>
					
                </div>
		<div class='control-group'>
                    <label class='control-label' for='inputPassword4'>Şifre</label>
                    <div class='controls'>
                        <input class='input-block-level' id='inputPassword4' name="sifre" placeholder='Şifre yazınız' type='password' />
                    </div>
                </div>
				        <div class='control-group'>
                 <label class='control-label' for='inputPassword4'>Kayıt tarihi</label>
                <div class='controls'>
                    <div class='datetimepicker input-append' id='datetimepicker'>
                        <input class='input-medium' name="kayittarih" data-format='MM/dd/yyyy HH:mm:ss' placeholder='Kayıt zamanı seçiniz' type='text' />
            <span class='add-on'>
              <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
            </span>
                    </div>
                </div>
            </div>
				
				<div class='control-group'>
             <label class='control-label' for='inputPassword4'>Kullanıcı resimi</label>
            <div class='controls'>
                <input title='Resim dosyasını bilgisayarınızdan seçmek için tıklayınız' type='file' name="resim"/>
            </div>
        </div>
				
				
				      <div class='form-actions' style='margin-bottom: 0;'>
						
                       <input class="btn btn-primary btn-large" type="submit" value="Ekle">
                
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
