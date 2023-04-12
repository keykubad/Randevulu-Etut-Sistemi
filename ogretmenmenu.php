<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='page-header'>
    <h1 class='pull-left'>
        <i class='icon-dashboard'></i>
        <span>Ögretmen Paneli</span>
    </h1>

</div>
<div class='alert alert-info'>
    <a class='close' data-dismiss='alert' href='#'>&times;</a>
Merhaba Sayın <?php echo $kim["adsoyad"];?> öğretmen yönetim paneline hoşgeldiniz..
</div>
<div class='row-fluid'>
    <div class='span12 box box-transparent'>
        <div class='row-fluid'>
            <div class='span2 box-quick-link blue-background'>
                <a href='ogretmen.php?sayfa=ogrenciekle'>
                    <div class='header'>
                        <div class='icon-user'></div>
                    </div>
                    <div class='content'>Kullanıcı Ekle</div>
                </a>
            </div>
            <div class='span2 box-quick-link green-background'>
                <a href='ogretmen.php?sayfa=ogretmenrandevuekle'>
                    <div class='header'>
                        <div class='icon-magic'></div>
                    </div>
                    <div class='content'>Randevu Ekle</div>
                </a>
            </div>
			       <div class='span2 box-quick-link red-background'>
                <a href='ogretmen.php?sayfa=ogretmenodevekle'>
                    <div class='header'>
                        <div class='icon-list'></div>
                    </div>
                    <div class='content'>Ödev Ekle</div>
                </a>
            </div>

            <div class='span2 box-quick-link purple-background'>
                <a href='ogretmen.php?sayfa=ogretmenyoklamaal'>
                    <div class='header'>
                        <div class='icon-comment'></div>
                    </div>
                    <div class='content'>Etüt Yoklaması</div>
                </a>
            </div>
		 <div class='span2 box-quick-link orange-background'>
                <a href='ogretmen.php?sayfa=ogretmenrandevuliste'>
                    <div class='header'>
                        <div class='icon-refresh'></div>
                    </div>
                    <div class='content'>Yeni Etütler</div>
                </a>
            </div>
            <div class='span2 box-quick-link muted-background'>
                <a href='ogretmen.php?sayfa=ogretmeneskietut'>
                    <div class='header'>
                        <div class='icon-list'></div>
                    </div>
                    <div class='content'>Geçmiş Etütler</div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class='row-fluid'>
    <div class='span3 box'>
        <div class='box-header'>
            <div class='title'>
                <i class='icon-group'></i>
                Kullanıcılar
            </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
        <div class='row-fluid'>
            <div class='span12'>
					<?php
					
						$ogrencial	=mysql_query("select * from kullanici where yetki='3'");
						$ogrenci	=mysql_num_rows($ogrencial);
					?>
           
       
                <div class='box-content box-statistic'>
                    <h3 class='title text-primary'><?php echo $ogrenci;?></h3>
                    <small>Toplam Öğrenci Sayısı</small>
                    <div class='text-primary icon-user align-right'></div>
                </div>
            </div>
        </div>
    </div>
    <div class='span3 box'>
        <div class='box-header'>
            <div class='title'>
                <i class='icon-comments'></i>
                Mazeretler
            </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
					<?php
						$kabulmazeretal	=mysql_query("select * from mazeretler where kabul='1'");
						$mazeretkabul	=mysql_num_rows($kabulmazeretal);
						$kabulal		=mysql_query("select * from mazeretler where kabul='0'");
						$kabulmazeret	=mysql_num_rows($kabulal);

					?>
        <div class='row-fluid'>
            <div class='span12'>
                <div class='box-content box-statistic'>
                    <h3 class='title text-error'><?php echo $kabulmazeret;?></h3>
                    <small>Onay Bekleyen</small>
                    <div class='text-error icon-plus align-right'></div>
                </div>
                <div class='box-content box-statistic'>
                    <h3 class='title text-success'><?php echo $mazeretkabul;?></h3>
                    <small>Onaylı</small>
                    <div class='text-success icon-ok align-right'></div>
                </div>
      
            </div>
        </div>
    </div>		    
	<div class='span3 box'>        
	<div class='box-header'>           
	<div class='title'>                
	<i class='icon-magic'></i>                Randevu İstekleri          </div>    
	<div class='actions'>               
	<a href="#" class="btn box-remove btn-mini btn-link">
	<i class='icon-remove'></i>             
	</a>                
	<a href="#" class="btn box-collapse btn-mini btn-link"><i></i>             
	</a>            </div>        </div>  
<?php
			$randevuistek			=mysql_query("select * from liste where istekmi='1' and ogretmen='".$kim["id"]."' and yapildimi='0'");
			$toplamrandevolumsuz	=mysql_num_rows($randevuistek);
			$randevuistek2			=mysql_query("select * from liste where istekmi='1' and ogretmen='".$kim["id"]."' and yapildimi='1'");
			$toplamrandevolumlu		=mysql_num_rows($randevuistek2);
?>	
    <div class='row-fluid'>            
	<div class='span12'>                <div class='box-content box-statistic'>   
	<h3 class='title text-error'><?php echo $toplamrandevolumsuz;?></h3>                    
	<small>Yapılmayan etüt istekleriniz</small>                    <div class='text-error icon-plus align-right'></div>  
	</div>              
	<div class='box-content box-statistic'>                   
	<h3 class='title text-success'><?php echo $toplamrandevolumlu;?></h3>                    
	<small>Yapılan Etüt istekleriniz</small>                   
	<div class='text-success icon-ok align-right'></div>                
	</div>                
      
	</div>        </div>    </div>			   
	<div class='span3 box'>        <div class='box-header'>            
	<div class='title'>               
	<i class='icon-list'></i>  
	Raporlar            </div>          
	<div class='actions'>                
	<a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>                </a>   
	<a href="#" class="btn box-collapse btn-mini btn-link"><i></i>                </a>            
	</div>        </div> 
	<?php
		$raporodev				=mysql_query("select * from odevler where ogretmeni='".$kim["id"]."'");
		$raporodevsay			=mysql_num_rows($raporodev);
		$raporetut				=mysql_query("select * from randevular where ogretmen='".$kim["id"]."'");
		$raporetutsay			=mysql_num_rows($raporetut);
	?>
	<div class='row-fluid'>            <div class='span12'>           
	<div class='box-content box-statistic'>                   
	<h3 class='title text-error'><?php echo $raporodevsay;?></h3>                    
	<small>Toplam verdiğiniz ödev sayısı</small>                    
	<div class='text-success icon-ok align-right'></div>                </div>            
    <div class='box-content box-statistic'>                    <h3 class='title text-success'><?php echo $raporetutsay;?></h3>  
	<small>Toplam verdiğiniz etüt sayısı</small>                    
	<div class='text-success icon-ok align-right'></div>                </div>            
              </div>   
	</div>    </div>		
</div>




</div>

    </div>
</div>
</div>
</div>
</div>
</section>