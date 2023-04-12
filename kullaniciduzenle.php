<SCRIPT TYPE="text/javascript">
<!--
function popupform(myform, windowname)
{
if (! window.focus)return true;
window.open('', windowname, 'height=200,width=400,scrollbars=yes');
myform.target=windowname;
return true;
}
//-->
</SCRIPT> 
<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden sisteminize öğretmen veya öğrenci düzenleyebilirsiniz.</small>
            </div>
        </div>
    </div>
</div>
<?php 
$ids			=$_GET["id"];
if($_POST){
$yetki			=$_POST["yetki"];
$adsoyad		=$_POST["adsoyad"];
$kullanici		=$_POST["kullanici"];
$sinifi		=$_POST["sinif"];
$sifre			=$_POST["sifre"];
$kayittarih		=$_POST["kayittarih"];

	if (($yetki=="")){
		uyar("HATA!! Lütfen boş alan bırakmayınız!!");
		git("yonetici.php?sayfa=kullaniciduzenle&id=$ids",5);
	}elseif (!$sifre){
								$kaydet		=mysql_query("update kullanici set kullaniciadi='$kullanici',
								adsoyad='$adsoyad',tarih='$kayittarih',yetki='$yetki',sinif='$sinifi' where id='$ids'");
										if($kaydet){
											uyar("Kayıt düzenleme işlemi başarılı!");
											git("yonetici.php?sayfa=kullaniciduzenle&id=$ids",5);
										}else{
											
											uyar("HATA!! Kayıt işlemi sırasında mysql hatası oluştu.!");
											git("yonetici.php?sayfa=kullaniciduzenle&id=$ids",5);
										}
					
					}else{
						$sifre=md5($sifre);
								$kaydet		=mysql_query("update kullanici set kullaniciadi='$kullanici',
								adsoyad='$adsoyad',sifre='$sifre',tarih='$kayittarih',yetki='$yetki',sinif='$sinifi' where id='$ids'");
									if($kaydet){
										uyar("Kayıt düzenleme işlemi başarılı!");
										git("yonetici.php?sayfa=kullaniciduzenle&id=$ids",5);
									}else{
										uyar("HATA!! Kayıt düzenleme işlemi sırasında mysql hatası oluştu.!");
										git("yonetici.php?sayfa=kullaniciduzenle&id=$ids",5);
									
									}
							
					}

						
}

$kduzencek		=mysql_fetch_assoc(mysql_query("select * from kullanici where id='$ids'"));
?>
<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header blue-background'>
            <div class='title'>
                <div class='icon-user'></div>
                Kullanıcı düzenleme menüsü
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
                    <label class='control-label'>Resim</label>
                    <div class='controls'>
					<?php 
					$duzenresim	=str_replace("../","",$kduzencek["resim"]);
					?>
                     <a href="#" rel="nofollow" onClick=window.open("yonetici.php?sayfa=resimduzenle&id=<?php echo $ids;?>","","width=728,height=600,menubar=0,resizable=0,scrollbars=0,status=0,titlebar=0,toolbar=0")><img src="<?php echo $duzenresim;?>" style="width:150px;height:150px;"></a>
                    </div>
                </div>     
								
								<div class='control-group'>
                    <label class='control-label'>Yetki</label>
                    <div class='controls'>
                        <select class='span3' name="yetki">
						<option value="1" <?php if($kduzencek["yetki"]==1){ echo "selected";}?>>Yönetici</option>
                            <option value="2" <?php if($kduzencek["yetki"]==2){ echo "selected";}?>>Öğretmen</option>
                           <option value="3" <?php if($kduzencek["yetki"]==3){ echo "selected";}?>>Öğrenci</option>
                        </select>
                    </div>
                </div>
				
				<div class='control-group'>
                    <label class='control-label'>Adı Soyadı</label>
                    <div class='controls'>
                        <input class='input-block-level' name="adsoyad" placeholder='Adı Soyadı' type='text' value="<?php echo $kduzencek["adsoyad"];?>" />
                    </div>
                </div>								<div class='control-group'>                    <label class='control-label'>Sınıfı</label>                    <div class='controls'>                        <input class='input-block-level' name="sinif" placeholder='Sınıfını yazınız' type='text' value="<?php echo $kduzencek["sinif"];?>" />                    </div>                </div>
				 <div class='control-group'>
                    <label class='control-label'>Kullanıcı Adı</label>
                    <div class='controls'>
                        <input class='input-block-level' name="kullanici" placeholder='Kullanıcı adı' type='text' value="<?php echo $kduzencek["kullaniciadi"];?>" />
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
                        <input class='input-medium' name="kayittarih" data-format='MM/dd/yyyy HH:mm:ss' placeholder='Kayıt zamanı seçiniz' type='text' value="<?php echo $kduzencek["tarih"];?>"/>
            <span class='add-on'>
              <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
            </span>
                    </div>
                </div>
            </div>
				

				
				
				      <div class='form-actions' style='margin-bottom: 0;'>
						
                       <input class="btn btn-primary btn-large" type="submit" value="Düzenle">
                
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
