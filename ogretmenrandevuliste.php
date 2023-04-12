<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden yapılmamış ve onaylanmamış kayıtlı etütlerinizi görebilirsiniz ..</small>
            </div>
        </div>
    </div>
</div>

<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>
    <div class='title'>Randevu listesi menüsü</div>
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
        Tarih
    </th>
    <th>
        Öğretmen
    </th>
    <th>
        Kapasite
    </th>
	 <th>
        Katılım Sayısı
    </th>
	<th>
        Durum
    </th>
		<th>
    </th>
  
</tr>
</thead>
<tbody>
<?php
		$cek	=mysql_query("select * from randevular where ogretmen='".$kim["id"]."' and yap='0' order by tarih desc");
			while($c=mysql_fetch_assoc($cek)){
				$tarih		=$c["tarih"];
				$ogretmen	=$c["ogretmen"];
				$rid		=$c["rid"];
				$limit		=$c["limiti"];
				$katilim	=$c["katilim"];
				$durum		=$c["onay"];
				$yap		=$c["yap"];
?>
<tr>
   
    <td><?php echo cevir($tarih);?></td>
	<?php
	$adcek	=mysql_fetch_assoc(mysql_query("select * from kullanici where yetki='2' and id='$ogretmen'"));
	
	?>
	<td><?php echo $adcek["adsoyad"];?></td>
    <td>
       <?php echo $limit;?>
    </td>
	  <td>
      <?php echo $katilim;?>
    </td>
   <td>
   <?php if($durum==1){echo "Etüt onaylı";}else{echo "Etüt henüz onaylanmamış";}?>
       
    </td>
	<td>
     <div class='text-right'>
	
		 <a class='btn btn-success btn-medium' href='ogretmen.php?sayfa=ogretmenetutyap&id=<?php echo $rid;?>'>
                <i class='icon-ok'>Yapıldı</i>
            </a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php if($durum==0){?>
		 <a class='btn btn-success btn-medium' href='ogretmen.php?sayfa=ogretmenetutonay&id=<?php echo $rid;?>'>
                <i class='icon-ok'>Onaylandı</i>
            </a>
	<?php }?>
     
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
