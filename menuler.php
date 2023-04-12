<?php
//Kurumsal firma sitesi
//Kodlayan Keykubad
//id ye göre içerik çekiyoruz hadi bakalım
$menuid			=$_GET["id"];
$cekmenu		= mysql_fetch_array(mysql_query("select * from menuler where menu_id='$menuid'"));
				$menubaslik	= $cekmenu["menu_baslik"];
				$menuicerik	= $cekmenu["menu_icerik"];
?>
<div class="clear"></div>
	<div class="wrapper">
		
			<!-- Heading _____________________________________________-->
			<h1><?=$menubaslik;?></h1>
			
			<!-- Breadcrumbs _____________________________________________-->
			<p itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" id="breadcrumbs"><a href="/" rel="home" itemprop="url"><span itemprop="title">Anasayfa</span></a> <i class="icon-chevron-right"></i> <?=$menubaslik;?></p>
			<hr />
			
			<!-- WYSIWYG Content _____________________________________________-->
			<?=stripslashes($menuicerik);?>
			</p>
	
			<br />
	
			
			<!-- END of WYSIWYG content _____________________________________________-->
			
		 <!-- END .content -->	
			
		<div class="clear"></div>	  
		
	</div> <!-- END .wrapper -->