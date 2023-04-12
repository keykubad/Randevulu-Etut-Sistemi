<section id='content'>
<div class='container-fluid'>
<div class='row-fluid' id='content-wrapper'>
<div class='span12'>
<div class='page-header'>
    <h1 class='pull-left'>
        <i class='icon-dashboard'></i>
        <span>Randevu Sistemi</span>
    </h1>
    <div class='pull-right'>

    </div>
</div>

<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header blue-background'>
            <div class='title'>
                <div class='icon-user'></div>
                Öğrenci Randevu İstek Listesi Yazdırma Menüsü
            </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
	<?php
			$basla		=$_GET["bas"];
			$sonu		=$_GET["sonu"];
		?>
 <div class='box-content'>
            <form class="form form-horizontal" method="get" style="margin-bottom: 0;" action="randevuistekyazdir.php?bas=<?php echo $basla;?>&son=<?php echo $sonu;?>"/><div style="margin:0;padding:0;display:inline">

	
				        <div class='control-group'>
                 <label class='control-label' for='inputPassword4'>Tarihi</label>
                <div class='controls'>
                    <div class='datetimepicker input-append' id='datetimepicker'>
                        <input class='input-medium' name="bas" data-format='dd-MM-yyyy' placeholder='Başlangıç tarihi' type='text' />
            <span class='add-on'>
              <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
            </span>
                    </div>
						&nbsp;&nbsp;&nbsp;ile&nbsp;&nbsp;&nbsp;	 
                    <div class='datetimepicker input-append' id='datetimepicker'>
                        <input class='input-medium' name="son" data-format='dd-MM-yyyy' placeholder='Bitiş tarihi' type='text' />
            <span class='add-on'>
              <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
            </span>
               
                </div>&nbsp;&nbsp;&nbsp;tarihi arası randevu isteklerini yazdır.
                </div>
		
			
            </div>

	
				
	
				
				      <div class='form-actions' style='margin-bottom: 0;'>
						
                       <input class="btn btn-primary btn-large" type="submit" value="Yazdır">
                
                </div>
            </form>
        </div>
    </div>
</div>
</div>






  

</div>


</div>
</div>
</div>
</section>

