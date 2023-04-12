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
                Bu bölümden öğretmeninizin haftalık dolu ve boş günlerini görebilirsiniz
            </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
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


<br>

<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>

    <div class='title'>Etüt Durumları  </div>    
	<div class='actions'> 	
	<a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>        </a>       
	<a href="#" class="btn box-collapse btn-mini btn-link"><i></i>        </a>    </div></div>
	<div class='box-content box-no-padding'><div class='responsive-table'>
	<div class='scrollable-area'>


	<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
	<thead>
	<tr>
    <th>        Öğretmen adı soyadı - Branş   </th>     
	<th>        Etüt tarihi    </th>
	<th>        Etüt saatleri    </th>
	<th>        Durumu    </th>
	</tr>
	</thead><tbody>  
			<?php 
			$bugun		=date("Y-m-d");
			$sontarih	=sonrakitarih("+7 days",$bugun);
			for($bugun;$bugun<$sontarih;$bugun++){ 
			
			$etut		=mysql_query("select DISTINCT ogretmen,tarih,saat from liste where tarih='$bugun' order by tarih asc ");
				while($x=mysql_fetch_assoc($etut)){
					$ogretmeni	=$x["ogretmen"];
					$saatal		=$x["saat"];
					$tarihal	=cevir($x["tarih"]);
					
					$kimki		=mysql_fetch_assoc(mysql_query("select * from kullanici where id='$ogretmeni'"));
					
					$bransbas	=mysql_fetch_assoc(mysql_query("select * from branslar where idogretmen='$ogretmeni'"));
				
		?>
<tr>  

<td>
<?php

echo $kimki["adsoyad"]." - ".$bransbas["bransi"];

?>
</td>
 
<td>
<?php 

echo $tarihal;

?>
</td>
<td>
<?php 

echo $saatal;

?>
</td>
<?php
$etutler		=mysql_query("select * from liste where tarih='$bugun' and ogretmen='$ogretmeni'");
$etutsay		=mysql_num_rows($etutler);
$randevu		=mysql_query("select * from randevular where tarih='$bugun' and ogretmen='$ogretmeni'");
$randsay		=mysql_num_rows($randevu);
if(($etutsay==2) or ($randsay==2)){
?> 
<td>
     
	
               <center> <i class='btn btn-danger btn-mini' style="font-size:16px;">DOLU</i></center>

	</td>
<?php }else{ ?>

<td>
     
	
               <center> <a href="ogrenci.php?sayfa=etutistek"><i class='btn btn-success btn-mini' style="font-size:16px;">UYGUN</i></a></center>

	</td>

<?php } ?>

	<?php }} ?>

</tr>



		</tbody></table>
	
	
		
		</div></div></div></div></div>


  

</div>


</div>
</div>
</div>
</section>


