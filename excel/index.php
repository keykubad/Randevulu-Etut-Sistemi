<?php
// Test CVS
require_once 'Excel/reader.php';

// ExcelFile($filename, $encoding);
$data = new Spreadsheet_Excel_Reader();

// Set output Encoding.
$data->setUTFEncoder('iconv'); // iconv metoduyla dil cevrimini sagliyoruz
$data->setOutputEncoding('ISO-8859-9'); //turkce dil kodlamasý
//$data->setOutputEncoding('CP1251');

$data->read('demo.xls'); // demo.xls dosyasý okunuyor

/*
Ornek veri okuma fonksiyonlari
 $data->sheets[0]['numRows'] - 
 $data->sheets[0]['numCols'] - sutun sayisi
 $data->sheets[0]['cells'][$i][$j] - data from $i-row $j-column

 $data->sheets[0]['cellsInfo'][$i][$j] - extended info about cell
    
    $data->sheets[0]['cellsInfo'][$i][$j]['type'] = "date" | "number" | "unknown"
        if 'type' == "unknown" - use 'raw' value, because  cell contain value with format '0.00';
    $data->sheets[0]['cellsInfo'][$i][$j]['raw'] = value if cell without format 
    $data->sheets[0]['cellsInfo'][$i][$j]['colspan'] 
    $data->sheets[0]['cellsInfo'][$i][$j]['rowspan'] 
*/



$satir=$data->sheets[0]['numRows']; //satir sayisi
$sutun=$data->sheets[0]['numCols'];//sutun sayisi

echo "<b>Satýr sayýsý: ".$satir;

echo "<br>Sütun sayýsý: ".$sutun ."</b><br>";

for($i = 2; $i<=$data->sheets[0]["numRows"]; $i++) {

        echo $data->sheets[0]['cells'][$i][1]."<br>";
       echo $data->sheets[0]['cells'][$i][2]."<br>";
			
	
}
?>