<?php
//Kurumsal firma sitesi
//Kodlayan Keykubad
$gid=$_GET["gid"];
$galericek	=mysql_fetch_array(mysql_query("select * from galeri where gid='$gid'"));
	$galeribaslik	=$galericek["galeri_baslik"];
	$galeriicerik	=$galericek["galeri_icerik"];
	$galeriresim	=$galericek["galeri_resim"];
	$gig			=$galericek["gid"];
?>
<div class="wrapper">
		<div id="content" role="main">
			<!-- Heading __________________________________________-->
			<h1>Galeri İçerik</h1>
			
			<!-- Breadcrumbs __________________________________________-->
			<p itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" id="breadcrumbs"><a href="/" rel="home" itemprop="url"><span itemprop="title">Anasayfa</span></a> <i class="icon-chevron-right"></i> <a href="galeri.html" itemprop="url"><span itemprop="title">Galeri</span></a> <i class="icon-chevron-right"></i> Galeri içerik</p>
			<hr />

			<!-- Pagination by posts __________________________________________-->
			<ul class="portfolio-pagination">
				<li><a href="galerigoster-<?=$gig-1;?>.html" class="prev1"><i class="icon-chevron-left"></i> <span>Önceki</span></a></li>
				<li><a href="galerigoster-<?=$gig+1;?>.html" class="next1"><i class="icon-chevron-right"></i> <span>Sonraki</span></a></li>
			</ul>

			<article id="post-2" class="post format-gallery">

				<header class="entry-header">
					<!-- Heading __________________________________________-->
					<p class="center extrabig thin smaller-padding"><?php echo $galeribaslik;?></p>	
					<p class="center"><a href="galeri.html" class="thin"><i class="icon-list thin small"></i> &nbsp; Tüm galeri</a></p>		
				</header> <!-- END .entry-header -->

				<!-- Post Featured Image __________________________________________-->
				<div class="post-image p75">
					<div class="cycle">
						<img src="<?php echo $galeriresim;?>" alt="" />					
					</div>
				
				</div>

				<div class="entry-content p25">

					<!-- WYSIWYG Content __________________________________________-->
			

					<p><?php echo $galeriicerik;?></p>

				

					<!-- END of WYSIWYG content __________________________________________-->

				</div><!-- END .entry-content -->

				<div class="clear"></div>

			

			</article>
			</div>
			</div>
