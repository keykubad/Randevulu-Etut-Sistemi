<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden kayıtlı şifrenizi değiştirebilirsiniz.</small>
            </div>
        </div>
    </div>
</div>
<?php 
if($_POST){

$eskisifre		=md5($_POST["eskisifre"]);
$sifre			=md5($_POST["sifre"]);

$kontroleski	=mysql_query("select * from kullanici where id='".$kim["id"]."' and sifre='$eskisifre'");
$bak			=mysql_num_rows($kontroleski);

		if($bak>0){

				if (($eskisifre=="") || ($sifre=="")){
					uyar("HATA!! Lütfen boş alan bırakmayınız!!");
					git("ogrenci.php?sayfa=ogretmensifredegis",5);
				}else{
									
									$kaydet		=mysql_query("update kullanici set sifre='$sifre' where id='".$kim["id"]."' ");
										if($kaydet){
											uyar("Şifre değiştirme işlemi başarılı!");
											git("ogrenci.php?sayfa=ogretmensifredegis",5);
										}else{
											uyar("HATA!! Şifre değiştirme işlemi sırasında mysql hatası oluştu.!");
											git("ogrenci.php?sayfa=ogretmensifredegis",5);
										}
					
				}
			
		}else{
			uyar("HATA!! Eski şifreniz yanlış.Lütfen tekrar deneyiniz.!");
			git("ogrenci.php?sayfa=ogretmensifredegis",5);
		}
}
?>
<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header blue-background'>
            <div class='title'>
                <div class='icon-user'></div>
                Kullanıcı Şifre Değiştirme Menüsü
            </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content'>
            <form class="form form-horizontal" method="post" style="margin-bottom: 0;" /><div style="margin:0;padding:0;display:inline">
      		<div class='control-group'>
                    <label class='control-label' for='inputPassword4'>Eski Şifrenizi Giriniz</label>
                    <div class='controls'>
                        <input class='input-block-level' id='inputPassword4' name="eskisifre" placeholder='Eski Şifre' type='password' />
                    </div>
                </div>
		<div class='control-group'>
                    <label class='control-label' for='inputPassword4'>Yeni Şifrenizi Yazınız</label>
                    <div class='controls'>
                        <input class='input-block-level' id='inputPassword4' name="sifre" placeholder='Şifre yazınız' type='password' />
                    </div>
                </div>

				      <div class='form-actions' style='margin-bottom: 0;'>
						
                       <input class="btn btn-primary btn-large" type="submit" value="Değiştir">
                
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
