<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden öğrencilerinize sınıf ödevleri ekleyebilirsiniz.</small>
            </div>
        </div>
    </div>
</div>
<?php 
if($_POST){
	$sinif		=$_POST["sinif"];
	$ogrtmen	=$_POST["ogretmen"];
	$konu		=addslashes($_POST["konu"]);
	$icerik		=addslashes($_POST["icerik"]);
	$vtarih		=cevir($_POST["vtarih"]);
	$ttarih		=cevir($_POST["ttarih"]);
	if(($ogrtmen=="") || ($sinif=="") || ($konu=="") || ($icerik=="") || ($vtarih=="")){
						uyar("Lütfen BOŞ alan bırakmayınız..!!!!");
						
					}else{
		$odevle		=mysql_query("insert into odevler (sinif,ogretmeni,odevkonu,odevicerik,verilistarih,teslimtarih)
		values ('$sinif','$ogrtmen','$konu','$icerik','$vtarih','$ttarih')");
			if($odevle){
				uyar("Ödev başarıyla eklendi!");
				git("ogretmen.php?sayfa=ogretmenodevekle",3);
			
			}else{
				uyar("Ödev Eklenemedi!!!");
				git("ogretmen.php?sayfa=ogretmenodevekle",3);
			}
			}			
}
?>
<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header blue-background'>
            <div class='title'>
                <div class='icon-user'></div>
                Ödev ekleme menüsü
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
                    <label class='control-label'>Sınıf Seçiniz</label>
                    <div class='controls'>
                        <select class='span3' name="sinif">
						<?php 
								$kullanici		=mysql_query("SELECT DISTINCT sinif FROM kullanici where yetki='3'");
									while($al=mysql_fetch_assoc($kullanici)){
									$sinif	=$al["sinif"];
						?>
						<option value="<?php echo $sinif;?>"><?php echo $sinif;?></option>
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
						
							$ogretmen		=mysql_query("select * from kullanici where yetki='2' and id='".$kim["id"]."'");
								while($a=mysql_fetch_assoc($ogretmen)){
								$ids	=$a["id"];
								$adsoyad=$a["adsoyad"];
								$bransi		= mysql_fetch_assoc(mysql_query("select * from branslar where idogretmen='".$kim["id"]."'"));
						?>
						<option value="<?php echo $ids;?>"><?php echo $adsoyad." - ".$bransi["bransi"];?></option>
						<?php   } ?>
                        </select>
                    </div>
                </div>
				 <div class='control-group'>                   
				 <label class='control-label'>Ödev Konusu</label>                    
				 <div class='controls'>                       
				 <input class='input-block-level' name="konu" placeholder='Ödev Konusu' type='text' />	
				 </div>				
				 </div>
				 
				     <div class='control-group'>
                    <label class='control-label' for='inputTextArea'>Ödev Açıklama</label>
                    <div class='controls'>
                        <textarea class='input-block-level' id='inputTextArea' placeholder='Ödev içeriği' rows='6' name="icerik"></textarea>
                    </div>
                </div>
	
				        <div class='control-group'>
                 <label class='control-label' for='inputPassword4'>Veriliş tarihi</label>
                <div class='controls'>
                    <div class='datetimepicker input-append' id='datetimepicker'>
                        <input class='input-medium' name="vtarih" data-format='dd-MM-yyyy' placeholder='Veriliş tarihi seçiniz' type='text' />
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
                        <input class='input-medium' name="ttarih" data-format='dd-MM-yyyy' placeholder='Veriliş tarihi seçiniz' type='text' />
            <span class='add-on'>
              <i data-date-icon='icon-calendar'></i>
            </span>
                    </div>
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
