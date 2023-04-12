<?php
//etüt pazar günü saat 12:00 dan sonra açılacak koşul ile kontrol ediyoruz.
/*
date('w')

kullanırız. Fakat günlerin sayısı bir fark ile gelir bize.
 && ($saatal>0700)
 
 $bugunual		=date('w');
$saatal			=date('Hi');
Pazar = 0
Pazartesi =1
Salı = 2
Çarşamba = 3
Perşembe = 4
Cuma = 5
Cumartesi = 6
*/
$sistem		=mysql_fetch_assoc(mysql_query("select * from genelayarlar where id='1'"));
if($sistem["etutistek"]==1){
?>

<section id='content'>

<div class='container-fluid'>

<div class='row-fluid' id='content-wrapper'>

<div class='span12'>

<div class='group-header'>

    <div class='row-fluid'>

        <div class='span6 offset3'>

            <div class='text-center'>

                <strong>Açıklama</strong><br>

                <small class='muted'>Bu bölümden öğretmenlerinizden etüt isteğinde bulunabilirsiniz.</small>
				 <br><small class='muted'>Not: Aynı günde bir öğretmeninizden en fazla 1 etüt alabilirsiniz.</small>
				 <br>

            </div>

        </div>

    </div>

</div>

<?php
//sadece o hafta etüt alma kontrolü
$bugunnedir		=date("d-m-Y");
$sonrakihaftasi	=sonrakitarih("+6 days",$bugunnedir);

if($_POST){
		$ogrenci		=$_POST["ogrenci"];
		$ogretmen		=$_POST["ogretmen"];
		$tarih			=cevir($_POST["tarih"]);
		$konu			=$_POST["konu"];
		$icerik			=$_POST["icerik"];
		$saati			=$_POST["saat"];
		$simdi			=date("Y-m-d");
		$gelentarih		=cevir($tarih);
		$sonra			=sonrakitarih("+7 days",$tarih);
		$birhaftaonce	=sonrakitarih("-7 days",$tarih);
		$ucayonce		=sonrakitarih("-3 months",$tarih);//ceza
		if(($ogrenci=="") || ($ogretmen=="") || ($tarih=="") || ($konu=="") || ($icerik=="") || ($icerik=="")){
				uyar("Lütfen BOŞ Alan Bırakmayınız..!!!");
		}else{
				$bugunbak				=mysql_query("select * from liste where tarih='$tarih' and ogrenci='$ogrenci' and ogretmen='$ogretmen'");
				$bugunkactane			=mysql_query("select * from liste where tarih='$tarih' and ogretmen='$ogretmen'");
				$saatkac				=mysql_fetch_assoc(mysql_query("select * from liste where tarih='$tarih' and saat='$saati' and ogretmen='$ogretmen'"));
				$bugunogrencikactane	=mysql_query("select * from liste where tarih='$tarih' and ogrenci='$ogrenci'");
				$haftabak		=mysql_query("select * from liste where tarih>='$tarih' and tarih<='$sonra' and ogrenci='$ogrenci' and ogretmen='$ogretmen'");
				$haftaonce		=mysql_query("select * from liste where tarih>='$birhaftaonce' and tarih<='$tarih' and ogrenci='$ogrenci' and ogretmen='$ogretmen'");
				$aylikonce		=mysql_query("select * from liste where tarih>='$ucayonce' and tarih<='$tarih' and ogrenci='$ogrenci' and yoklama='2'");
				$bak			=mysql_num_rows($bugunbak);
				$bakkactane		=mysql_num_rows($bugunkactane);
				$bakhafta		=mysql_num_rows($haftabak);
				$haftaoncesi	=mysql_num_rows($haftaonce);
				$ucaybak		=mysql_num_rows($aylikonce);
				$ogrencikacetut	=mysql_num_rows($bugunogrencikactane);
				$haftakontrol	=tarihara($bugunnedir,$sonrakihaftasi,$gelentarih);
				//unixzaman damgasına cevirip cumartesi ve pazar kontrolü
				$unixlitarih	=cevir($tarih);
				$bakzamana	=unixzaman($unixlitarih);
				$al			=getdate($bakzamana);
				$unixzaman	=$al["wday"];
				//kontroller hem burada hem yukarıda hafta ve gün olarak
					$izinler			=mysql_query("select * from izinler where izogretmenid='$ogretmen'");
						while($d=mysql_fetch_assoc($izinler)){
								$baslangic	=cevir($d["bastarih"]);
								$bitis		=cevir($d["sontarih"]);
								
								$kontrolcu		=tarihara($baslangic,$bitis,$gelentarih);
								
									if($kontrolcu==1){
									uyar("Öğretmeniniz $baslangic ve  $bitis tarihleri arasında izinlidir.Lütfen başka bir gün seçiniz.");
									git("ogrenci.php?sayfa=etutistek",8);
									exit();
									}
						}
					//İsteklerin durum kontrolleri
					if($bak==1){
						uyar ("Öğretmeninizden aynı gün içerisinde sadece bir kez etüt alabilirsiniz.");
						git("ogrenci.php?sayfa=etutistek",8);
					}elseif(($unixzaman==6) or ($unixzaman==0)){
						uyar ("Cumartesi ve Pazar günleri öğretmenleriniz izinli olduğu için etüt alamazsınız");
						git("ogrenci.php?sayfa=etutistek",8);
					}elseif($ogrencikacetut==2){
						uyar ("".cevir($tarih)." tarihine ait etüt haklarınız dolmuştur..");
						git("ogrenci.php?sayfa=etutistek",8);
					}elseif($bakkactane==2){
						uyar ("Öğretmeninizin ".cevir($tarih)." ait tüm saatleri dolu.");
						git("ogrenci.php?sayfa=etutistek",8);
					}elseif($saatkac["saat"]==$saati){
						uyar ("Öğretmeninizin ".cevir($tarih)." ait ".$saati." saati dolu.Lütfen başka saat seçiniz.");
						git("ogrenci.php?sayfa=etutistek",8);
					}elseif($haftakontrol!=1){
						uyar ("Etüt istekleri sadece haftalık yapılabilir.Sonraki hafta istekleri bir sonraki hafta içerisinde alınır.");
						git("ogrenci.php?sayfa=etutistek",10);
					}elseif($bakhafta>=2){
						uyar ("Öğretmeninizden aynı hafta içerisinde sadece iki kez etüt alabilirsiniz.");
						git("ogrenci.php?sayfa=etutistek",8);
					
					}elseif($haftaoncesi>=2){
						uyar ("Öğretmeninizden aynı hafta içerisinde sadece iki kez etüt alabilirsiniz.");
						git("ogrenci.php?sayfa=etutistek",8);
					
					}elseif($ucaybak>=2){
						//bir ay geçmişmi bak
						$birayabak		=mysql_fetch_assoc(mysql_query("select * from liste where ogrenci='$ogrenci' and yoklama='2' order by tarih desc LIMIT 1"));
						$birayavar		=mysql_query("select * from liste where tarih>='$tarih' and tarih<='".$birayabak["tarih"]."' and ogrenci='$ogrenci'");
						$biraysure		=sonrakitarih("+1 months",$birayabak["tarih"]);


						$ilktarihstr=strtotime($birayabak["tarih"]);//ilk tarihi strtotime ile çeviriyom

						$sontarihstr=strtotime($tarih);//ilk tarihi strtotime ile çeviriyom

						$fark=($sontarihstr-$ilktarihstr)/86400;//sondan ilki çıkarıp 86400 e bölüyoz bu bize günü verecek
						
						
						if($fark>30){

								$kaydet		=mysql_query("insert into liste (ogrenci,tarih,konusu,icerigi,onayi,istekmi,ogretmen,saat) 
						values('$ogrenci','$tarih','$konu','$icerik',0,1,'$ogretmen','$saati')");
							if($kaydet){
								uyar("Etüt isteğiniz tarafımıza ulaştı.İsteğiniz onay aşamasında oldugundan onaylandıktan sonra yapılacak etütlerinize eklenecektir.");
								git("ogrenci.php?sayfa=etutistek",10);
							}else{
								uyar("Hata meydana geldi lütfen tarafımıza bildiriniz.");
								git("ogrenci.php?sayfa=etutistek",4);
							
							
						}
						}else{
						uyar ("Son üç ay içerisinde iki kez aldığınız etüte katılmadığınız için 1 ay boyunca etüt alamazsınız..");
						git("ogrenci.php?sayfa=etutistek",10);
						}
				
					}else{
						$kaydet		=mysql_query("insert into liste (ogrenci,tarih,konusu,icerigi,onayi,istekmi,ogretmen,saat) 
						values('$ogrenci','$tarih','$konu','$icerik',0,1,'$ogretmen','$saati')");
							if($kaydet){
								uyar(" Etüt isteğiniz tarafımıza ulaştı.İsteğiniz onay aşamasında oldugundan onaylandıktan sonra yapılacak etütlerinize eklenecektir.");
								git("ogrenci.php?sayfa=etutistek",10);
							}else{
								uyar("Hata meydana geldi lütfen tarafımıza bildiriniz.");
								git("ogrenci.php?sayfa=etutistek",4);
							
							}
					}
					
			}
}
?>

<div class='row-fluid'>

    <div class='span12 box'>

        <div class='box-header blue-background'>

            <div class='title'>

                <div class='icon-user'></div>

                Etüt istek formu

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

                    <label class='control-label'>Öğretmen-Branş</label>

                    <div class='controls'>

                        <select class='span3' name="ogretmen">
						<?php
							$ogretkim	=mysql_query("select * from kullanici where yetki='2'");
								while($f=mysql_fetch_assoc($ogretkim)){
									$idi		=$f["id"];
									$adi		=$f["adsoyad"];
							$bransla	=mysql_fetch_assoc(mysql_query("select * from branslar where idogretmen='$idi'"));
						
						?>
						<option value="<?php echo $idi;?>"><?php echo $adi;?> - <?php echo $bransla["bransi"];?></option>
						<?php
						}


						?>
                        </select>

                    </div>

                </div>
				
					   <div class='control-group'>

                    <label class='control-label'>Ders saati</label>

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

                        <input class='input-medium' name="tarih" data-format='dd-MM-yyyy' placeholder='Etüt tarihi' type='text' />

            <span class='add-on'>

              <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>

            </span>

                    </div>

                </div>

            </div>
    
				 <div class='control-group'>
                    <label class='control-label'>Etüt Konusu</label>
                    <div class='controls'>
                        <input class='input-large' style="width:700px;" name="konu" placeholder='Almak istediğiniz etüt ile ilgili konuyu yazınız' type='text' />
					
                    </div>
					
                </div>


                <div class='control-group'>
                    <label class='control-label' for='inputTextArea1'>Etüt ile ilgili içerik yazınız</label>
                    <div class='controls'>
                        <textarea id='inputTextArea1' placeholder='Etüt içeriği hakkında bilgi yazınız' rows='7' name="icerik" style="width:700px;"></textarea>
                    </div>
                </div>
				

				

				      <div class='form-actions' style='margin-bottom: 0;'>

						

                       <input class="btn btn-primary btn-large" type="submit" value="İstek yap">

                

                </div>

            </form>

        </div>

    </div>

</div>

</div>

</div>

</div>

</section>
<?php
}else{
?>
<section id='content'>

<div class='container-fluid'>

<div class='row-fluid' id='content-wrapper'>
<br>

<?php
uyar("<center><b>ETÜT İSTEKLERİ ŞUAN YÖNETİM TARAFINDAN KAPATILMIŞTIR!!</b></center>");
}
?>
</div>

</div>

</section>