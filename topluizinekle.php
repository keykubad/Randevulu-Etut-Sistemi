<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='group-header'>
    <div class='row-fluid'>
        <div class='span6 offset3'>
            <div class='text-center'>
                <strong>Açıklama</strong>
                <small class='muted'>Bu bölümden öğretmenlere toplu izin ekleyebilirsiniz.</small>
            </div>
        </div>
    </div>
</div>
<?php
$exceldosyacek		=mysql_fetch_assoc(mysql_query("select * from dosya order by did desc limit 1"));
if($_POST["calistir"]){

//excel verilerini okuma kısmı

// Test CVS
require_once 'excel/Excel/reader.php';

// ExcelFile($filename, $encoding);
$data = new Spreadsheet_Excel_Reader();

// Set output Encoding.
$data->setUTFEncoder('iconv'); // iconv metoduyla dil cevrimini sagliyoruz
$data->setOutputEncoding('ISO-8859-9'); //turkce dil kodlaması
//$data->setOutputEncoding('CP1251');

$data->read(''.$exceldosyacek["dosyaad"].''); // demo.xls dosyası okunuyor



$satir=$data->sheets[0]['numRows']; //satir sayisi
$sutun=$data->sheets[0]['numCols'];//sutun sayisi


	for($i = 2; $i<=$data->sheets[0]["numRows"]; $i++) {

			$kullanicikim		=trim($data->sheets[0]['cells'][$i][1]);
			$baslangictarih		=trim($data->sheets[0]['cells'][$i][2]);
			$bitistarih			=trim($data->sheets[0]['cells'][$i][3]);
			
			$baslangictarih		=str_replace("/","-",$baslangictarih);
			$bitistarih			=str_replace("/","-",$bitistarih);
		

			$baslangictarih		= strtotime("-1 days", strtotime($baslangictarih));//bir gün eksilt	
			$bitistarih			= strtotime("-1 days", strtotime($bitistarih));//bir gün eksilt	
			//strtotime bug giderme boş değerler null yapılıyor
			 if ($bitistarih>0){
			 $bitistarih			= date('Y-m-d' , $bitistarih );
			 }else{
			 $bitistarih=null;
			 }
			if ($baslangictarih>0){
			 $baslangictarih		= date('Y-m-d' , $baslangictarih );
			 }else{
			 $baslangictarih=null;
			 }
			//izinlere kayıt edelim
			if((!$bitistarih=="") or (!$baslangictarih=="")){
			$kimbakalim			=mysql_fetch_assoc(mysql_query("select * from kullanici where kullaniciadi='$kullanicikim' "));			
			$kimoldu			=$kimbakalim["id"];
			
		
			$izinler			=mysql_query("insert into izinler (izogretmenid,bastarih,sontarih) values
			('$kimoldu','$baslangictarih','$bitistarih')");
			
			}
				
	}
	
				if($izinler){
					uyar("Tüm izinler sisteme başarıyla eklendi!");
					git("yonetici.php?sayfa=topluizinekle",5);
				}else{
					uyar("HATA !!! izinler sisteme eklenemedi!");
					git("yonetici.php?sayfa=topluizinekle",5);
				}
}

//excel dosyasını yükleme kısmı 
if($_POST["dosya"]){

$dosya			=$_FILES["excel"]["tmp_name"];


					$resimadioyna	=md5(rand(0,10000));
					$resimyuklenme	=$resimadioyna."_".$_FILES['excel']['name'];
					$resimboyut		=$_FILES['excel']['size'];
					$resimtipi		=$_FILES['excel']['type'];
					//resim kontrol
					if(strpos(!$resimtipi,"xls")){
						uyar("HATA!!","Yüklemeye çalıştığınız dosya excel formatında değildir.");
						exit();
					}else{
					
						$yuklenenresim	 = "yuklenenler/excel/" .$resimyuklenme;
						copy($dosya,$yuklenenresim);
						
						$kaydet		=mysql_query("insert into dosya (dosyaad)
						values ('$yuklenenresim')");
							if($kaydet){
								uyar("Kayıt işlemi başarılı!");
								git("yonetici.php?sayfa=topluizinekle",5);
							}else{
								uyar("HATA!! Kayıt işlemi sırasında mysql hatası oluştu.!");
								git("yonetici.php?sayfa=topluizinekle",5);
							}
					}
	}				

?>
<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header blue-background'>
            <div class='title'>
                <div class='icon-user'></div>
                Toplu izin ekleme menüsü
            </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content'>
            <form class="form form-horizontal" method="post" style="margin-bottom: 0;" enctype="multipart/form-data"/><div style="margin:0;padding:0;display:inline">
            
				
				 <div class='control-group'>
                    <label class='control-label'>Yüklenen dosya adı</label>
                    <div class='controls'>
                        <input class='input-block-level' name="dosyaad" value='<?php echo $exceldosyacek["dosyaad"];?>' type='text' />
						<small>Yüklediğiniz dosya adı türkçe karakter içermemelidir.örnekteki gibi ekleyiniz.<a href="excel/demo.xls">Demo excel dosyası indir</a></small>
                    </div>
					
                </div>
				
				<div class='control-group'>
             <label class='control-label' for='inputPassword4'>Excel dosyanızı ekleyiniz</label>
            <div class='controls'>
                <input title='Dosya mutlaka xls uzantılı excel dosyası olmalıdır' type='file' name="excel"/>
            </div>
        </div>
				
				
				      <div class='form-actions' style='margin-bottom: 0;'>
						
                       <input class="btn btn-primary btn-large" name="dosya" type="submit" value="Yükle">
                <input class="btn btn-primary btn-large" name="calistir" type="submit" value="İzinleri Ekle">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
