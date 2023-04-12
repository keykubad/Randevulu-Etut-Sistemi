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
                Öğrenci Ödev Raporları
            </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
		
 <div class='box-content'>
            <form class="form form-horizontal" method="post" style="margin-bottom: 0;" action="ogretmen.php?sayfa=ogretmenogrenciodevraporuekran"/><div style="margin:0;padding:0;display:inline">

	
				        <div class='control-group'>
                 <label class='control-label' for='inputPassword4'>Tarihi</label>
                <div class='controls'>
                    <div class='datetimepicker input-append' id='datetimepicker'>
                        <input class='input-medium' name="bas" data-format='dd-MM-yyyy' placeholder='Başlangıç tarihi' type='text' />
            <span class='add-on'>
              <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
            </span>
                    </div>
						&nbsp;&nbsp;&nbsp;ile&nbsp;&nbsp;&nbsp;	 
                    <div class='datetimepicker input-append' id='datetimepicker'>
                        <input class='input-medium' name="son" data-format='dd-MM-yyyy' placeholder='Bitiş tarihi' type='text' />
            <span class='add-on'>
              <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
            </span>
               
                </div>&nbsp;&nbsp;&nbsp;tarihi arası öğrenci ödev raporudur.
                </div>
		
			
            </div>

				 <div class='control-group'>
                    <label class='control-label'>Öğretmen</label>
                    <div class='controls'>
                        <select class='span3' name="adi">
							<?php
							
								$kullanicial	=mysql_query("select * from kullanici where yetki='2' and id='".$kim["id"]."'");
									while($al=mysql_fetch_assoc($kullanicial)){
										$ogid	=$al["id"];
										$adi	=$al["adsoyad"];
								$bransal		=mysql_fetch_assoc(mysql_query("select * from branslar where idogretmen='$ogid'"));
					
					
							?>

						<option value="<?php echo $ogid;?>"><?php echo $bransal["bransi"]." - ". $adi;?></option>
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

if($_POST){
$bas		=cevir($_POST["bas"]);
$son		=cevir($_POST["son"]);
$adi		=$_POST["adi"];

?>

<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>
    <div class='title'><?php echo $bas;?> tarihi ile <?php echo $son;?> arası liste</div>    
	<div class='actions'> 	
	<a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>        </a>       
	<a href="#" class="btn box-collapse btn-mini btn-link"><i></i>        </a>    </div></div>
	<div class='box-content box-no-padding'><div class='responsive-table'>
	<div class='scrollable-area'>

	<form method="post">
	<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
	<thead>
	<tr>
    <th>        Öğretmen Adı Soyadı    </th>   
	<th>        Verdiği Etüt Sayısı    </th>   
	<th>        Verdiği Ödev Sayısı    </th>			
	<th>        İşlem    </th> 
	</tr>
	</thead><tbody>  
<tr>    

		<?php 
			$cekad		=mysql_fetch_assoc(mysql_query("select * from kullanici where yetki='2' and id='$adi'"));
			$etutsay	=mysql_query("select * from randevular where tarih>'$bas' and tarih<='$son' and ogretmen='$adi' ");
			$odevsay	=mysql_query("select * from odevler where verilistarih>'$bas' and verilistarih<='$son' and ogretmeni='$adi' ");
			$saydir		=mysql_num_rows($etutsay);
			$odevtoplam	=mysql_num_rows($odevsay);
		?>
		<td><?php echo $cekad["adsoyad"];?></td>
		<td><?php echo $saydir;?></td>    
		<td><?php echo $odevtoplam;?>   </td>	    
  		
		<td>        
		<center><a href="ogretmenraporyazdir.php?ogretmen=<?php echo $cekad["id"];?>&bas=<?php echo $bas;?>&son=<?php echo $son;?>" class="btn btn-primary btn-large">Detayları Yazdır</a></center>	
		</td>
		</tr>
		</tbody></table>
		<center><input type="submit" class='btn btn-primary' name="kayit" value="Kaydet"></center>
		</form>
		
		
		</div></div></div></div></div>
		<?php } ?>






  

</div>


</div>
</div>
</div>
</section>

