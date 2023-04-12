<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden sisteminize kayıtlı randevuları düzenleyebilirsiniz..</small>
            </div>
        </div>
    </div>
</div>

<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>
    <div class='title'>Randevu listesi düzenleme menüsü</div>
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
<table class='data-table table table-bordered table-striped' id='example' style='margin-bottom:0;'>
<thead>
<tr>
    <th>
        Tarih
    </th>
    <th>
        Öğretmen
    </th>
	   <th>
       Sınıf
    </th>
			<th>
        Saat
    </th>
    <th>
        Kapasite
    </th>

	<th>
        Durum
    </th>
		<th>
        Yapıldımı?
    </th>
	
    <th>İşlemler</th>
</tr>
</thead>
<tbody>
<?php
		$cek	=mysql_query("select * from randevular order by tarih desc");
			while($c=mysql_fetch_assoc($cek)){
				$tarih		=$c["tarih"];
				$ogretmen	=$c["ogretmen"];
				$rid		=$c["rid"];
				$limit		=$c["limiti"];
				$katilim	=$c["katilim"];
				$durum		=$c["onay"];
				$yap		=$c["yap"];
				$sinifc		=$c["sinif"];
				$saatim		=$c["saat"];
?>
<tr>
   
    <td><?php echo cevir($tarih);?></td>
	<?php
	$adcek	=mysql_fetch_assoc(mysql_query("select * from kullanici where yetki='2' and id='$ogretmen'"));
	
	?>
	<td><?php echo $adcek["adsoyad"];?></td>
	<td><?php echo $sinifc;?></td>
	<td><?php echo $saatim.". saat";?></td>
    <td>
       <?php echo $limit;?>
    </td>

   <td>
   <?php if($durum==1){echo "Etüt onaylı";}else{echo "Etüt henüz onaylanmamış";}?>
       
    </td>
	   <td>
   <?php if($yap==1){echo "Yapıldı";}else{echo "Yapılmadı";}?>
       
    </td>
	
    <td>
        <div class='text-right'>
		<?php 
			if($yap==0){
		?>
		 <a class='btn btn-success btn-medium' href='yonetici.php?sayfa=randevuyap&id=<?php echo $rid;?>'>
                <i class='icon-ok'>Yapıldı</i>
            </a>
		<?php }else{ }?>
            <a class='btn btn-success btn-medium' href='yonetici.php?sayfa=randevuduzenle&id=<?php echo $rid;?>'>
                <i class='icon-edit'></i>
            </a>
			  <a class='btn btn-success btn-medium' href='yonetici.php?sayfa=randevukatilma&id=<?php echo $rid;?>&sinif=<?php echo $sinifc;?>&tarih=<?php echo $tarih;?>'>
                Katılacakları Belirle
            </a>
            <a class='btn btn-danger btn-medium' href='yonetici.php?sayfa=randevusil&id=<?php echo $rid;?>'>
                <i class='icon-remove'></i>
            </a>
        </div>
    </td>
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
