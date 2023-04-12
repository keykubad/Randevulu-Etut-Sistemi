<?php
$idgit=is_numeric($_GET["id"]);
include("ayar.php");
$c=mysql_fetch_array(mysql_query("select * from kullanici where id='$idgit'"));
$test=$_POST["test"];
			if($_POST){
				
				
					$resimf			=$_FILES["resim"]["tmp_name"];
					$resimadioyna	=rand(0,10000);
					$resimyuklenme	=$resimadioyna."_".$_FILES['resim']['name'];
					$resimboyut		=$_FILES['resim']['size'];
					$resimtipi		=$_FILES['resim']['type'];
					//resim kontrol
					if($resimboyut>1000000 || strpos($resimtipi,"php") || strpos($resimtipi,"exe") || strpos($resimtipi,"") || strpos($resimtipi,"pdf")){
						uyari("HATA!!","Yüklediğiniz resim 1MB dan büyük yada resim değil!");
						exit();
					}else{
					
						$yuklenenresim	 = "yuklenenler/kullanici/" .$resimyuklenme;
						copy($resimf,$yuklenenresim);
					
							

									$kategorikayit	=mysql_query("update kullanici set
									resim='$yuklenenresim' where id='$idgit' ");
										if($kategorikayit){
											echo "<center>Başarıyla kaydedildi!!</center>";
										
										}else{
											echo "<center>HATA resim yüklenemedi!!</center>";
										
										
										}
								
				
										
					}
			}

?>


 <form method="post" style="margin-bottom: 0;" enctype="multipart/form-data"/>
 
 <center><img src="<?php echo $c["resim"];?>" style="width:150px;height:150px;">
 				      <div class='form-actions' style='margin-bottom: 0;'>
					  <input class="btn btn-primary btn-large" type="hidden" name="test">
						<input title='Bilgisayarınızdan yüklenecek resimi seçiniz' type='file' name="resim" /><br>
                       <input class="btn btn-primary btn-large" type="submit" value="Ekle">
                
                </div></center>
            </form>