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
        <div class='box-header blue-background'>
            <div class='title'>
                <div class='icon-user'></div>
                Öğretmen izin düzenleme
            </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
	<?php
	$idss		=$_GET["id"];
		if($_POST){
		$bastarih		=cevir($_POST["bas"]);
		$sontarih		=cevir($_POST["son"]);
		$adi			=$_POST["adi"];
		
			if(($bastarih=="") || ($sontarih=="") || ($adi=="")){
				uyar("Lütfen BOŞ alan bırakmayınız!!!!.");
				git("yonetici.php?sayfa=ogretmenizinduzenle&id=$idss",5);
			}else{
			$izinver		=mysql_query("update izinler set izogretmenid='$adi',bastarih='$bastarih',sontarih='$sontarih' where izid='$idss'");
			if($izinver){
				uyar("Öğretmen izini başarıyla güncellenmiştir..");
				git("yonetici.php?sayfa=ogretmenizinduzenle&id=$idss",2);
			}else{
				uyar("!!!Öğretmen izni eklenememiştir.!!!");
				git("yonetici.php?sayfa=ogretmenizinduzenle&id=$idss",2);
			}
			}
		}
	?>
 <div class='box-content'>
            <form class="form form-horizontal" method="post" style="margin-bottom: 0;" /><div style="margin:0;padding:0;display:inline">

	<?php
			$izinbak		=mysql_fetch_assoc(mysql_query("select * from izinler where izid='$idss'"));
	?>
				        <div class='control-group'>
                 <label class='control-label' for='inputPassword4'>Tarihi</label>
                <div class='controls'>
                    <div class='datetimepicker input-append' id='datetimepicker'>
                        <input class='input-medium' name="bas" data-format='dd-MM-yyyy' placeholder='Başlangıç tarihi' type='text' value='<?php echo cevir($izinbak["bastarih"]);?>' />
            <span class='add-on'>
              <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
            </span>
                    </div>
						&nbsp;&nbsp;&nbsp;ile&nbsp;&nbsp;&nbsp;	 
                    <div class='datetimepicker input-append' id='datetimepicker'>
                        <input class='input-medium' name="son" data-format='dd-MM-yyyy' placeholder='Bitiş tarihi' type='text' value='<?php echo cevir($izinbak["sontarih"]);?>' />
            <span class='add-on'>
              <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
            </span>
               
                </div>&nbsp;&nbsp;&nbsp;tarihi arası öğretmen izinli olacaktır.
                </div>
		
			
            </div>

				 <div class='control-group'>
                    <label class='control-label'>Öğretmen</label>
                    <div class='controls'>
                        <select class='span3' name="adi">
							<?php
								$kullanicial	=mysql_query("select * from kullanici where yetki='2' and id='".$izinbak["izogretmenid"]."'");
									while($al=mysql_fetch_assoc($kullanicial)){
										$ogid	=$al["id"];
										$adi	=$al["adsoyad"];
								$bransal		=mysql_fetch_assoc(mysql_query("select * from branslar where idogretmen='$ogid'"));
					
					
							?>

						<option value="<?php echo $ogid;?>"><?php echo $bransal["bransi"]." - ". $adi;?></option>
                        <?php
						}
						?>
                        </select>
                    </div>
                </div>
				
	
				
				      <div class='form-actions' style='margin-bottom: 0;'>
						
                       <input class="btn btn-primary btn-large" type="submit" value="İzin düzenle">
                
                </div>
            </form>
        </div>
    </div>
</div>
</div>







  

</div>


</div>
</div>

</section>

