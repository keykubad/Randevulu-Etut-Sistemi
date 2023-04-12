<?php
/*

Randevuları iptal etmeyi kaldırdık kod burda
<?php
		if($onaylama==0){
		?>
			<!--<td>      
<a class='btn btn-danger btn-mini' href='ogrenci.php?sayfa=ogrencietutisteksil&id=<?php echo $no;?>'>
                <i class='icon-remove'></i>
            </a>
	</td>-->
		<?php
		}else{
		
		?>

*/
?>

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
                 <label class='control-label' for='inputPassword4'>Randevu tarihi</label>
                <div class='controls'>
                    <div class='datetimepicker input-append' id='datetimepicker'>
                        <input class='input-medium' name="rtarih" data-format='dd-MM-yyyy' placeholder='Randevu tarihi seçiniz' type='text' />
            <span class='add-on'>
              <i data-date-icon='icon-calendar'></i>
            </span>
                    </div>
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
							
							$yoklama1		=mysql_query("select * from liste where ogrenci='".$kim["id"]."' and yoklama='1'");
							$yoklama2		=mysql_query("select * from liste where ogrenci='".$kim["id"]."' and yoklama='2'");
							$yoklama3		=mysql_query("select * from liste where ogrenci='".$kim["id"]."' and yoklama='3'");
							$say1			=mysql_num_rows($yoklama1);
							$say2			=mysql_num_rows($yoklama2);
							$say3			=mysql_num_rows($yoklama3);
			?>
			<?php uyar("<center><b>İSTATİSTİKLER</b><br>Katıldığınız etüt sayısı: <b>$say1</b> &nbsp;&nbsp;&nbsp;&nbsp; Katılmadığınız etüt sayısı: <b>$say2</b></center>");?>

<?php 

if($_POST){
$rtarih		=cevir($_POST["rtarih"]);


?>
<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>
    <div class='title'><?php echo $rtarih;?> tarihine ait etüt listesi</div>    
	<div class='actions'>        
	<a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>        </a>       
	<a href="#" class="btn box-collapse btn-mini btn-link"><i></i>        </a>    </div></div>
	<div class='box-content box-no-padding'><div class='responsive-table'>
	<div class='scrollable-area'><table class='data-table table table-bordered table-striped' style='margin-bottom:0;'><thead><tr>
    <th>        Öğretmen    </th>   
	<th>        Saat    </th>   		
	<th>        Limit    </th>		
	<th>        Etüt Konusu    </th>		
 
	</tr>
	</thead><tbody>  
	<?php	
	$cektir		=mysql_query("SELECT * FROM randevular inner join kullanici on randevular.ogretmen=kullanici.id where randevular.tarih='$rtarih'");		
		while($q=mysql_fetch_array($cektir)){		
		$idsi		=$q["ogretmen"];	
		$saat		=$q["saat"];		
		$katilim	=$q["katilim"];	
		$sinifi		=$q["sinif"];			
		$limiti		=$q["limiti"];			
		$rid		=$q["rid"];		
		$konusu		=$q["konu"];
		$adsoyad		=$q["adsoyad"];
		?><tr>    
<td><?php echo $adsoyad;?></td>
		<td><?php echo $saat;?></td>    	    
		<td>        <?php echo $limiti;?>    </td> 
<td>        <?php echo $konusu;?>    </td>  		

		</tr>
		<?php } ?></tbody></table></div></div></div></div></div>
		<?php } ?>

<br>

<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>

    <div class='title'>Etütleriniz  </div>    
	<div class='actions'> 	
	<a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>        </a>       
	<a href="#" class="btn box-collapse btn-mini btn-link"><i></i>        </a>    </div></div>
	<div class='box-content box-no-padding'><div class='responsive-table'>
	<div class='scrollable-area'>


	<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
	<thead>
	<tr>
    <th>        Öğretmen adı soyadı - Branş   </th>   
	<th>        Etüt konusu   </th>   
	<th>        Etüt tarihi    </th>	
	<th>        Etüt saati    </th>		
	<th>        Durumu    </th> 
	<th>        İptal    </th>
	</tr>
	</thead><tbody>  
			<?php 
			$etut	=mysql_query("select * from liste where ogrenci='".$kim["id"]."' order by tarih desc");
				while($x=mysql_fetch_assoc($etut)){
					$ogretmeni	=$x["ogretmen"];
					$konusu		=mb_substr($x["konusu"],0,20,'UTF-8');
					$tarihi		=$x["tarih"];
					$saatii		=$x["saat"];
					$yoklama	=$x["yoklama"];
					$istekmi	=$x["istekmi"];
					$onaylama	=$x["onayi"];
					$no 		=$x["lid"];
					$kimki		=mysql_fetch_assoc(mysql_query("select * from kullanici where id='$ogretmeni'"));
					
					$bransbas	=mysql_fetch_assoc(mysql_query("select * from branslar where idogretmen='$ogretmeni'"));
				
		?>
<tr>    

		<td <?php if($yoklama==2){ echo "style='color:#FFF;background:#FF0000;'";}?>><?php echo $kimki["adsoyad"]." - ".$bransbas["bransi"];?></td>
		<td <?php if($yoklama==2){ echo "style='color:#FFF;background:#FF0000;'";}?>><?php echo $konusu;?></td>  
		<td <?php if($yoklama==2){ echo "style='color:#FFF;background:#FF0000;'";}?>><?php echo cevir($tarihi);?></td>
		<?php
		if($saatii==""){
		echo "<td></td>";
		}else{
		?>
		<td <?php if($yoklama==2){ echo "style='color:#FFF;background:#FF0000;'";}?>><?php echo $saatii.". saat";?></td>	
		<?php 
		
		} 
		?>
		<?php
		if($istekmi==1){
		?>
				<td <?php if($yoklama==2){ echo "style='color:#FFF;background:#FF0000;'";}?>>        
				<?php 
				if($onaylama==1){
					echo "Etüt onaylı";
				}else{
					echo "Etüt henüz onaylanmadı";
				}
				?>
	
		</td>
 

					<td>      
İptal edilemez
	</td>
		<?php
		
		}else{
		?>
		<td <?php if($yoklama==2){ echo "style='color:#FFF;background:#FF0000;'";}?>>        
		<?php 
		if($yoklama==1){
			echo "Katıldı";
		}elseif($yoklama==2){
			echo "Katılmadı";
		}elseif($onaylama==0){
			echo "Onaylı";
		}
		?>
		</td>
		<td></td>
	<?php }?>
	

</tr>
<?php
}

?>


		</tbody></table>
	
	
		
		</div></div></div></div></div>


  

</div>


</div>
</div>
</div>
</section>


