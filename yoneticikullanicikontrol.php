<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden öğrencive öğretmenlerin kendi sayfalarına giriş yapabilirsiniz..</small>
            </div>
        </div>
    </div>
</div>

<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>
    <div class='title'>Öğrenci ve Öğretmen Kontrol Menüsü (Alt menüden giriş yap demeniz yeterlidir)</div>
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
<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
<thead>
<tr>
    <th>
        Ad Soyad
    </th>
    <th>
        Sınıf/Branş
    </th>
    <th>
        Kayıt Tarihi
    </th>
		<th>
    </th>
  
</tr>
</thead>
<tbody>
<?php
		$cek	=mysql_query("select * from kullanici ");
			while($c=mysql_fetch_assoc($cek)){
				$adsoyad		=$c["adsoyad"];
				$kullanicisi	=$c["kullaniciadi"];
				$id				=$c["id"];
				$sinif			=$c["sinif"];
				$kayit			=$c["tarih"];
				$sifre			=$c["sifre"];
				
				$bransi		=mysql_fetch_assoc(mysql_query("select * from branslar where idogretmen='$id'"));
?>
<tr>
   
    <td><?php echo $adsoyad;?></td>
	<td><?php if($sinif!=""){echo $sinif;}elseif($bransi["bransi"]!=""){echo $bransi["bransi"];}?></td>
	  <td>
      <?php echo $kayit;?>
    </td>

	<td>

     <center>
	 <form target="_blank" method="post" action="index.php">
			<input class='btn btn-success btn-medium' type='hidden' name="kullan" value="<?php echo $kullanicisi;?>">
			<input class='btn btn-success btn-medium' type='hidden' name="sifreyi" value="<?php echo $sifre;?>">
		 <input class='btn btn-success btn-medium' type='submit' value="Giriş" target="_blank">
         </form>
	
     
        </center>
		</td>

</tr>
<?php

} 

if($_POST){
		session_destroy();
}		


?>
</tbody>
</table>
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
