<?php
################################sayfalama kısmım burda ##############################
$sayfa            	= @intval($_GET['s']);
					if(!$sayfa) $sayfa = 1;
$toplam           	= mysql_num_rows(mysql_query("select * from galeri"));
$limit            	= 9;
$sayfa_sayisi    	= ceil($toplam/$limit);
					if($sayfa > $sayfa_sayisi) $sayfa = 1;
$goster            	= $sayfa * $limit - $limit;
 

$gorunen        = 3;
 
    if($sayfa > 1){
        $onceki    = $sayfa - 1;
        $sayfalamaYaz.= "<a class='page-numbers' href='galeri.html'>İlk</a>";
        $sayfalamaYaz.= "<a href='galerisayfa-$onceki.html' class='next page-numbers'>Geri</a>";
		
    }
 
    for($i= $sayfa - $gorunen; $i < $sayfa + $gorunen + 1; $i++){
 
        if($i > 0 and $i <= $sayfa_sayisi){
                if($i == $sayfa){
                   $sayfalamaYaz.= "<a class='page-numbers'>$i</a>";
				   
            }else{
                $sayfalamaYaz.= "<a href='galerisayfa-$i.html' class='page-numbers'>$i</a>";
				
            }
        }
    }
 
    if($sayfa != $sayfa_sayisi){
        $sonraki     = $sayfa +1;
        $sayfalamaYaz.= "<a href='galerisayfa-$sonraki.html' class='next page-numbers'>İleri</a>";
		
        $sayfalamaYaz.= "<a href='galerisayfa-$sayfa_sayisi.html' class='next page-numbers'>Son</a>";

    }              
?>
<div class="wrapper">
		<div id="content" role="main">
			<!-- Heading ______________________________________-->
			<h1>Galeri</h1>
			
			<!-- Breadcrumbs ______________________________________-->
			<!-- No breadcrumbs in the portfolio section, just the portfolio category filter ______________________________________-->
			
		
	
			<hr />
			
			<div class="gallery">
				<div class="gallery-row">
				<?php 
				$galicerik	=mysql_query("select * from galeri order by gid desc LIMIT $goster,$limit");
					while($galeri=mysql_fetch_array($galicerik)){
					$galeriresim	=$galeri["galeri_resim"];
					$galeribaslik	=$galeri["galeri_baslik"];
					$galerikic		=$galeri["galeri_kicerik"];
					$gid			=$galeri["gid"];
				?>
					<dl class="gallery-item col-3">
						<dt class="gallery-icon"><a href="<?php echo $galeriresim;?>"><img width="480" height="320" src="<?php echo $galeriresim;?>" class="attachment-thumbnail" alt="" /></a></dt> 
						<a href="galerigoster-<?=$gid;?>.html"><dd class="gallery-caption"><strong><?php echo $galeribaslik;?></strong> <span class="small" style="color:#000;"><?php echo substr($galerikic,0,50);?></span></a></dd>
					</dl>
					<?php } ?>
			</div><!-- .gallery -->
			  
		</div> <!-- END #content -->
	</div>
		<!-- Pagination _______________________________________________-->
			<div class="pagination loop-pagination">
				<?php echo $sayfalamaYaz;?>
			</div> <!-- END .pagination -->
</div>	<!-- END .wrapper -->
	<!-- Initializing scripts ______________________________________-->
	<script> 			
	jQuery(window).load(function() {
		$('.gallery').mixitup({
			targetSelector: '.gallery-item',
			filterSelector: '#menu-portfolio-items li a'
		});
	});
	</script>