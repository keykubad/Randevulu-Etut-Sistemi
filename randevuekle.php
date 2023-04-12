<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden sisteminize etüt zamanları ekleyebilirsiniz.</small>
            </div>
        </div>
    </div>
</div>
<?php 
if($_POST){

	$ogretmenimiz	=$_POST["ogretmen"];
	$rtarih		=cevir($_POST["rtarih"]);
	$limit		=$_POST["limit"];
	$saat		=$_POST["saat"];
	$onay		=$_POST["onay"];		
	$konu		=$_POST["konu"];
	$sinifci 	=$_POST["sinif"];
			
					
			$izinler			=mysql_query("select * from izinler where izogretmenid='$ogretmenimiz'");
			
			while($d=mysql_fetch_assoc($izinler)){
			
					$baslangic	=cevir($d["bastarih"]);
					$bitis		=cevir($d["sontarih"]);
					$gelentarih	=cevir($rtarih);
					//kontrolcu fonksiyondan kontrol ediyor
					$kontrolcu		=tarihara($baslangic,$bitis,$gelentarih);
					if($kontrolcu==1){
								uyar("Öğretmen ".cevir($rtarih)." gününde izinli olduğundan etüt veremezsiniz.!");
								git("yonetici.php?sayfa=randevuekle",5);
								exit();
					}
				
			}
					$kontrol		=mysql_query("select * from randevular where ogretmen='$ogretmenimiz' and tarih='$rtarih'");
					$saatsay		=mysql_num_rows($kontrol);
					if(($ogretmenimiz=="") || ($rtarih=="") || ($limit=="") || ($saat=="") || ($konu=="")){
						uyar("Lütfen BOŞ alan bırakmayınız..!!!!");
						git("yonetici.php?sayfa=randevuekle",5);
					}elseif($saatsay>1){
							uyar("Öğretmenin $rtarih gününe ait 2 saati dolu lütfen başka öğretmen seçiniz!");
							git("yonetici.php?sayfa=randevuekle",5);
						}else{
							
							$kayit		=mysql_query("insert into randevular (ogretmen,tarih,limiti,saat,onay,konu,sinif) values
							('$ogretmenimiz','$rtarih','$limit','$saat','$onay','$konu','$sinifci')");
								if($kayit){
									uyar("Randevu başarıyla kayıt edildi");
										git("yonetici.php?sayfa=randevuekle",5);
								}else{
									uyar("Randevu kaydı sırasında hata oluştu!!");
									git("yonetici.php?sayfa=randevuekle",5);
								}
						
						}


						
}
?>
<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header blue-background'>
            <div class='title'>
                <div class='icon-user'></div>
                Randevu ekleme menüsü
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
                    <label class='control-label'>Öğretmen</label>
                    <div class='controls'>
                        <select class='span3' name="ogretmen">
						<?php
						
							
							$ogretmen		=mysql_query("select * from kullanici where yetki='2'");
								while($a=mysql_fetch_assoc($ogretmen)){
								$idsim	=$a["id"];
								$adsoyad=$a["adsoyad"];
								$bransal		=mysql_fetch_assoc(mysql_query("select * from branslar where idogretmen='$idsim'"));
						?>
						<option value="<?php echo $idsim;?>"><?php echo $adsoyad." - ".$bransal["bransi"];?></option>
						<?php   } ?>
                        </select>
                    </div>
                </div>
				 <div class='control-group'>                    <label class='control-label'>Etüt Konusu</label>                    <div class='controls'>                        <input class='input-block-level' name="konu" placeholder='Ders Konusu' type='text' />						                    </div>				</div>
	
				        <div class='control-group'>
                 <label class='control-label' for='inputPassword4'>Randevu tarihi</label>
                <div class='controls'>
                    <div class='datetimepicker input-append' id='datetimepicker'>
                        <input class='input-medium' name="rtarih" data-format='dd-MM-yyyy' placeholder='Randevu tarihi seçiniz' type='text' />
            <span class='add-on'>
              <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
            </span>
                    </div>
                </div>
            </div>
			    <div class='control-group'>
                    <label class='control-label'>Sınıf Seçiniz</label>
                    <div class='controls'>
                        <select class='span3' name="sinif">
						<option value="tum">Tümü</option>
						<?php 
								$kullanici		=mysql_query("SELECT DISTINCT sinif FROM kullanici where yetki='3'");
									while($al=mysql_fetch_assoc($kullanici)){
									$sinif	=$al["sinif"];
						?>
						<option value="<?php echo $sinif;?>" <?php if($sinif==$gelencek["sinif"]){ echo "selected";}?>><?php echo $sinif;?></option>
						<?php
						}
						?>
                        </select>
                    </div>
                </div>
					 <div class='control-group'>
                    <label class='control-label'>Kaç öğrenci katılabilsin?</label>
                    <div class='controls'>
                        <input class='input-block-level' name="limit" placeholder='Limit yazınız' type='text' />
						
                    </div>
				</div>
				
				  <div class='control-group'>
                    <label class='control-label'>Saat Seçiniz</label>
                    <div class='controls'>
                        <select class='span3' name="saat">
						<option value="1">1. saat</option>
						<option value="2">2. saat</option>
                        </select>
                    </div>
                </div>
				
				<div class='control-group'>
                    <label class='control-label'>Randevu aktif edilsinmi?</label>
                    <div class='controls'>
                        <select class='span3' name="onay">
						<option value="1">Evet</option>
						<option value="0">Hayır</option>
                        </select>
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