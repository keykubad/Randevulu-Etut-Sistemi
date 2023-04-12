<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden kayıtlı ödevlerinizin yoklamasını alabilirsiniz..</small>
            </div>
        </div>
    </div>
</div>

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
<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
<thead>
<tr>
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
	<th>
        Sınıf
    </th>
    <th></th>
</tr>
</thead>
<tbody>
<?php
		$cek	=mysql_query("select * from odevler where ogretmeni='".$kim["id"]."' order by odevid desc");
			while($c=mysql_fetch_assoc($cek)){
				$vtarih		=$c["verilistarih"];
				$ogretmen	=$c["ogretmeni"];
				$odevid		=$c["odevid"];
				$ttarih		=$c["teslimtarih"];
				$odevkonu	=$c["odevkonu"];
				$sinif		=$c["sinif"];
?>
<tr>
   
    <td><?php echo $odevkonu;?></td>
	<?php
	$adcek	=mysql_fetch_assoc(mysql_query("select * from kullanici where yetki='2' and id='$ogretmen'"));
	
	?>
	<td><?php echo cevir($vtarih);?></td>
    <td>
       <?php echo cevir($ttarih);?>
    </td>
	  <td>
      <?php echo $adcek["adsoyad"];?>
    </td>
   <td>
   <?php echo $sinif;?>
       
    </td>
	
    <td>
        <div class='text-right'>
<?php
		$odevvarmi		=mysql_query("select * from odevkontrol where odevid='$odevid'");
		$bak		=mysql_num_rows($odevvarmi);
			if($bak>0){
?>
<center>
			<span class="btn btn-primary btn-small">Ödev daha önce kontrol edilmiş</span>
			</center>
			<?php
			}else{
			?>	  

			<center><a href="ogretmen.php?sayfa=ogretmenodevyoklamaal&id=<?php echo $odevid;?>&sinif=<?php echo $sinif;?>" class="btn btn-primary btn-small">Kontrol Et</a></center>
<?php
}

?>
      
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
