<section id='content'>

<div class='container-fluid'>

<div class='row-fluid' id='content-wrapper'>

<div class='span12'>

<div class='group-header'>

    <div class='row-fluid'>

        <div class='span6 offset3'>

            <div class='text-center'>

                <strong>Açıklama</strong>

                <small class='muted'>Bu bölümden idare'ye acil mesajlarınızı iletebilirsiniz.</small>

            </div>

        </div>

    </div>

</div>

<?php

if($_POST){
		$ogrenci		=$_POST["ogrenci"];
		$konu			=$_POST["konu"];
		$tarih			=date("Y-m-d");
		$mesaj			=$_POST["mesaj"];
		
		$kaydet		=mysql_query("insert into mesajlar (ogrencikim,tarih,mesaj,konu,okunma,gonderilen) 
		values('$ogrenci','$tarih','$mesaj','$konu',0,1)");
			if($kaydet){
				uyar("Mesajınız idareye iletilmiştir..");
				git("ogrenci.php",8);
			}else{
				uyar("Hata meydana geldi lütfen idareye bildiriniz.");
				git("ogrenci.php",4);
			
			}
}
?>

<div class='row-fluid'>

    <div class='span12 box'>

        <div class='box-header blue-background'>

            <div class='title'>

                <div class='icon-user'></div>

                Mesajlaşma Formu

            </div>

            <div class='actions'>

                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>

                </a>

                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>

                </a>

            </div>

        </div>
		
		<?php
			$m		=mysql_fetch_assoc(mysql_query("select * from kullanici where kullaniciadi='".$_SESSION["kul"]."'"));
		
		?>
		

        <div class='box-content'>

            <form class="form form-horizontal" method="post" style="margin-bottom: 0;" /><div style="margin:0;padding:0;display:inline">

                                <div class='control-group'>

                    <label class='control-label'>Ad soyad</label>

                    <div class='controls'>

                        <select class='span3' name="ogrenci">

						<option value="<?php echo $m["id"];?>"><?php echo $m["adsoyad"];?></option>

                        </select>

                    </div>

                </div>
				
		 <div class='control-group'>                   
				 <label class='control-label'>Konu</label>                    
				 <div class='controls'>                       
				 <input class='input-block-level' name="konu" type='text' />	
				 </div>				
				 </div>
          
				


                <div class='control-group'>
                    <label class='control-label' for='inputTextArea1'>Mesajınız</label>
                    <div class='controls'>
                        <textarea id='inputTextArea1' placeholder='Mesajınız' rows='7' name="mesaj" style="width:700px;"></textarea>
                    </div>
                </div>
				

				

				      <div class='form-actions' style='margin-bottom: 0;'>

						

                       <input class="btn btn-primary btn-large" type="submit" value="Gönder">

                

                </div>

            </form>

        </div>

    </div>

</div>

</div>

</div>
<div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>

    <div class='title'>Gelen Mesajlarınız  </div>    
	<div class='actions'> 	
	<a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>        </a>       
	<a href="#" class="btn box-collapse btn-mini btn-link"><i></i>        </a>    </div></div>
	<div class='box-content box-no-padding'><div class='responsive-table'>
	<div class='scrollable-area'>


	<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
	<thead>
	<tr>
      
	<th>        Tarih   </th> 
 <th>        Konu   </th>	
	<th>        Mesaj    </th>
	<th>        Durum   </th>
		<th>İşlem</th>
		
	</tr>
	</thead><tbody>  
			
    

	<?php
				$gmesajlar	=mysql_query("select * from mesajlar where gonderilen='0' and ogrencikim='".$kim["id"]."'");
				while($data=mysql_fetch_assoc($gmesajlar)){
					$konusu	=mb_substr($data["konu"],0,70);
					$tarih	=cevir($data["tarih"]);
					$mesaj	=mb_substr($data["mesaj"],0,70);
					$mesajid=$data["mid"];	
					$durum	=$data["okunma"];
	?>
	<tr>
	
		<td><?php echo $tarih;?></td>
			<td><?php echo $konusu;?></td>
		<td><?php echo $mesaj;?></td>
		<td><?php if($durum==1){echo "Okundu";}else{echo "Okunmadı";}?></td>
		<td><center> <a href="ogrenci.php?sayfa=ogrencimesajoku&id=<?php echo $mesajid;?>"><i class="btn btn-success btn-mini" style="font-size:16px;">OKU</i></a></center></td>
</tr>
			<?php
			}
			?>





		</tbody></table>
	
	
		
		</div></div></div></div></div>
</div>

</section>

