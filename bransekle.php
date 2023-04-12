<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden sisteminize kayıtlı öğretmenlere branş atayabilirsiniz.</small>
            </div>
        </div>
    </div>
</div>
<?php 
if($_POST){
$kim			=$_POST["ogretmen"];
$brans			=$_POST["brans"];
		
		
		$kontrol		=mysql_query("select * from branslar where idogretmen='$kim'");
				$et		=mysql_num_rows($kontrol);
		
					if($et==1){
						uyar("Seçtiğiniz öğretmene daha önce branş atanmıştır.!");
						git("yonetici.php?sayfa=bransekle",5);
					
					}elseif(($brans=="") || ($kim=="")){
						uyar("Lütfen Boş alan bırakmayınız.!");
						git("yonetici.php?sayfa=bransekle",5);
					
					}else{
					$sisekle		=mysql_query("insert into branslar (bransi,idogretmen) values ('$brans','$kim')");
						if($sisekle){
							uyar("Branş seçtiğiniz öğretmene atanmıştır.!");
							git("yonetici.php?sayfa=bransekle",5);
						}else{
							uyar("HATA Branş eklenemedi.!");
							git("yonetici.php?sayfa=bransekle",5);
						}
					}
}
?>
<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header blue-background'>
            <div class='title'>
                <div class='icon-user'></div>
                Branş ekleme menüsü
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
                    <label class='control-label'>Öğretmen Seçiniz</label>
                    <div class='controls'>
                        <select class='span3' name="ogretmen">
						<?php
							$ogretmenal	=mysql_query("select * from kullanici where yetki='2'");
								while($s=mysql_fetch_assoc($ogretmenal)){
									$adi		=$s["adsoyad"];
									$idi		=$s["id"];
						?>
						<option value="<?php echo $idi;?>"><?php echo $adi;?></option>
						<?php
								}
						?>
                        </select>
                    </div>
                </div>
				
				<div class='control-group'>
                    <label class='control-label'>Branşı yazınız</label>
                    <div class='controls'>
                        <input class='input-block-level' name="brans" placeholder='Branşını yazınız' type='text' />
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
