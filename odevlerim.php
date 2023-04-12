<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='page-header'>
    <h1 class='pull-left'>
        <i class='icon-dashboard'></i>
        <span>Randevu Sistemi</span>
    </h1>
    <div class='pull-right'>

    </div>
</div>

	<?php 
			$ogrencicek		=mysql_fetch_assoc(mysql_query("select * from kullanici where kullaniciadi='".$_SESSION['kul']."'"));
	?>

<div class='row-fluid' >
    <div class='span12 box box-transparent'>
<div class='row-fluid'style="margin-left:380px;text-align:center;">
            <div class='span2 box-quick-link blue-background' >
                <a href='ogrenci.php?sayfa=etutliste'>
                    <div class='header'>
                        <div class='icon-comments'></div>
                    </div>
                    <div class='content'>Etüt Listele</div>
                </a>
            </div>
			    <div class='span2 box-quick-link green-background'>
                <a href='ogrenci.php?sayfa=etutistek'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>Etüt İstekleri</div>
                </a>
            </div>
            <div class='span2 box-quick-link orange-background'>
                <a href='ogrenci.php?sayfa=odevlerim'>
                    <div class='header'>
                        <div class='icon-magic'></div>
                    </div>
                    <div class='content'>Ödevler</div>
                </a>
            </div>
         
            
        </div> 
    </div>
</div>
<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header blue-background'>
            <div class='title'>
                <div class='icon-user'></div>
                Randevu Listeleme Menüsü
            </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
		
 <div class='box-content'>
            <form class="form form-horizontal" method="post" style="margin-bottom: 0;" /><div style="margin:0;padding:0;display:inline">

	
                                <div class='control-group'>

                    <label class='control-label'>Ders Seçiniz</label>
					
                    <div class='controls'>

                        <select class='span3' name="brans">
						<option value="tum" selected>Tüm Ödevler</option>
						<?php
								$branssec	=mysql_query("select * from branslar");
									while($a=mysql_fetch_assoc($branssec)){
									$bransne	=$a["bransi"];
									$bid		=$a["idogretmen"];
						?>
						<option value="<?php echo $bid;?>"><?php echo $bransne;?></option>
						<?php
						}
						?>
                        </select>

                    </div>

                </div>

				
				
				      <div class='form-actions' style='margin-bottom: 0;'>
						
                       <input class="btn btn-primary btn-large" type="submit" value="Listele">
                
                </div>
            </form>
        </div>
    </div>
</div>
</div>
						<?php
							$ogrencisi		=$ogrencicek["id"];
							$yoklama1		=mysql_query("select * from odevkontrol where ogrenciid='$ogrencisi' and kontrol='1'");
							$yoklama2		=mysql_query("select * from odevkontrol where ogrenciid='$ogrencisi' and kontrol='2'");
							$yoklama3		=mysql_query("select * from odevkontrol where ogrenciid='$ogrencisi' and kontrol='3'");
							$say1			=mysql_num_rows($yoklama1);
							$say2			=mysql_num_rows($yoklama2);
							$say3			=mysql_num_rows($yoklama3);
						?>
           <?php uyar("<center><b>İSTATİSTİKLER</b><br>Yaptığınız ödev sayısı: <b>$say1</b> &nbsp;&nbsp;&nbsp;&nbsp; Yapmadığınız ödev sayısı: <b>$say2</b> &nbsp;&nbsp;&nbsp;&nbsp; Yetersiz görülen ödev sayısı: <b>$say3</b></center>");?>



</div>
<?php
if($_POST){
$bransci		=$_POST["brans"];
?>
<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>
    <div class='title'>Ödevleriniz</div>    
	<div class='actions'> 	
	<a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>        </a>       
	<a href="#" class="btn box-collapse btn-mini btn-link"><i></i>        </a>    </div></div>
	<div class='box-content box-no-padding'><div class='responsive-table'>
	<div class='scrollable-area'>


	<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
	<thead>
	<tr>
    <th>        Öğretmen adı soyadı - Branş   </th>   
	<th>        Ödev konusu   </th>   
	<th>        Veriliş tarihi    </th>		
	<th>        Teslim tarihi    </th>	
	<th>        Durumu    </th> 
	</tr>
	</thead><tbody>  
			<?php 
			if($bransci=="tum"){
			$odev	=mysql_query("select * from odevler where sinif='".$ogrencicek["sinif"]."' order by verilistarih desc");
				while($x=mysql_fetch_assoc($odev)){
					$ogretmeni	=$x["ogretmeni"];
					$konusu		=mb_substr($x["odevkonu"],0,20,'UTF-8');
					$vtarih		=cevir($x["verilistarih"]);
					$ttarih		=cevir($x["teslimtarih"]);
					$odevid		=$x["odevid"];
					$bransla	=mysql_fetch_assoc(mysql_query("select * from branslar where idogretmen='$ogretmeni'")); 
					$kim		=mysql_fetch_assoc(mysql_query("select * from kullanici where id='$ogretmeni'"));
					$kontrolu	=mysql_fetch_assoc(mysql_query("select * from odevkontrol where odevid='$odevid' order by verilist desc"));
		?>
<tr>    

		<td <?php if($kontrolu["kontrol"]==2){ echo "style='color:#FFF;background:#FF0000;'";}?>><?php echo $kim["adsoyad"]. "-" .$bransla["bransi"];?></td>
		<td <?php if($kontrolu["kontrol"]==2){ echo "style='color:#FFF;background:#FF0000;'";}?>><?php echo $konusu;?></td>    
		<td <?php if($kontrolu["kontrol"]==2){ echo "style='color:#FFF;background:#FF0000;'";}?>><?php echo $vtarih;?></td>
		<td <?php if($kontrolu["kontrol"]==2){ echo "style='color:#FFF;background:#FF0000;'";}?>><?php echo $ttarih;?></td>		
		<td <?php if($kontrolu["kontrol"]==2){ echo "style='color:#FFF;background:#FF0000;'";}?>>        
		<?php 
		if($kontrolu["kontrol"]==1){
			echo "Yapıldı";
		}elseif($kontrolu["kontrol"]==2){
			echo "Yapılmadı";
		}else{
			echo "Eksik yapıldı";
		}
		?>
		</td>
		
<?php 
}
}else{

$odev	=mysql_query("select * from odevler where ogretmeni='$bransci' order by verilistarih desc");
				while($x=mysql_fetch_assoc($odev)){
					$ogretmeni	=$x["ogretmeni"];
					$konusu		=mb_substr($x["odevkonu"],0,20,'UTF-8');
					$vtarih		=cevir($x["verilistarih"]);
					$ttarih		=cevir($x["teslimtarih"]);
					$odevid		=$x["odevid"];
					$bransla	=mysql_fetch_assoc(mysql_query("select * from branslar where idogretmen='$ogretmeni'")); 
					$kim		=mysql_fetch_assoc(mysql_query("select * from kullanici where id='$ogretmeni'"));
					$kontrolu	=mysql_fetch_assoc(mysql_query("select * from odevkontrol where odevid='$odevid' order by verilist desc"));
		?>
<tr>    

		<td <?php if($kontrolu["kontrol"]==2){ echo "style='color:#FFF;background:#FF0000;'";}?>><?php echo $kim["adsoyad"]. "-" .$bransla["bransi"];?></td>
		<td <?php if($kontrolu["kontrol"]==2){ echo "style='color:#FFF;background:#FF0000;'";}?>><?php echo $konusu;?></td>    
		<td <?php if($kontrolu["kontrol"]==2){ echo "style='color:#FFF;background:#FF0000;'";}?>><?php echo $vtarih;?></td>
		<td <?php if($kontrolu["kontrol"]==2){ echo "style='color:#FFF;background:#FF0000;'";}?>><?php echo $ttarih;?></td>		
		<td <?php if($kontrolu["kontrol"]==2){ echo "style='color:#FFF;background:#FF0000;'";}?>>        
		<?php 
		if($kontrolu["kontrol"]==1){
			echo "Yapıldı";
		}elseif($kontrolu["kontrol"]==2){
			echo "Yapılmadı";
		}else{
			echo "Eksik yapıldı";
		}
		?>
		</td>
</tr>
			<?php
			}

			?>


		</tbody></table>
	
	
		
		</div></div></div></div></div>
<?php 
}

}?>
</div>
</div>
</div>
</section>