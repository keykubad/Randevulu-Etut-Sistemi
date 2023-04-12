<section id='content'>

<div class='container-fluid'>

<div class='row-fluid' id='content-wrapper'>

<div class='span12'>

<div class='group-header'>

    <div class='row-fluid'>

        <div class='span6 offset3'>

            <div class='text-center'>

                <strong>Açıklama</strong>

                <small class='muted'>Bu bölümden öğrencinize mesaj yazabilirsiniz.</small>

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
		
		$kaydet		=mysql_query("insert into mesajlar (ogrencikim,tarih,mesaj,konu,okunma,gonderilen,yoneticioku) 
		values('$ogrenci','$tarih','$mesaj','$konu',0,0,1)");
			if($kaydet){
				uyar("Mesajınız ogrenciye iletilmiştir..");
				git("yonetici.php?sayfa=yoneticimesaj",8);
			}else{
				uyar("Hata meydana geldi.");
				git("yonetici.php?sayfa=yoneticimesaj",4);
			
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
		
	
		

        <div class='box-content'>

            <form class="form form-horizontal" method="post" style="margin-bottom: 0;" /><div style="margin:0;padding:0;display:inline">

                                <div class='control-group'>

                    <label class='control-label'>Ad soyad</label>

                    <div class='controls'>

                        <select class='span3' name="ogrenci">
					<?php
					$m		=mysql_query("select * from kullanici where yetki='3'");
						while($ss=mysql_fetch_assoc($m)){
					?>
						<option value="<?php echo $ss["id"];?>"><?php echo $ss["kullaniciadi"];?> - <?php echo $ss["adsoyad"];?></option>
					<?php
					}
					?>
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

