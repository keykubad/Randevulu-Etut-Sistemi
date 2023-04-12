<nav class='' id='main-nav'>
<div class='navigation'>
<div class='search'>
    <form accept-charset="UTF-8" action="search_results.html" method="get" /><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
        <div class='search-wrapper'>
            <input autocomplete="off" class="search-query" id="q" name="q" placeholder="Search..." type="text" value="" />
            <button class="btn btn-link icon-search" name="button" type="submit"></button>
        </div>
    </form>
</div>
<?php 
	$resimog	=mysql_fetch_assoc(mysql_query("select * from kullanici where kullaniciadi='".$_SESSION['kul']."' "));
?>
<center><a href="ogrenci.php">
<?php 
if($resimog["resim"]!=""){ 
?>
<img src="<?php echo $resimog["resim"];?>" style="width:150px;height:150px;border:4px solid #FFF;margin-top:20px;">
<?php
}else{
?>
<img src="/yuklenenler/kullanici/defaultresim.png" style="width:150px;height:150px;border:4px solid #FFF;margin-top:20px;">
<?php
}
?>
</a></center>
</div>
</nav>