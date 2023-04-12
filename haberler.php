<?php
################################sayfalama kısmım burda ##############################
$sayfa            	= @intval($_GET['s']);
					if(!$sayfa) $sayfa = 1;
$toplam           	= mysql_num_rows(mysql_query("select * from haberler"));
$limit            	= 7;
$sayfa_sayisi    	= ceil($toplam/$limit);
					if($sayfa > $sayfa_sayisi) $sayfa = 1;
$goster            	= $sayfa * $limit - $limit;
 

$gorunen        = 3;
 
    if($sayfa > 1){
        $onceki    = $sayfa - 1;
        $sayfalamaYaz.= "<a class='page-numbers' href='haberler.html'>İlk</a>";
        $sayfalamaYaz.= "<a href='habersayfa-$onceki.html' class='next page-numbers'>Geri</a>";
		
    }
 
    for($i= $sayfa - $gorunen; $i < $sayfa + $gorunen + 1; $i++){
 
        if($i > 0 and $i <= $sayfa_sayisi){
                if($i == $sayfa){
                   $sayfalamaYaz.= "<a class='page-numbers'>$i</a>";
				   
            }else{
                $sayfalamaYaz.= "<a href='habersayfa-$i.html' class='page-numbers'>$i</a>";
				
            }
        }
    }
 
    if($sayfa != $sayfa_sayisi){
        $sonraki     = $sayfa +1;
        $sayfalamaYaz.= "<a href='habersayfa-$sonraki.html' class='next page-numbers'>İleri</a>";
		
        $sayfalamaYaz.= "<a href='habersayfa-$sayfa_sayisi.html' class='next page-numbers'>Son</a>";

    }              
?>
	<div class="wrapper">
		<div id="content" role="main">
			<!-- Heading _______________________________________________--->
			<h1>Haberler</h1>	
			
			<!-- Breadcrumbs _______________________________________________-->
			<p itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" id="breadcrumbs"><a href="/" rel="home" itemprop="url"><span itemprop="title">Anasayfa</span></a> <i class="icon-chevron-right"></i>Haberler</p>
			<hr />

			<?php
			$habcekim	=mysql_query("select * from haberler order by hid desc LIMIT $goster,$limit");
				while($duycek=mysql_fetch_array($habcekim)){
				$habbaslik	=$duycek["haber_baslik"];
				$habkisa	=$duycek["haber_kicerik"];
				$habtarih	=$duycek["haber_tarih"];
				$habresim	=$duycek["haber_resim"];
				$hid		=$duycek["hid"];
			?>
			<!-- Standard post excerpt _______________________________________________-->
			<article id="post-1" class="post format-standard sticky">

				<header class="entry-header">
					<!-- Post Featured Image _______________________________________________-->
					<div class="post-thumb">
						<a href="blog-post.html"></a>	
					</div>
								
					<!-- Meta info _______________________________________________-->
					<div class="entry-byline">
						<ul>
							
							<li><abbr class="published" title="<?=tarih($habtarih);?>"><?=tarih($habtarih);?></abbr><div style="margin-left:10px;"><img src="<?=$habresim;?>" width="60" height="30"></div></li>
							
						</ul>
					</div><!-- END .entry-byline -->
				
				</header> <!-- END .entry-header -->

				<div class="entry-summary">
					<!-- Heading _______________________________________________-->
					<h1><a href="haberoku-<?=$hid;?>.html"><?=$habbaslik;?></a></h1>
				
					<!-- Excerpt  _______________________________________________-->
					<p><?=substr($habkisa,0,70);?></p>
					
					<!-- Footer meta info _______________________________________________-->
					<footer class="entry-footer">	
					</footer><!-- END .entry-footer -->
				</div><!-- END .entry-summary -->
				<div class="clear"></div>
			</article>
		<?php
		}
		?>
			
			<!-- Pagination _______________________________________________-->
			<div class="pagination loop-pagination">
				<?php echo $sayfalamaYaz;?>
			</div> <!-- END .pagination -->
		</div> <!-- END #content -->
		</div>