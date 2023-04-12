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
    <div class='title'>Mazeret onay listesi (Mesajları görmek için düzenle butonuna tıklamanız gerekmektedir.)</div>
    <div class='actions'>
        <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
        </a>
        <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
        </a>
    </div>
</div>
<div class='box-content box-no-padding'>
<div class='responsive-table'>
<center><a href="ogrencilisteyazdir.php" class="btn btn-primary btn-large">Yazdır</a></center>
<div class='scrollable-area'>
<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
<thead>
<tr>
    <th>
        Kayıt Tarih
    </th>
    <th>
       Öğrenci Adı Soyadı
    </th>
    
</tr>
</thead>
<tbody>
<?php
		$cek	=mysql_query("select * from kullanici where yetki='3' order by tarih desc");
			while($c=mysql_fetch_assoc($cek)){
				$tarih		=$c["tarih"];
				$ogrenci	=$c["adsoyad"];
				
?>
<tr>
   
    <td><?php echo $tarih;?></td>

	<td><?php echo $ogrenci;?></td>



	
  
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
