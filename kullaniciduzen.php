<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden sisteminize kayıtlı öğretmen veya öğrenci listesini düzenleyebilirsiniz..</small>
            </div>
        </div>
    </div>
</div>

<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>
    <div class='title'>Kullanıcı düzenleme menüsü</div>
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
        Sıra
    </th>
    <th>
        Adı Soyadı
    </th>
    <th>
        Kullanici
    </th>
    <th>
        Yetki
    </th>
    <th></th>
</tr>
</thead>
<tbody>
<?php
		$cek	=mysql_query("select * from kullanici order by id desc");
			while($c=mysql_fetch_assoc($cek)){
				$kadi	=$c["kullaniciadi"];
				$adsoy	=$c["adsoyad"];
				$id		=$c["id"];
				$yetki	=$c["yetki"];
?>
<tr>
   <td><?php echo $id;?></td>
    <td><?php echo $adsoy;?></td>
	<td><?php echo $kadi;?></td>
    <td>
        <span class='label label-important'><?php 
		if($yetki==1){
			echo "Yönetici";
		}elseif($yetki==2){
			echo "Öğretmen";
		}else{
			echo "Öğrenci";
		}
		?></span>
    </td>
    <td>
        <div class='text-right'>
            <a class='btn btn-success btn-mini' href='yonetici.php?sayfa=kullaniciduzenle&id=<?php echo $id;?>'>
                <i class='icon-edit'></i>
            </a>
            <a class='btn btn-danger btn-mini' href='yonetici.php?sayfa=kullanicisil&id=<?php echo $id;?>'>
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
