<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden onay bekleyen öğrenci mazeretlerini görebilir ve onaylayabilirsiniz..</small>
            </div>
        </div>
    </div>
</div>

<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>
    <div class='title'>Mazeret onay listesi (Mesajların tamamını görmek için düzenle butonuna tıklamanız gerekmektedir.)</div>
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
       Öğrenci
    </th>
    <th>
        Saat
    </th>
	 <th>
        Mesaj
    </th>
	<th>
        Durum
    </th>
    <th></th>
</tr>
</thead>
<tbody>
<?php
		$cek	=mysql_query("select * from mazeretler where kabul='0' order by tarih desc");
			while($c=mysql_fetch_assoc($cek)){
				$tarih		=$c["tarih"];
				$ogrenci	=$c["ogrenci"];
				$rid		=$c["mid"];
				$saat		=$c["saat"];
				$mesaj		=substr($c["mesaj"],0,150);
				$durum		=$c["kabul"];
?>
<tr>
   
    <td><?php echo $tarih;?></td>
	<?php
	$adcek	=mysql_fetch_assoc(mysql_query("select * from kullanici where yetki='3' and id='$ogrenci'"));
	
	?>
	<td><?php echo $adcek["adsoyad"];?></td>
    <td>
       <?php echo $saat;?>
    </td>
	  <td>
      <?php echo $mesaj;?>
    </td>
   <td>
   <?php if($durum==1){echo "Onaylandı";}else{echo "Onaylanmadı";}?>
       
    </td>
	
    <td>
	
        <div class='text-right'>
		    <a class='btn btn-success btn-mini' href='yonetici.php?sayfa=mazeretok&id=<?php echo $rid;?>'>
                <i class='icon-ok'></i>
            </a>
            <a class='btn btn-success btn-mini' href='yonetici.php?sayfa=mazeretduzenle&id=<?php echo $rid;?>'>
                <i class='icon-edit'></i>
            </a>
            <a class='btn btn-danger btn-mini' href='yonetici.php?sayfa=mazeretsil&id=<?php echo $rid;?>'>
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
