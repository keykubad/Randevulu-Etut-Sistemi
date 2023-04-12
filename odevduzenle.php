<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden öğrencilerinize sınıf ödevlerini düzenleyebilirsiniz.</small>
            </div>
        </div>
    </div>
</div>
<?php 
$ids	=$_GET["id"];
if($_POST){
	$sinif		=$_POST["sinif"];
	$ogrtmen	=$_POST["ogretmen"];
	$konu		=addslashes($_POST["konu"]);
	$icerik		=addslashes($_POST["icerik"]);
	$saycoz		=$_POST["cozumsayi"];
	$vtarih		=cevir($_POST["vtarih"]);
	$ttarih		=cevir($_POST["ttarih"]);
		if(($ogrtmen=="") || ($sinif=="") || ($konu=="") || ($icerik=="") || ($vtarih=="") || ($vtarih=="")){
						uyar("Lütfen BOŞ alan bırakmayınız..!!!!");
						git("yonetici.php?sayfa=randevuekle",5);
					}else{
		$odevle		=mysql_query("update odevler set sinif='$sinif',ogretmeni='$ogrtmen',odevkonu='$konu',
		odevicerik='$icerik',verilistarih='$vtarih',teslimtarih='$ttarih',sorucozum='$saycoz' where odevid='$ids'");
			if($odevle){
				uyar("Ödev başarıyla güncellendi!");
				git("yonetici.php?sayfa=odevduzen",3);
			
			}else{
				uyar("Ödev Düzenlenemedi!!!");
				git("yonetici.php?sayfa=odevduzen",3);
			}
				}		
}
?>
<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header blue-background'>
            <div class='title'>
                <div class='icon-user'></div>
                Ödev düzenleme menüsü
            </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
		<?php
		
			$gelencek		=mysql_fetch_assoc(mysql_query("select * from odevler where odevid='$ids'"));
		
		?>
        <div class='box-content'>
            <form class="form form-horizontal" method="post" style="margin-bottom: 0;" /><div style="margin:0;padding:0;display:inline">
                 <div class='control-group'>
                    <label class='control-label'>Sınıf Seçiniz</label>
                    <div class='controls'>
                        <select class='span3' name="sinif">
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
                    <label class='control-label'>Öğretmen</label>
                    <div class='controls'>
                        <select class='span3' name="ogretmen">
						<?php
							$ogretmen		=mysql_query("select * from kullanici where yetki='2'");
								while($a=mysql_fetch_assoc($ogretmen)){
								$ids	=$a["id"];
								$adsoyad=$a["adsoyad"];
						?>
						<option value="<?php echo $ids;?>" <?php if($ids==$gelencek["ogretmeni"]){ echo "selected";}?>><?php echo $adsoyad;?></option>
						<?php   } ?>
                        </select>
                    </div>
                </div>
				 <div class='control-group'>                   
				 <label class='control-label'>Ödev Konusu</label>                    
				 <div class='controls'>                       
				 <input class='input-block-level' name="konu" placeholder='Ödev Konusu' type='text' value="<?php echo $gelencek["odevkonu"];?>" />	
				 </div>				
				 </div>
				 
				     <div class='control-group'>
                    <label class='control-label' for='inputTextArea'>Ödev Açıklama</label>
                    <div class='controls'>
                        <textarea class='input-block-level' id='inputTextArea' placeholder='Ödev içeriği' rows='6' name="icerik"><?php echo stripslashes($gelencek["odevicerik"]);?></textarea>
                    </div>
                </div>
		 <div class='control-group'>                   
				 <label class='control-label'>Soru Çözüm Sayısı</label>                    
				 <div class='controls'>                       
				 <input class='input-block-level' name="cozumsayi" value='<?php echo $gelencek["sorumcozum"];?>' type='text' />	
				 </div>				
				 </div>
				        <div class='control-group'>
                 <label class='control-label' for='inputPassword4'>Veriliş tarihi</label>
                <div class='controls'>
                    <div class='datetimepicker input-append' id='datetimepicker'>
                        <input class='input-medium' name="vtarih" data-format='dd-MM-yyyy' placeholder='Veriliş tarihi seçiniz' type='text' value="<?php echo $gelencek["verilistarih"];?>" />
            <span class='add-on'>
              <i data-date-icon='icon-calendar'></i>
            </span>
                    </div>
                </div>
            </div>
			
			 <div class='control-group'>
                 <label class='control-label' for='inputPassword4'>Teslim tarihi</label>
                <div class='controls'>
                    <div class='datetimepicker input-append' id='datetimepicker'>
                        <input class='input-medium' name="ttarih" data-format='dd-MM-yyyy' placeholder='Veriliş tarihi seçiniz' type='text' value="<?php echo $gelencek["teslimtarih"];?>" />
            <span class='add-on'>
              <i data-date-icon='icon-calendar'></i>
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
