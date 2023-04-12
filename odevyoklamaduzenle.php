<?php
		$iod		=$_GET["id"];
		$sinifci	=trim($_GET["sinif"]);
		
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
                <small class='muted'>Bu bölümden sisteminize kayıtlı ödevlerin yoklamasını alabilirsiniz..</small>
            </div>
        </div>
    </div>
</div>
	<?php
		if($_POST){
		$kimci				=$_POST["ad"];
		$kontrolcu			=$_POST["kontrol"];
			for ($a=0;$a<count($kontrolcu);$a++){
				$odevidi			=$_POST["odevalid"];
		
		

			$kaydetyok		=mysql_query("update odevkontrol set kontrol='$kontrolcu[$a]' where kontrolid='$odevidi[$a]'");

			}
				if($kaydetyok){
					uyar("Ödev kontrolü başarıyla düzenlendi $kontolcu[$a] $odevidi[$a]");
				}else{
					uyar("İŞLEM HATALI!!!");
				
				}
			
		}
	?>
<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>
    <div class='title'>Ödev yoklama listesi</div>
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
       Öğrenci Adı Soyadı
    </th>
    <th>
      Ödev Konusu
    </th>
    <th>
       Veriliş Tarihi
    </th>
	 <th>
       Teslim Tarihi
    </th>
	<th>
        Öğretmen
    </th>

     <th class='only-checkbox'>
                            <input id='check-all' type='checkbox' />Tümünü yapıldı olarak işaretle
							
                        </th>
						
</tr>
</thead>
<tbody>
<?php

		
		$cek	=mysql_query("select * from kullanici where yetki='3' and sinif='$sinifci'");
			while($c=mysql_fetch_assoc($cek)){
				$adsoyad	=$c["adsoyad"];
				$ogrencisi	=$c["id"];
				
?>


<tr>
   
    <td><?php echo $adsoyad;?></td>
	<?php
	$odevcek =mysql_fetch_assoc(mysql_query("select * from odevler where odevid='$iod'"));
	$ogrt	 =mysql_fetch_assoc(mysql_query("select * from kullanici where yetki='2' and id='".$odevcek['ogretmeni']."'"));
	?>
	<td><?php echo $odevcek["odevkonu"];?></td>
    <td>
       <?php echo cevir($odevcek["verilistarih"]);?>
    </td>
	  <td>
      <?php echo cevir($odevcek["teslimtarih"]);?>
    </td>
   <td>
  <?php echo $ogrt["adsoyad"];?>
       
    </td>
	
    <td>
        <center><div>
		<input type="hidden" name="ad[]" value="<?php echo $ogrencisi;?>">
		<input type="hidden" name="ogretmen[]" value="<?php echo $ogrt["id"];?>">
		<input type="hidden" name="vtarih[]" value="<?php echo $odevcek["verilistarih"];?>">
		<input type="hidden" name="ttarih[]" value="<?php echo $odevcek["teslimtarih"];?>">
		<input type="hidden" name="sinif[]" value="<?php echo $sinifci;?>">
		<input type="hidden" name="konu[]" value="<?php echo $odevcek["odevkonu"];?>">
		<input type="hidden" name="odevid[]" value="<?php echo $odevcek["odevid"];?>">
		<?php 
				$odevkontrol	=mysql_fetch_assoc(mysql_query("SELECT * FROM odevkontrol where odevid='".$odevcek["odevid"]."' and ogrenciid='$ogrencisi'"));
				
		?>
			<input type="hidden" name="odevalid[]" value="<?php echo $odevkontrol["kontrolid"];?>">
			<label class='only-checkbox'><input type="checkbox" name="kontrol[]" value="1" <?php if($odevkontrol["kontrol"]==1){ echo "checked";}?>/> Yapıldı</label> 
			<label><input type="checkbox" name="kontrol[]" value="2" <?php if($odevkontrol["kontrol"]==2){ echo "checked";}?>/> Yapılmadı</label> 
			<label><input type="checkbox" name="kontrol[]" value="3" <?php if($odevkontrol["kontrol"]==3){ echo "checked";}?>/> Eksik</label> 	   

      
        </div></center>
    </td>
</tr>
<?php  } ?>
</tbody>
</table>
<center><input type="submit" class='btn btn-primary' name="kayit" value="Düzenle"></center>
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
