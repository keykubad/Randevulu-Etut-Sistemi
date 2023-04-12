<section id='content'>

<div class='container-fluid'>

<div class='row-fluid' id='content-wrapper'>

<div class='span12'>

<div class='group-header'>

    <div class='row-fluid'>

        <div class='span6 offset3'>

            <div class='text-center'>

                <strong>Açıklama</strong>

                <small class='muted'>Bu bölümden öğrencilerin mesajlarını okuyabilirsiniz.</small>

            </div>

        </div>

    </div>

</div>

</div>
<center><a href="yonetici.php?sayfa=yoneticiogrencimesaj"><i class="btn btn-success btn-mini" style="font-size:16px;">ÖĞRENCİYE MESAJ YAZ</i></a></center>
<br><div class='row-fluid'>
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header orange-background'>

    <div class='title'>Gelen Mesajlarınız (Yönetici tarafından yazılan cevaplar yeşil renktedir) </div>    
	<div class='actions'> 	
	<a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>        </a>       
	<a href="#" class="btn box-collapse btn-mini btn-link"><i></i>        </a>    </div></div>
	<div class='box-content box-no-padding'><div class='responsive-table'>
	<div class='scrollable-area'>


	<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
	<thead>
	<tr>
      
	<th>        Tarih   </th> 
	<th>        Öğrenci Adı Soyadı   </th> 
 <th>        Konu   </th>	
	<th>        Mesaj    </th>
	<th>        Durum    </th>
	<th>        Kime Ait    </th>
		<th>İşlem</th>
		
	</tr>
	</thead><tbody>  
			
    

	<?php
				$gmesajlar	=mysql_query("select * from mesajlar order by tarih desc");
				while($data=mysql_fetch_assoc($gmesajlar)){
					$konusu	=mb_substr($data["konu"],0,70);
					$kim	=$data["ogrencikim"];
					$tarih	=cevir($data["tarih"]);
					$mesaj	=mb_substr($data["mesaj"],0,70);
					$mesajid=$data["mid"];
					$okunma	=$data["yoneticioku"];
					$gonderme	=$data["gonderilen"];
					$kimden	=mysql_fetch_assoc(mysql_query("select * from kullanici where id='$kim'"));
	?>
	
	<tr style='<?php if($gonderme==0){echo 'background-color:#008000';}?>'>
	
		<td><?php echo $tarih;?></td>
		<td><?php echo $kimden["adsoyad"];?></td>
			<td><?php echo $konusu;?></td>
		<td><?php echo $mesaj;?></td>
		<td><?php if($okunma=="1"){echo "Okundu";}else{echo "Okunmamış";};?></td>
		<td><?php if($gonderme==0){echo "Yönetici";}else{echo "Öğrenci";};?></td>
		<td><center> <a href="yonetici.php?sayfa=yoneticimesajoku&id=<?php echo $mesajid;?>"><i class="btn btn-success btn-mini" style="font-size:16px;">OKU</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php if($gonderme==1){ echo '<a href="yonetici.php?sayfa=yoneticimesajyaz&kim='.$kim.'"><i class="btn btn-success btn-mini" style="font-size:16px;">CEVAPLA</i>';}?></a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="yonetici.php?sayfa=yoneticimesajsil&id=<?php echo $mesajid;?>"><i class="btn btn-warning btn-mini" style="font-size:16px;">Mesajı SİL</i></a></center></td>
</tr>
			<?php
			}
			?>





		</tbody></table>
	
	
		
		</div></div></div></div></div>
</div>

</section>

