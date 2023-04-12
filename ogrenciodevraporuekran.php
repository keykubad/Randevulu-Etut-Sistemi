
<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden öğrenclerin ödev raporlarını inceleyebilirsiniz..</small>
            </div>
        </div>
    </div>
</div>

<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>
    <div class='title'>Öğrenci ödev raporları menüsü</div>
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
  Yapmadığı Toplam Ödev Sayısı
    </th>

    <th></th>
</tr>
</thead>
<tbody>
<?php

	$bast		=cevir($_POST["bas"]);
	$sont		=cevir($_POST["son"]);
	$adi		=$_POST["adi"];
	if($adi=="tum"){
	 //SELECT * FROM odevkontrol GROUP BY ogrenciid ORDER BY COUNT(ogrenciid) DESC LIMIT 10
		$cek	=mysql_query("select * from kullanici where yetki='3'");
		
			while($c=mysql_fetch_assoc($cek)){
				$adsoyad	=$c["adsoyad"];
				$idci		=$c["id"];
?>
<tr>
   
   <td><?php echo $adsoyad;?></td>

   <td>
   <?php
  // select count(*) as from odevkontrol where teslimt>'$bast' and teslimt<='$sont' and ogrenciid='$idci' and kontrol='2' group by ogrenciid order by ogrenciid desc
		$odeval		=mysql_query("select * from odevkontrol where teslimt>'$bast' and teslimt<='$sont' and ogrenciid='$idci' and kontrol='2' ");
		$sayodev	=mysql_num_rows($odeval);
echo $sayodev;;

   ?>
       
    </td>
	 
    <td>
        <div style='text-align:center;margin:auto;'>
            <a class='btn btn-success btn-large' href='ogrenciraporyazdir.php?ogrenci=<?php echo $idci;?>'>
                Detayları Yazdır
            </a>
       
        </div>
    </td>
</tr>
<?php
	}
 }else{
 	$bast		=cevir($_POST["bas"]);
	$sont		=cevir($_POST["son"]);
	$adi		=$_POST["adi"];
 
  //SELECT * FROM odevkontrol GROUP BY ogrenciid ORDER BY COUNT(ogrenciid) DESC LIMIT 10
		$ceki	=mysql_query("select distinct ogrenciid,ogretmenid from odevkontrol where teslimt>'$bast' and teslimt<='$sont' and kontrol='2' and ogretmenid='$adi' ");
		
			while($c=mysql_fetch_assoc($ceki)){
				
				$idci		=$c["ogrenciid"];
				$sayiste	=mysql_query("select * from odevkontrol where teslimt>'$bast' and teslimt<='$sont' and kontrol='2' and ogrenciid='$idci'"); 
					$sabak	=mysql_num_rows($sayiste);
				
				?>				
 <tr>

   <td><?php
  
		$cekadi		=mysql_query("select distinct adsoyad from kullanici where yetki='3' and id='$idci'");
		
			while($s=mysql_fetch_assoc($cekadi)){
			$adial		=$s["adsoyad"];
				echo $adial;
			}
   ?></td>

   <td>
		<?php
			echo $sabak;

		?>
       
    </td>
	 
    <td>
       <div style='text-align:center;margin:auto;'>
            <a class='btn btn-success btn-large' href='ogrenciraporyazdir.php?ogrenci=<?php echo $idci;?>'>
                Detayları Yazdır
            </a>
       
        </div>
    </td>
</tr>
 <?php
 }

 ?>
</tbody>
</table>

<?php
}//tumu gelirse burda biter

?>
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
