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
                Etüt Yoklaması
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
                        <input class='input-medium' name="tarih" data-format='dd-MM-yyyy' placeholder='Randevu tarihi seçiniz' type='text' />
            <span class='add-on'>
              <i data-date-icon='icon-calendar'></i>
            </span>
                    </div>
                </div>
            </div>

				 <div class='control-group'>
                    <label class='control-label'>Öğretmen</label>
                    <div class='controls'>
                        <select class='span3' name="adi">
							<?php
								$kullanicial	=mysql_query("select * from kullanici where yetki='2'");
									while($al=mysql_fetch_assoc($kullanicial)){
										$ogid	=$al["id"];
										$adi	=$al["adsoyad"];
					
					
							?>
						<option value="<?php echo $ogid;?>"><?php echo $adi;?></option>
                        <?php
						}
						?>
                        </select>
                    </div>
                </div>
				
	              <div class='control-group'>
                    <label class='control-label'>Saat Seçiniz</label>
                    <div class='controls'>
                        <select class='span3' name="saat">
						<option value="1">1. saat</option>
                            <option value="2">2. saat</option>
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

if($_POST){
$rtarih		=trim($_POST["tarih"]);
$ogretmen	=trim($_POST["ogretmen"]);
$saat		=trim($_POST["saat"]);
$yap		=$_POST["yap"];

?>
	<?php
		if($_POST["kayit"]){
			$yokla	=$_POST["yokla"];
			$kul	=$_POST["ad"];
			for ($a=0;$a<=count($kul);$a++){
			
			$kaydetyok		=mysql_query("update liste set yoklama='$yokla[$a]',yapildimi='$yap[$a]' where lid='$kul[$a]' ");

			}
				if($kaydetyok){
					uyar("Yoklama başarıyla kaydedildi");
				}else{
					uyar("İŞLEM HATALI!!!");
				
				}
		}
	?>
<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>
    <div class='title'><?php echo $rtarih;?> tarihine ait etüt listesi</div>    
	<div class='actions'> 	
	<a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>        </a>       
	<a href="#" class="btn box-collapse btn-mini btn-link"><i></i>        </a>    </div></div>
	<div class='box-content box-no-padding'><div class='responsive-table'>
	<div class='scrollable-area'>

	<form method="post">
	<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
	<thead>
	<tr>
    <th>        Öğrenci Adı Soyadı    </th>   
     <th class='only-checkbox'>
                            <input id='check-all' type='checkbox' />Tümünü katıldı olarak işaretle
							
                        </th>	
	<th>        Etüt Konusu    </th>		
	<th>        Durum    </th> 
	
	</tr>
	</thead><tbody>  
	<?php	
	$rtarih=cevir($rtarih);
	$cektir		=mysql_query("SELECT * FROM liste inner join kullanici on liste.ogrenci=kullanici.id where liste.tarih='$rtarih' and liste.saat='$saat'");		
		while($q=mysql_fetch_array($cektir)){		
		$idsi		=$q["ogretmen"];
		$ogrenciid	=$q["lid"];
		$konual		=$q["konusu"];
		$rid		=$q["rid"];		
		$konula		=mysql_fetch_assoc(mysql_query("select * from liste where tarih='$rtarih' and saat='$saat'"));
		$adsoyad		=$q["adsoyad"];
		?><tr>    
<td><?php echo $adsoyad;?></td>
	<input type="hidden" name="ad[]" value="<?php echo $ogrenciid;?>">
	<input type="hidden" name="yap[]" value="1">
		<td><label class='only-checkbox'><input type="checkbox" name="yokla[]" value="1"/> Katıldı</label>    
		        <label><input type="checkbox" name="yokla[]" value="2"/> Katılmadı</label>   	    
		       <label><input type="checkbox" name="yokla[]" value="3"/> Mazeretli</label>    </td> 
<td>        <?php echo $konual;?>    </td>  		
		<td>        
		<div style="margin:auto;text-align:center;">     
		<?php 
		if($katilim>$limiti){
			echo "<i class='btn btn-primary' style='background-color:red;'> DOLU</i>"; 
		}else{
		
		?>	
	
		<?php echo "<i class='btn btn-primary' style='background-color:green;'> YER VAR</i>";  }?>
		</div>    
		</td>
		</tr>
		<?php } ?></tbody></table>
		<center><input type="submit" class='btn btn-primary' name="kayit" value="Kaydet"></center>
		</form>
		
		
		</div></div></div></div></div>
		<?php } ?>






  

</div>


</div>
</div>
</div>
</section>

