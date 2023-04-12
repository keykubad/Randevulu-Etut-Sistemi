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
<div class='alert alert-info'>
    <a class='close' data-dismiss='alert' href='#'>&times;</a>
	<?php 
			$ogrencicek		=mysql_fetch_assoc(mysql_query("select * from kullanici where kullaniciadi='".$_SESSION['kul']."'"));
	?>
    <center>Merhaba Değerli Öğrencimiz <strong><?php echo $ogrencicek["adsoyad"];?></strong> <br><br>
	
	Randevulu etüt sistemimizden mevcut etüt zamanlarını ve öğretmenlerini görebilirsin.Ayrıca katıldığın ve katılmadığın etütlerin raporunu alabilirsin.</center><br>
</div>
<div class='row-fluid' >
    <div class='span12 box box-transparent'>
<div class='row-fluid'style="text-align:center;">
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
			    <div class='span2 box-quick-link red-background'>
                <a href='ogrenci.php?sayfa=ogretmenkontrol'>
                    <div class='header'>
                        <div class='icon-list'></div>
                    </div>
                    <div class='content'>Haftalık Etüt Durumları</div>
                </a>
            </div>
			    <div class='span2 box-quick-link green-background'>
                <a href='ogrenci.php?sayfa=ogrencimesajyaz'>
                    <div class='header'>
                        <div class='icon-pencil'></div>
                    </div>
                    <div class='content'>Mesajlaşma Sistemi</div>
                </a>
            </div>
               <div class='span2 box-quick-link orange-background'>
                <a href='ogrenci.php?sayfa=ogrencisifredegis'>
                    <div class='header'>
                        <div class='icon-user'></div>
                    </div>
                    <div class='content'>Şifre Değiştir</div>
                </a>
            </div>
            
        </div> 
    </div>
</div>


                <div class='alert alert-success'>
                        <a href="#" class="close" data-dismiss="alert">&times;
                        </a>
						<?php
							$ogrencisi		=$ogrencicek["id"];
							$yoklama1		=mysql_query("select * from liste where ogrenci='$ogrencisi' and yoklama='1'");
							$yoklama2		=mysql_query("select * from liste where ogrenci='$ogrencisi' and yoklama='2'");
							$yoklama3		=mysql_query("select * from liste where ogrenci='$ogrencisi' and yoklama='3'");
							$say1			=mysql_num_rows($yoklama1);
							$say2			=mysql_num_rows($yoklama2);
							$say3			=mysql_num_rows($yoklama3);
						?>
                        <strong>
                            <i class="icon-info-sign"></i>
                            Devamsızlık Bilgisi
                        </strong><br>
                       Katıldığınız etüt sayısı : <?php echo $say1;?><br>
					   Katılmadığınız etüt sayısı : <?php echo $say2;?><br>
					   Mazeretli katılmadığınız etüt sayısı : <?php echo $say3;?>
                    </div>

</div>


</div>
</div>
</div>
</section>