<?php
		$iod		=$_GET["id"];
		$sinifci	=trim($_GET["sinif"]);
		$tarihi		=trim($_GET["tarih"]);
?>
<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden sisteminize ait randevulara katılacakları belirleyebilirsiniz..</small>
            </div>
        </div>
    </div>
</div>
	<?php
		if($_POST){
		$katil				=$_POST["katil"];
		
			for ($a=0;$a<count($katil);$a++){
				$ogretmen				=$_POST["ogretmen"];
				$konu					=$_POST["konu"];
				$rtarih					=$_POST["rtarih"];
				$sinif					=$_POST["sinif"];
				$saatim					=$_POST["saat"];
				$kontrolvarmi =mysql_fetch_assoc(mysql_query("select * from liste where ogrenci='".$katil[$a]."' and tarih='".$rtarih[$a]."'"));
				//katılan varsa işlem yapma
				if($kontrolvarmi==""){
					$kaydetyok		=mysql_query("insert into liste (ogrenci,tarih,saat,ogretmen,konusu,sinif) 
					values ('$katil[$a]','$rtarih[$a]','$saatim[$a]','$ogretmen[$a]','$konu[$a]','$sinif[$a]')");
				}
			}
			
				if($kaydetyok){
					uyar("Randevu için seçilen öğrenciler başarıyla listeye alındı");
				}else{
					uyar("İŞLEM HATALI!!!");
				
				}
			
		}
	?>
<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>
    <div class='title'>Randevu katılım listesi</div>
    <div class='actions'>
        <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
        </a>
        <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
        </a>
    </div>
</div>
<div class='box-content box-no-padding'>
<div class='responsive-table'>
<div class='scrollable-area'>
<form class="form form-horizontal" method="post" style="margin-bottom: 0;" />
<table class='data-table table table-bordered table-striped table table-hover' style='margin-bottom:0;'>
<thead>
<tr>
    <th>
       Öğretmen adı soyadı
    </th>
    <th>
      Öğrenci adı soyadı
    </th>
    <th>
       Randevu tarihi
    </th>
	 <th>
       Konusu
    </th>

     <th class='only-checkbox'>
                            <input id='check-all' type='checkbox' />Hepsini seç
							
                        </th>
						
</tr>
</thead>
<tbody>
<?php

		$ogretmenid		=mysql_fetch_assoc(mysql_query("select * from randevular where rid='$iod'"));
		if($sinifci=="tum"){
		$cek	=mysql_query("select * from kullanici where yetki='3'");
		}else{
		$cek	=mysql_query("select * from kullanici where yetki='3' and sinif='$sinifci'");
		}
			while($c=mysql_fetch_assoc($cek)){
				$adsoyad	=$c["adsoyad"];
				$ogrencisi	=$c["id"];
				$sinifcek	=$c["sinif"];
			
				
?>


<tr>
   	<?php
	$p =mysql_fetch_assoc(mysql_query("select * from liste where ogrenci='$ogrencisi' and tarih='$tarihi'"));
	echo $p["ogrenci"];
	$ogrt	 =mysql_fetch_assoc(mysql_query("select * from kullanici where yetki='2' and id='".$ogretmenid['ogretmen']."'"));
	?>
    <td><?php echo $ogrt["adsoyad"];?></td>

	<td><?php echo $adsoyad;?></td>
    <td>
       <?php echo cevir($ogretmenid["tarih"]);?>
    </td>
<?php echo $ps;?>
   <td>
  <?php echo $ogretmenid["konu"];?>
       
    </td>
	
    <td>
        <center><div>
		<input type="hidden" name="ogretmen[]" value="<?php echo $ogrt["id"];?>">
		<input type="hidden" name="rtarih[]" value="<?php echo $ogretmenid["tarih"];?>">
		<input type="hidden" name="konu[]" value="<?php echo $ogretmenid["konu"];?>">
		<input type="hidden" name="sinif[]" value="<?php echo $sinifcek;?>">
		<input type="hidden" name="saat[]" value="<?php echo $ogretmenid["saat"];?>">
		<?php 
				$odevkontrol	=mysql_fetch_assoc(mysql_query("SELECT * FROM odevkontrol where odevid='".$odevcek["odevid"]."' and ogrenciid='$ogrencisi'"));
				
		?>
			
			<label class='only-checkbox'><input type="checkbox" name="katil[]" value="<?php echo $ogrencisi;?>" <?php if ($p["ogrenci"]!=""){ echo "checked";} ?> /> Katılsın</label> 
		   

      
        </div></center>
    </td>
</tr>
<?php  } ?>
</tbody>
</table>
<center><input type="submit" class='btn btn-primary' name="kayit" value="Seçili işlemi yap"></center>
</form>
</div>
</div>
</div>
</div>
</div>
<hr class='hr-double' />

</div>
</div>
</div>
</section>
</div>
</div>
</div>
</section>
