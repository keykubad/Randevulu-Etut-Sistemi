<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='page-header'>
    <h1 class='pull-left'>
        <i class='icon-dashboard'></i>
        <span>Yönetici Paneli</span>
    </h1>

</div>
<div class='alert alert-info'>
    <a class='close' data-dismiss='alert' href='#'>&times;</a>
Merhaba Sayın <?php echo $_SESSION["kul"];?> Yönetici paneline hoşgeldiniz..
</div>
<div class='row-fluid'>
    <div class='span12 box box-transparent'>
        <div class='row-fluid'>
            <div class='span2 box-quick-link blue-background'>
                <a href='yonetici.php?sayfa=kullaniciekle'>
                    <div class='header'>
                        <div class='icon-user'></div>
                    </div>
                    <div class='content'>Kullanıcı Ekle</div>
                </a>
            </div>
            <div class='span2 box-quick-link green-background'>
                <a href='yonetici.php?sayfa=randevuekle'>
                    <div class='header'>
                        <div class='icon-magic'></div>
                    </div>
                    <div class='content'>Randevu Ekle</div>
                </a>
            </div>
            <div class='span2 box-quick-link orange-background'>
                <a href='yonetici.php?sayfa=odevekle'>
                    <div class='header'>
                        <div class='icon-refresh'></div>
                    </div>
                    <div class='content'>Ödev Ekle</div>
                </a>
            </div>
            <div class='span2 box-quick-link purple-background'>
                <a href='yonetici.php?sayfa=yoneticimesaj'>
                    <div class='header'>
                        <div class='icon-comment'></div>
                    </div>
                    <div class='content'>Mesajlar</div>
                </a>
            </div>
            <div class='span2 box-quick-link red-background'>
                <a href='yonetici.php?sayfa=ogrenciliste'>
                    <div class='header'>
                        <div class='icon-list'></div>
                    </div>
                    <div class='content'>Öğrenci Listesi</div>
                </a>
            </div>
            <div class='span2 box-quick-link muted-background'>
                <a href='yonetici.php?sayfa=randevuistekyonetici'>
                    <div class='header'>
                        <div class='icon-list'></div>
                    </div>
                    <div class='content'>Randevu İstekleri</div>
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
                <div class='box-content box-statistic'>
                    <h3 class='title text-error'>
					<?php
						$yoneticial	=mysql_query("select * from kullanici where yetki='1'");
						$yonetici	=mysql_num_rows($yoneticial);
						$ogretmenal	=mysql_query("select * from kullanici where yetki='2'");
						$ogretmen	=mysql_num_rows($ogretmenal);
						$ogrencial	=mysql_query("select * from kullanici where yetki='3'");
						$ogrenci	=mysql_num_rows($ogrencial);
					?>
				<?php echo $yonetici;?>
					</h3>
                    <small>Yönetici</small>
                    <div class='text-error icon-user align-right'></div>
                </div>
                <div class='box-content box-statistic'>
                    <h3 class='title text-warning'><?php echo $ogretmen;?></h3>
                    <small>Öğretmen</small>
                    <div class='text-warning icon-user align-right'></div>
                </div>
                <div class='box-content box-statistic'>
                    <h3 class='title text-primary'><?php echo $ogrenci;?></h3>
                    <small>Öğrenci</small>
                    <div class='text-primary icon-user align-right'></div>
                </div>
            </div>
        </div>
    </div>
    <div class='span3 box'>
        <div class='box-header'>
            <div class='title'>
                <i class='icon-comments'></i>
                Mesajlar
            </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
					<?php
						$okunmusmesajal	=mysql_query("select * from mesajlar where yoneticioku='1'");
						$okunmus		=mysql_num_rows($okunmusmesajal);
						$okunmamismesaj	=mysql_query("select * from mesajlar where yoneticioku='0'");
						$okunmamis		=mysql_num_rows($okunmamismesaj);
						$randevuistekler		=mysql_query("select * from liste where istekmi='1' and onayi='1'");
						$istekonaylisay			=mysql_num_rows($randevuistekler);
						$randevuistekleronaysiz	=mysql_query("select * from liste where istekmi='1' and onayi='0'");
						$istekonaysizsay		=mysql_num_rows($randevuistekleronaysiz);
						
						//Genel rapor
						$toplametutler		=mysql_query("select * from randevular");
						$saytumetut			=mysql_num_rows($toplametutler);
						$toplamodevler		=mysql_query("select * from odevler");
						$saytumodevci		=mysql_num_rows($toplamodevler);
						
					?>
        <div class='row-fluid'>
            <div class='span12'>
                <div class='box-content box-statistic'>
                    <h3 class='title text-error'><?php echo $okunmamis;?></h3>
                    <small>Okunmamış Mesajlar</small>
                    <div class='text-error icon-plus align-right'></div>
                </div>
                <div class='box-content box-statistic'>
                    <h3 class='title text-success'><?php echo $okunmus;?></h3>
                    <small>Okunmuş Mesajlar</small>
                    <div class='text-success icon-ok align-right'></div>
                </div>
      
            </div>
        </div>
    </div>		    <div class='span3 box'>        <div class='box-header'>           
	<div class='title'>                <i class='icon-comments'></i>                Randevu İstekleri           </div>          
	<div class='actions'>                
	<a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>                </a> 
	<a href="#" class="btn box-collapse btn-mini btn-link"><i></i>                </a>      
	</div>        </div>        
	<div class='row-fluid'>           
	<div class='span12'>          
	<div class='box-content box-statistic'>                    
	<h3 class='title text-error'><?php echo $istekonaysizsay;?></h3>                    <small>Onaysız</small> 
	<div class='text-error icon-plus align-right'></div>              
	</div>                
	<div class='box-content box-statistic'>                   
	<h3 class='title text-success'><?php echo $istekonaylisay;?></h3>                    
	<small>Onaylı</small>                   
	<div class='text-success icon-ok align-right'></div>                </div>    
           </div>        </div>    </div>			    
	<div class='span3 box'>        <div class='box-header'>            
	<div class='title'>                <i class='icon-list'></i>                Genel Rapor            </div> 
	<div class='actions'>               
	<a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>                </a> 
	<a href="#" class="btn box-collapse btn-mini btn-link"><i></i>                </a>            </div>
	</div>       
	<div class='row-fluid'>           
	<div class='span12'>                
	<div class='box-content box-statistic'>                   
	<h3 class='title text-error'><?php echo $saytumetut;?></h3>                  
	<small>Toplam verilen etüt sayımız</small>                    
	<div class='text-error icon-plus align-right'></div>            
    </div>                <div class='box-content box-statistic'>                
    <h3 class='title text-success'><?php echo $saytumodevci;?></h3>                    <small>Toplam verilen ödev sayımız</small>                    
	<div class='text-success icon-ok align-right'></div>                </div>         
	           </div>        </div>  
	</div>		
</div>



</div>

    </div>
</div>
</div>
</div>
</div>
</section>