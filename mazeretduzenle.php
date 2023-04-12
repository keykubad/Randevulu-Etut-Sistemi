<section id='content'>

<div class='container-fluid'>

<div class='row-fluid' id='content-wrapper'>

<div class='span12'>

<div class='group-header'>

    <div class='row-fluid'>

        <div class='span6 offset3'>

            <div class='text-center'>

                <strong>Açıklama</strong>

                <small class='muted'>Bu bölümden katılamayacağınız randevuları tarafımıza bildirebilirsiniz.</small>

            </div>

        </div>

    </div>

</div>

<?php
$idsr		=$_GET["id"];
if($_POST){
		
		
		$kaydet		=mysql_query("update mazeretler set kabul='1' where mid='$idsr'");
			if($kaydet){
			$baglanonay	=mysql_query("update liste set yoklama='3' where tarih='$tarih' and ogrenci='$ogid' and saat='$saati'");
				uyar("Mazeret kabul edilip yoklamaya mazeretli olarak işlenmiştir.");
				git("yonetici.php?sayfa=mazeretliste",8);
			}else{
				uyar("Hata meydana geldi!!!");
				git("yonetici.php?sayfa=mazeretliste",4);
			
			}
}
?>

<div class='row-fluid'>

    <div class='span12 box'>

        <div class='box-header blue-background'>

            <div class='title'>

                <div class='icon-user'></div>

                Mazeret bildirme formu

            </div>

            <div class='actions'>

                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>

                </a>

                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>

                </a>

            </div>

        </div>
		
		<?php
		
		$maz	=mysql_fetch_assoc(mysql_query("select * from mazeretler where mid='$idsr'"));
			$m		=mysql_fetch_assoc(mysql_query("select * from kullanici where id='".$maz["ogrenciid"]."'"));
		
		?>
		

        <div class='box-content'>

            <form class="form form-horizontal" method="post" style="margin-bottom: 0;" /><div style="margin:0;padding:0;display:inline">

                                <div class='control-group'>

                    <label class='control-label'>Ad soyad</label>

                    <div class='controls'>

                        <select class='span3' name="ogrenci">

						<option value="<?php echo $m["id"];?>"><?php echo $m["adsoyad"];?></option>

                        </select>

                    </div>

                </div>
				
				        <div class='control-group'>

                 <label class='control-label' for='inputPassword4'>Etüt Tarihi</label>

                <div class='controls'>

                    <div class='datetimepicker input-append' id='datetimepicker'>

                        <input class='input-medium' name="tarih" data-format='dd/MM/yyyy' placeholder='Etüt tarihi' type='text' value="<?php echo $maz["tarih"];?>"/>

            <span class='add-on'>

              <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>

            </span>

                    </div>

                </div>

            </div>
                        <div class='control-group'>

                    <label class='control-label'>Saat</label>

                    <div class='controls'>

                        <select class='span3' name="saat">

						<option value="1" <?php if($maz["saat"]==1){echo "selected";}?>>1. saat</option>
						<option value="2" <?php if($maz["saat"]==2){echo "selected";}?>>2. saat</option>

                        </select>

                    </div>

                </div>
				


                <div class='control-group'>
                    <label class='control-label' for='inputTextArea1'>Mazeretiniz</label>
                    <div class='controls'>
                        <textarea id='inputTextArea1' placeholder='Mesajınız' rows='7' name="mesaj" style="width:700px;"><?php echo $maz["mesaj"];?></textarea>
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

