<section id='content'>

<div class='container-fluid'>

<div class='row-fluid' id='content-wrapper'>

<div class='span12'>

<div class='group-header'>

    <div class='row-fluid'>

        <div class='span6 offset3'>

            <div class='text-center'>

                <strong>Açıklama</strong>

                <small class='muted'>Bu bölümden idare'ye acil mesajlarınızı iletebilirsiniz.</small>

            </div>

        </div>

    </div>

</div>

<?php

if($_POST){
		$ogrenci		=$_POST["ogrenci"];
		$konu			=$_POST["konu"];
		$tarih			=date("Y-m-d");
		$mesaj			=$_POST["mesaj"];
		
		$kaydet		=mysql_query("insert into mazeretler (ogrenciid,tarih,saat,mesaj,kabul) values('$ogrenci','$tarih','$saat','$mesaj',0)");
			if($kaydet){
				uyar("Mazeretiniz tarafımıza iletildi.Uygun görüldüğünde mazeretli katılmadığınız etütlerinize eklenecektir.");
				git("ogrenci.php",8);
			}else{
				uyar("Hata meydana geldi lütfen tarafımıza bildiriniz.");
				git("ogrenci.php",4);
			
			}
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

						<option value="<?php echo $m["id"];?>"><?php echo $m["adsoyad"];?></option>

                        </select>

                    </div>

                </div>
				
		 <div class='control-group'>                   
				 <label class='control-label'>Konu</label>                    
				 <div class='controls'>                       
				 <input class='input-block-level' name="konu" type='text' />	
				 </div>				
				 </div>
          
				


                <div class='control-group'>
                    <label class='control-label' for='inputTextArea1'>Mesajınız</label>
                    <div class='controls'>
                        <textarea id='inputTextArea1' placeholder='Mesajınız' rows='7' name="mesaj" style="width:700px;"></textarea>
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

