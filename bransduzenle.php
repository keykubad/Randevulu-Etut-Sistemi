<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden sisteminize kayıtlı öğretmenlere ait branşları düzenleyebilirsiniz.</small>
            </div>
        </div>
    </div>
</div>
<?php 
$idsi		=$_GET["id"];

if($_POST){
$kim			=$_POST["ogretmen"];
$brans			=$_POST["brans"];
		
		

					$sisekle		=mysql_query("update branslar set bransi='$brans',idogretmen='$kim' where bid='$idsi'");
						if($sisekle){
							uyar("Öğretmene ait branş başarıyla güncellenmiştir.!");
							git("yonetici.php?sayfa=bransduzenle&id=$idsi",2);
						}else{
							uyar("HATA Branş güncellenemedi.!");
							git("yonetici.php?sayfa=bransduzenle&id=$idsi",2);
						}

}
$branscek		=mysql_fetch_assoc(mysql_query("select * from branslar where bid='$idsi'"));
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
						<option value="<?php echo $idi;?>" <?php if ($branscek["idogretmen"]==$idi){ echo "selected";}?>><?php echo $adi;?></option>
						<?php
								}
						?>
                        </select>
                    </div>
                </div>
				
				<div class='control-group'>
                    <label class='control-label'>Branşı yazınız</label>
                    <div class='controls'>
                        <input class='input-block-level' name="brans" type='text' value='<?php echo $branscek["bransi"];?>' />
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
