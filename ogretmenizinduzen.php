<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden öğretmenlerin izin günlerini görebilir ve düzenleyebilirsiniz..</small>
            </div>
        </div>
    </div>
</div>

<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>
    <div class='title'>Öğretmen izin günleri listesi</div>
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
      Öğretmen Adı Soyadı
    </th>
    <th>
       İzin Başlangıç Tarihi
    </th>
	  <th>
       İzin Bitiş Tarihi
    </th>
	  <th>
     
    </th>
    
</tr>
</thead>
<tbody>
<?php
		$cek	=mysql_query("select * from izinler ");
			while($c=mysql_fetch_assoc($cek)){
				$bastarih		=$c["bastarih"];
				$sontarih		=$c["sontarih"];
				$rid		=$c["izid"];
				$ogretmenad	=$c["izogretmenid"];
				$kimmis		=mysql_fetch_assoc(mysql_query("select * from kullanici where id='$ogretmenad'"));
				
				
?>
<tr>
   
    <td><?php echo $kimmis["adsoyad"];?></td>

	<td><?php echo cevir($bastarih);?></td>
	<td><?php echo cevir($sontarih);?></td>

	<td>        <div style='text-align:center;margin:auto;'>
            <a class='btn btn-success btn-medium' href='yonetici.php?sayfa=ogretmenizinduzenle&id=<?php echo $rid;?>'>
                <i class='icon-edit'></i>
            </a>
            <a class='btn btn-danger btn-medium' href='yonetici.php?sayfa=ogretmenizinsil&id=<?php echo $rid;?>'>
                <i class='icon-remove'></i>
            </a>
        </div></td>

	
  
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
