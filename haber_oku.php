<div class="wrapper">
		<div id="content" role="main">
			<!-- Heading ______________________________________-->
			<h1>Haber Oku</h1>	
			
			<!-- Breadcrumbs ______________________________________-->
			<p itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" id="breadcrumbs"><a href="/" rel="home" itemprop="url"><span itemprop="title">Anasayfa</span></a> <i class="icon-chevron-right"></i> <a href="haberler.html" itemprop="url"><span itemprop="title">Haberler</span></a> <i class="icon-chevron-right"></i> Haber içeriği</p>
			<hr />

			<article id="post-1" class="post">
<?php
$hidd		=$_GET["hid"];
	$cekhab	=mysql_fetch_array(mysql_query("select * from haberler where hid='$hidd'"));
		$haberresim		=$cekhab["haber_resim"];
		$haberbaslik	=$cekhab["haber_baslik"];
		$habericerik	=$cekhab["haber_icerik"];
		$habertarih		=$cekhab["haber_tarih"];
?>
				<header class="entry-header">
					<!-- Post Featured Image ______________________________________-->
					<div class="post-image">
						<center><img src="<?=$haberresim;?>" width="700" height="320" alt="" />	</center>	
					</div>	

					<!-- Meta info ______________________________________-->
					<div class="entry-byline">
						<ul>
							<li><strong><i class="icon-calendar" title="Haber tarih"></i></strong> <abbr class="published" title="<?=tarih($habertarih);?>"><?=tarih($habertarih);?></abbr></li>
						</ul>
					</div><!-- END .entry-byline -->
					
				</header> <!-- END .entry-header -->

				<div class="entry-content">
					<!-- Heading ______________________________________-->
					<h1><?=$haberbaslik;?></h1>		
					
					<!-- WYSIWYG Content ______________________________________-->
					<p><?=$habericerik;?></p>

					<!-- END of WYSIWYG content ______________________________________-->
					

				</div><!-- END .entry-content -->
				<div class="clear"></div>
				
			</article>
				
	

			<div class="clear"></div>
			  
		</div> <!-- END #content -->



		<div class="clear"></div>

	</div> <!-- END .wrapper -->