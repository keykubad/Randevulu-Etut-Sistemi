<section id='content'>

<div class='container-fluid'>

<div class='row-fluid' id='content-wrapper'>

<div class='span12'>

<div class='group-header'>

    <div class='row-fluid'>

        <div class='span6 offset3'>

            <div class='text-center'>

                <strong>Açıklama</strong>

                <small class='muted'>Bu bölümden öğrenci mesajlarını okuyabilirsiniz.</small>

            </div>

        </div>

    </div>

</div>

<?php
	$mid	=$_GET["id"];
	$mesaj	=mysql_fetch_assoc(mysql_query("select * from mesajlar where mid='$mid'"));
	$kimbu	=mysql_fetch_assoc(mysql_query("select * from kullanici where id='".$mesaj["ogrencikim"]."'"));
	$mesajokundu	=mysql_query("update mesajlar set yoneticioku='1' where mid='$mid'");
		if($mesajokundu){
			uyar("Mesaj okunmuş mesajlara eklendi");
		}else{
			uyar("HATA!! Bilinmeyen bir hata oluştu!");
		}
?>

<div class='row-fluid'>

    <div class='span12 box'>

        <div class='box-header blue-background'>

            <div class='title'>

                <div class='icon-user'></div>

                Mesajlaşma Formu

            </div>

            <div class='actions'>

                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>

                </a>

                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>

                </a>

            </div>

        </div>
		
		<?php
			$m		=mysql_fetch_assoc(mysql_query("select * from kullanici where kullaniciadi='".$_SESSION["kul"]."'"));
		
		?>
		

        <div class='box-content'>

            <form class="form form-horizontal" method="post" style="margin-bottom: 0;" /><div style="margin:0;padding:0;display:inline">

                                <div class='control-group'>

                    <label class='control-label'>Ad soyad</label>

                    <div class='controls'>

                        <select class='span3' name="ogrenci">

						<option><?php echo $kimbu["adsoyad"];?></option>

                        </select>

                    </div>

                </div>
				  <div class='control-group'>

                    <label class='control-label'>Tarih</label>

                    <div class='controls'>

                        <select class='span3' name="tarih">

						<option><?php echo cevir($mesaj["tarih"]);?></option>

                        </select>

                    </div>

                </div>
				
		 <div class='control-group'>                   
				 <label class='control-label'>Konu</label>                    
				 <div class='controls'>                       
				 <input class='input-block-level' name="konu" value='<?php echo $mesaj["konu"];?>' type='text' />	
				 </div>				
				 </div>
          
				


                <div class='control-group'>
                    <label class='control-label' for='inputTextArea1'>Mesajınız</label>
                    <div class='controls'>
                        <textarea id='inputTextArea1' placeholder='Mesajınız' rows='7' name="mesaj" style="width:700px;"><?php echo $mesaj["mesaj"];?></textarea>
                    </div>
                </div>
				

				

				      <div class='form-actions' style='margin-bottom: 0;'>

						

                       <input class="btn btn-primary btn-large" type="submit" value="Gönder">

                

                </div>

            </form>

        </div>

    </div>

</div>

</div>

</div>

</div>

</section>

