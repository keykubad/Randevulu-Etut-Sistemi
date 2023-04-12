<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden onay bekleyen öğrenci randevu isteklerini görebilir,onaylayabilir ve düzenleyebilirsiniz..<br>Etüt tamamlandıktan sonra yapılıp yapılmama durumunu düzenle diyerek giriniz</small>
            </div>
        </div>
    </div>
</div>

<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>
    <div class='title'>Randevu istekleri listesi (Mesajların tamamını görmek için düzenle butonuna tıklamanız gerekmektedir.)</div>
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
	<form method="post" action="yonetici.php?sayfa=randevuistekok">
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
      Öğretmen
    </th>
	 <th>
        Konusu
    </th>
		 <th>
       Saat
    </th>
	<th>
        Durum
    </th>
	
		<th>
       Yapıldımı?
    </th>
	<th></th>
    <th><input id='check-all' type='checkbox' />Tümünü onayla</th>

</tr>
</thead>
<tbody>

<?php
		$cek	=mysql_query("select * from liste where istekmi='1' order by tarih desc");
			while($c=mysql_fetch_assoc($cek)){
				$tarih		=cevir($c["tarih"]);
				$ogrenci	=$c["ogrenci"];
				$rid		=$c["lid"];
				$konusu		=mb_substr($c["konusu"],0,20,'UTF-8');
				$ogretmen	=$c["ogretmen"];
				$durum		=$c["onayi"];
				$yapilma	=$c["yapildimi"];
				$saati		=$c["saat"];
?>
<tr>
   
    <td><?php echo $tarih;?></td>
	<?php
	$adcek	=mysql_fetch_assoc(mysql_query("select * from kullanici where yetki='3' and id='$ogrenci'"));
	$ogcek	=mysql_fetch_assoc(mysql_query("select * from kullanici where yetki='2' and id='$ogretmen'"));
	?>
	<td><?php echo $adcek["adsoyad"];?></td>
    <td>
       <?php echo $ogcek["adsoyad"];?>
    </td>
	  <td>
      <?php echo $konusu;?>
    </td>
	  <td>
      <?php echo $saati;?>
    </td>
   <td>
   <?php if($durum==1){echo "Onaylandı";}else{echo "Onaylanmadı";}?>
       
    </td>
	   <td>
   <?php if($yapilma==1){echo "Yapıldı";}else{echo "Yapılmadı";}?>
       
    </td>
	
    <td>
	
        <div class='text-right'>
		<?php
		if($durum==0){
		?>
		
		    <a class='btn btn-success btn-large' href='yonetici.php?sayfa=randevuistekok&id=<?php echo $rid;?>'>
                <i class='icon-ok'></i>
            </a>
		<?php
		}
		?>
            <a class='btn btn-success btn-large' href='yonetici.php?sayfa=randevuistekduzenle&id=<?php echo $rid;?>'>
                <i class='icon-edit'></i>
            </a>
            <a class='btn btn-danger btn-large' href='yonetici.php?sayfa=randevuisteksil&id=<?php echo $rid;?>'>
                <i class='icon-remove'></i>
            </a>
        </div>
    </td>

<input type="hidden" name="ad[]" value="<?php echo $adcek["id"];?>">
<td><label class='only-checkbox'><input type="checkbox" name="onayla[]" value="1"/> Onayla</label></td>

</tr>
<?php } ?>
</tbody>
</table>
	<center><input type="submit" class='btn btn-primary' value="Kaydet"></center>
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
