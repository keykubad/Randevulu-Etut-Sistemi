<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='page-header'>
    <h1 class='pull-left'>
        <i class='icon-dashboard'></i>
        <span>Çıkış yapılıyor</span>
    </h1>

</div>
<?php 
session_destroy();
uyar("Çıkış işlemi gerçekleştiriliyor.Lütfen Bekleyiniz...");
git("index.php",3);
?>

</div>
</div>
</div>

</section>