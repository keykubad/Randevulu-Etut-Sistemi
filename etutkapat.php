<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden etüt isteklerini açıp kapatabilirsiniz.</small>
            </div>
        </div>
    </div>
</div>
<?php 
if($_POST){
	$sistem		=$_POST["sistem"];
	
	$kayit		=mysql_query("update genelayarlar set etutistek='$sistem' where id='1'");
		if($kayit){
			uyar("İşlem başarıyla gerçekleştirildi");
			git("yonetici.php?sayfa=etutkapat",5);
		}else{
			uyar("HATA!!! İşlem başarısız!!");
			git("yonetici.php?sayfa=etutkapat",5);
		}
	

						
}
$sis		=mysql_fetch_assoc(mysql_query("select * from genelayarlar"));
?>
<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header blue-background'>
            <div class='title'>
                <div class='icon-user'></div>
                Etüt istekleri açma ve kapama menüsü
            </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
		
        <div class='box-content'>
            <form class="form form-horizontal" method="post" style="margin-bottom: 0;" /><div style="margin:0;padding:0;display:inline">
				
				<div class='control-group'>
                    <label class='control-label'>Etüt İstekleri yönetimi</label>
                    <div class='controls'>
                        <select class='span3' name="sistem">
						<option value="1" <?php if($sis["etutistek"]==1){echo "selected";}?>>Sistem Aktif</option>
						<option value="0" <?php if($sis["etutistek"]==0){echo "selected";}?>>Sistem Kapalı</option>
                        </select>
						
                    </div>
                </div>
					<div class='control-group'>
                    <label class='control-label'>Şuanda sistem : </label>
                    <div class='controls'>
						<?php 
						if($sis["etutistek"]==1)
						{
							echo "<strong><font color='green'>Açık</font></strong>";
						}else{
							echo "<strong><font color='red'>Kapalı</font></strong>";
						}
						?>
                    </div>
                </div>
				
				      <div class='form-actions' style='margin-bottom: 0;'>
						
                       <input class="btn btn-primary btn-large" type="submit" value="Ekle">
                
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>