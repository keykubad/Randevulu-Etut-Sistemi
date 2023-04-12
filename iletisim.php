<?php
session_start();

// Güvenlik kodu için rastgele 2 sayı üretiliyor
    $sayi1 = rand(1,9);
    $sayi2 = rand(1,9);

// Bu sayıların toplamı alınıyor
    $toplam_sayi = $sayi1+$sayi2;

// Toplam sayı güvenlik kodu olarak sessiona atanıyor
    $_SESSION['guvenlik_kodu'] = "$toplam_sayi";
	$genel	=mysql_fetch_array(mysql_query("select * from genel_ayar"));
	$adres	=$genel["site_adres"];
	$tel	=$genel["site_tel"];
	$mail	=$genel["site_mail"];
	$siteadi=$genel["site_adi"];
?>	
	<div class="wrapper">
		<div id="content" role="main">
			<!-- Heading ______________________________________-->
			<h1>İletişim</h1>
			
			<!-- Breadcrumbs ______________________________________-->
			<p itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" id="breadcrumbs"><a href="anasayfa.html" rel="home" itemprop="url"><span itemprop="title">Anasayfa</span></a> <i class="icon-chevron-right"></i> İletişim</p>
			<hr />
			
			<div id="map">
				<div id="map-content">
					<p class="center">Harita java dosyası .js bulunamadı..!</p>
				</div>
			</div><!-- END #map -->

			<!-- WYSIWYG Content ______________________________________-->
			<div class="p30">

				<h3>İletişim Bilgileri</h3>

				<p><?=$adres;?></p>

				<p><strong class="p15"><i class="icon-phone" title="Phone"></i> &nbsp;</strong>  <?=$tel;?><br />
					<strong class="p15"><i class="icon-envelope" title="Email"></i> &nbsp;</strong> <?=$mail;?><br />
					<strong class="p15"><i class="icon-desktop" title="Web"></i> &nbsp;</strong>  <?=$siteadi;?></p>
				
			</div><!-- END .p25 -->
		
			<div class="p70 right">

				<h3>İletişim Formu</h3>

				<mark id="message"></mark>

				<form method="post" action="gonderildi.html" name="contactform" id="contactform" autocomplete="on" />

					<fieldset>
						<div class="p50 input-block">
							<label for="name" accesskey="U"><strong>Adınız Soyadınız</strong> (gerekli)</label>
							<input name="adi" type="text" id="name" required="required" />
						</div>
						<div class="p50 input-block right">
							<label for="email" accesskey="E"><strong>Email</strong> (gerekli)</label>
							<input name="email" type="email" id="email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
						</div>
					</fieldset>

					<fieldset>
						<div class="input-block">
							<label for="subject" accesskey="S"><strong>Konu</strong></label>
							<input name="konu" type="text" id="subject" />
						</div>

						<div class="input-block">
							<label for="comments" accesskey="C"><strong>Mesajınız</strong> (gerekli)</label>
							<textarea name="mesaj" cols="40" rows="3" id="comments" spellcheck="true" required="required"></textarea>
						</div>
					</fieldset>

					<fieldset>
						<legend><strong>Guvenlik aşaması</strong></legend>

						
						 Güvenlik kodu: <?=$sayi1;?> + <?=$sayi2;?> = <input name="guvenlik_kodu" type="text" id="verify" size="6" required="required" style="width: 50px;" title="spam güvenliği" />

					</fieldset>

					<input type="submit" class="submit" id="submit" value="Gönder" />

				</form>

			</div><!-- END .p75 -->
			<!-- END of WYSIWYG content ______________________________________-->

		</div> <!-- END #content -->	  


		
	</div> <!-- END .wrapper -->