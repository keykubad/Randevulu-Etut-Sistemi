<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden öğrencilere ait detaylı rapor alabilirsiniz..</small>
            </div>
        </div>
    </div>
</div>

<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>
    <div class='title'>Öğrenci rapor menüsü</div>
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
        Öğrenci Adı Soyadı
    </th>
    <th>
       Katılmadığı Toplam Etüt
    </th>
	   <th>
       Yapılmayan Toplam Ödev
    </th>
	  <th>
       Sınıfı
    </th>
	    <th>
	İşlem
    </th>
    
</tr>
</thead>
<tbody>
<?php
		$cek	=mysql_query("select * from kullanici where yetki='3' order by adsoyad asc");
			while($c=mysql_fetch_assoc($cek)){
				$tarih		=$c["tarih"];
				$ogrenci	=$c["adsoyad"];
				$kim		=$c["id"];
				$osinif		=$c["sinif"];
				$toplamodev	=mysql_query("select * from odevkontrol where ogrenciid='$kim' and kontrol='2'");
				$sayodev	=mysql_num_rows($toplamodev);
				$toplametut	=mysql_query("select * from liste where ogrenci='$kim' and yoklama='2'");
				$sayetut	=mysql_num_rows($toplametut);
				
?>
<tr>
   

	<td><?php echo $ogrenci;?></td>

	<td><?php echo $sayetut;?></td>
		
	<td><?php echo $sayodev;?></td>

	<td><?php echo $osinif;?></td>
	
	<td> <center><a href="ogrenciraporyazdir.php?ogrenci=<?php echo $kim;?>" class="btn btn-primary btn-large">Detaylı Yazdır</a></center></td>
  
</tr>
<?php } ?>
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
