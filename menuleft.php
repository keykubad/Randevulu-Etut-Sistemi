<?php
$url		=$_SERVER["REQUEST_URI"];
?>
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
<ul class='nav nav-stacked'>
<li <?php if($url=="/yonetici.php"){echo "class='active'";}?>>
    <a href='yonetici.php'>
        <i class='icon-dashboard'></i>
        <span>Anasayfa</span>
    </a>
</li>
<li>
    <a class='dropdown-collapse ' href='#'>
        <i class='icon-cog'></i>
        <span>Genel ayarlar</span>
        <i class='icon-angle-down angle-down'></i>
    </a>
    <ul class='nav nav-stacked <?php if($url=="/yonetici.php?sayfa=etutkapat"){echo "in";}?>'>
        <li >
            <a href='yonetici.php?sayfa=etutkapat'>
                <i class='icon-caret-right'></i>
                <span>Etüt istekleri yönetimi</span>
            </a>
        </li>
		    <li >
            <a href='yonetici.php?sayfa=yoneticimesaj'>
                <i class='icon-caret-right'></i>
                <span>Mesaj Sistemi</span>
            </a>
        </li>
		
 <li >
            <a href='yonetici.php?sayfa=yoneticikullanicikontrol'>
                <i class='icon-caret-right'></i>
                <span>Kullanıcı Kontrol Sistemi</span>
            </a>
        </li>
		
    </ul>
</li>
<li class=''>
    <a class='dropdown-collapse' href='#'>
        <i class='icon-user'></i>
        <span>Kullanıcılar</span>
        <i class='icon-angle-down angle-down'></i>
    </a>
    <ul class='nav nav-stacked <?php if($url=="/yonetici.php?sayfa=kullaniciekle"){echo "in";}elseif($url=="/yonetici.php?sayfa=kullaniciduzen"){echo "in";}elseif($url=="/yonetici.php?sayfa=bransekle"){echo "in";}elseif($url=="/yonetici.php?sayfa=bransduzen"){echo "in";}?>'>
        <li class=''>
            <a href='yonetici.php?sayfa=kullaniciekle'>
                <i class='icon-caret-right'></i>
                <span>Kullanıcı ekle</span>
            </a>
        </li>
        <li class=''>
            <a href='yonetici.php?sayfa=kullaniciduzen'>
                <i class='icon-caret-right'></i>
                <span>Kullanıcı düzenle</span>
            </a>
        </li>
		
		 <li class=''>
            <a href='yonetici.php?sayfa=bransekle'>
                <i class='icon-caret-right'></i>
                <span>Branş ekle</span>
            </a>
        </li>
		
		<li class=''>
            <a href='yonetici.php?sayfa=bransduzen'>
                <i class='icon-caret-right'></i>
                <span>Branş düzenle</span>
            </a>
        </li>


    </ul>
</li>
<li>
    <a class='dropdown-collapse ' href='#'>
        <i class='icon-user'></i>
        <span>Öğretmen izinleri</span>
        <i class='icon-angle-down angle-down'></i>
    </a>
    <ul class='nav nav-stacked'>
        <li class=''>
            <a href='yonetici.php?sayfa=ogretmenizinekle'>
                <i class='icon-caret-right'></i>
                <span>Öğretmen izin ekle</span>
            </a>
        </li>
        <li class=''>
            <a href='yonetici.php?sayfa=ogretmenizinduzen'>
                <i class='icon-caret-right'></i>
                <span>Öğretmen izin düzenle</span>
            </a>
        </li>
		   <li class=''>
            <a href='yonetici.php?sayfa=topluizinekle'>
                <i class='icon-caret-right'></i>
                <span>Toplu izin ekle</span>
            </a>
        </li>
		
    </ul>
</li>
<li>
    <a class='dropdown-collapse ' href='#'>
        <i class='icon-calendar'></i>
        <span>Randevular</span>
        <i class='icon-angle-down angle-down'></i>
    </a>
    <ul class='nav nav-stacked'>
        <li class=''>
            <a href='yonetici.php?sayfa=randevuekle'>
                <i class='icon-caret-right'></i>
                <span>Randevu ekle</span>
            </a>
        </li>
        <li class=''>
            <a href='yonetici.php?sayfa=randevuduzen'>
                <i class='icon-caret-right'></i>
                <span>Randevu kontrol ve düzenleme</span>
            </a>
        </li>
		
		     <li class=''>
            <a href='yonetici.php?sayfa=randevuistekyonetici'>
                <i class='icon-caret-right'></i>
                <span>Randevu istekleri</span>
            </a>
        </li>
		     <li class=''>
            <a href='yonetici.php?sayfa=ogrencirandevuistekyaz'>
                <i class='icon-caret-right'></i>
                <span>Randevu istek listesi yazdır</span>
            </a>
        </li>
		        <li class=''>
            <a href='yonetici.php?sayfa=randevuyazdir'>
                <i class='icon-caret-right'></i>
                <span>Randevu listesi yazdır</span>
            </a>
        </li>
		
		    <li class=''>
            <a href='yonetici.php?sayfa=yoklamaal'>
                <i class='icon-caret-right'></i>
                <span>Etüt (Randevu) yoklaması al</span>
            </a>
        </li>
		
    </ul>
</li>
<li class=''>
    <a href='yonetici.php?sayfa=mazeretliste'>
        <i class='icon-comment'></i>
        <span>Mazeretler</span>
    </a>
</li>

<li class=''>
    <a href='yonetici.php?sayfa=ogrenciliste'>
        <i class='icon-user'></i>
        <span>Öğrenci Listesi</span>
    </a>
</li>


<li>
    <a class='dropdown-collapse ' href='#'>
        <i class='icon-time'></i>
        <span>Ödevler</span>
        <i class='icon-angle-down angle-down'></i>
    </a>
    <ul class='nav nav-stacked'>
        <li class=''>
            <a href='yonetici.php?sayfa=odevekle'>
                <i class='icon-caret-right'></i>
                <span>Ödev ekle</span>
            </a>
        </li>
        <li class=''>
            <a href='yonetici.php?sayfa=odevduzen'>
                <i class='icon-caret-right'></i>
                <span>Ödev düzenle</span>
            </a>
        </li>
		
		        <li class=''>
            <a href='yonetici.php?sayfa=odevyoklama'>
                <i class='icon-caret-right'></i>
                <span>Ödev kontrol listesi</span>
            </a>
        </li>
    </ul>
</li>

<li>
    <a class='dropdown-collapse ' href='#'>
        <i class='icon-time'></i>
        <span>Raporlar</span>
        <i class='icon-angle-down angle-down'></i>
    </a>
    <ul class='nav nav-stacked'>
        <li class=''>
            <a href='yonetici.php?sayfa=ogretmenrapor'>
                <i class='icon-caret-right'></i>
                <span>Öğretmen raporları</span>
            </a>
        </li>
        <li class=''>
            <a href='yonetici.php?sayfa=ogrencirapor'>
                <i class='icon-caret-right'></i>
                <span>Öğrenci raporları</span>
            </a>
        </li>
		
		       <li class=''>
            <a href='yonetici.php?sayfa=ogrenciodevrapor'>
                <i class='icon-caret-right'></i>
                <span>Öğrenci odev raporları</span>
            </a>
        </li>
		
    </ul>
</li>






</li>
</ul>
</div>
</nav>