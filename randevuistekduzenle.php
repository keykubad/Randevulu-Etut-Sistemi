<section id='content'>

<div class='container-fluid'>

<div class='row-fluid' id='content-wrapper'>

<div class='span12'>

<div class='group-header'>

    <div class='row-fluid'>

        <div class='span6 offset3'>

            <div class='text-center'>

                <strong>Açıklama</strong>

                <small class='muted'>Bu bölümden randevu isteklerini onaylayabilir,düzenleyebilir ve yapılıp yapılmadığını girebilirsiniz.</small>

            </div>

        </div>

    </div>

</div>

<?php
$idsr		=$_GET["id"];
if($_POST){
		$yapildimi	=$_POST["yapildimi"];
		$onayla		=$_POST["onayla"];
		$ogrenci	=$_POST["ogrenci"];
		$ogretmen	=$_POST["ogretmen"];
		$tarih		=$_POST["tarih"];
		$konu		=$_POST["konu"];
		$saati		=$_POST["saat"];
		$icerik		=$_POST["icerik"];
			if(($ogrenci=="") || ($ogretmen=="") || ($tarih=="") || ($konu=="") || ($icerik=="")){
						uyar("Lütfen BOŞ alan bırakmayınız..!!!!");
						git("yonetici.php?sayfa=randevuistekduzenle&id=$idsr",5);
			}else{
		$kaydet		=mysql_query("update liste set yapildimi='$yapildimi',onayi='$onayla',
ogrenci='$ogrenci',ogretmen='$ogretmen',tarih='$tarih',konusu='$konu',icerigi='$icerik',saat='$saati' where lid='$idsr'");
			if($kaydet){
				uyar("Randevu isteği için düzenleme işlemi yapılmıştır..");
				git("yonetici.php?sayfa=randevuistekyonetici",8);
			}else{
				uyar("Hata meydana geldi!!!");
				git("yonetici.php?sayfa=randevuistekyonetici",4);
			
			}
		}
}
?>

<div class='row-fluid'>

    <div class='span12 box'>

        <div class='box-header blue-background'>

            <div class='title'>

                <div class='icon-user'></div>

                Randevu istek düzenleme

            </div>

            <div class='actions'>

                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>

                </a>

                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>

                </a>

            </div>

        </div>
		
		<?php
		
		$li	=mysql_fetch_assoc(mysql_query("select * from liste where lid='$idsr'"));
			$m		=mysql_fetch_assoc(mysql_query("select * from kullanici where id='".$li["ogrenci"]."'"));
			$mog	=mysql_fetch_assoc(mysql_query("select * from kullanici where id='".$li["ogretmen"]."'"));
		
		?>
		

        <div class='box-content'>

            <form class="form form-horizontal" method="post" style="margin-bottom: 0;" /><div style="margin:0;padding:0;display:inline">
				
				<div class='control-group'>
                    <label class='control-label'>Yapılma durumu</label>
                    <div class='controls'>
                        <select class='span3' name="yapildimi">
						<option value="1">Yapıldı</option>
						<option value="0">Yapılmadı</option>
                        </select>
                    </div>
                </div>
				
				<div class='control-group'>
                    <label class='control-label'>Onay durumu</label>
                    <div class='controls'>
                        <select class='span3' name="onayla">
						<option value="1" selected>Onayla</option>
						<option value="0">Onaylama</option>
                        </select>
                    </div>
                </div>
                                <div class='control-group'>

                    <label class='control-label'>Öğrenci Ad soyad</label>

                    <div class='controls'>

                        <select class='span3' name="ogrenci">

						<option value="<?php echo $m["id"];?>"><?php echo $m["adsoyad"];?></option>

                        </select>

                    </div>

                </div>
				
		  <div class='control-group'>

                    <label class='control-label'>Öğretmen Ad soyad</label>

                    <div class='controls'>

                        <select class='span3' name="ogretmen">

						<option value="<?php echo $mog["id"];?>"><?php echo $mog["adsoyad"];?></option>

                        </select>

                    </div>

                </div>
				
						  <div class='control-group'>

                    <label class='control-label'>Ders Saati</label>

                    <div class='controls'>

                        <select class='span3' name="saat">

						<option value="1">1.saat</option>
						<option value="2">2.saat</option>
                        </select>

                    </div>

                </div>
				
				        <div class='control-group'>

                 <label class='control-label' for='inputPassword4'>Etüt Tarihi</label>

                <div class='controls'>

                    <div class='datetimepicker input-append' id='datetimepicker'>

                        <input class='input-medium' name="tarih" data-format='dd-MM-yyyy' placeholder='Etüt tarihi' type='text' value="<?php echo $li["tarih"];?>"/>

            <span class='add-on'>

              <i data-date-icon='icon-calendar'></i>

            </span>

                    </div>

                </div>

            </div>
			
			 <div class='control-group'>                   
				 <label class='control-label'>Etüt Konusu</label>                    
				 <div class='controls'>                       
				 <input class='input-block-level' name="konu" placeholder='Etüt Konusu' type='text' value='<?php echo $li["konusu"];?>' />	
				 </div>				
				 </div>
				 

				


                <div class='control-group'>
                    <label class='control-label' for='inputTextArea1'>Etüt İçeriği (istek)</label>
                    <div class='controls'>
                        <textarea id='inputTextArea1' rows='7' name="icerik" style="width:700px;"><?php echo $li["icerigi"];?></textarea>
                    </div>
                </div>
				

				

				      <div class='form-actions' style='margin-bottom: 0;'>

						

                       <input class="btn btn-primary btn-large" type="submit" value="Onayla">

                

                </div>

            </form>

        </div>

    </div>

</div>

</div>

</div>

</div>

</section>

