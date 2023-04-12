<?php
//error_reporting(E_ALL);
#baglantı degiskenleri

	$host		="localhost";
	$kullanici	="hisarcik_ne234";
	$sifre		="123ewq**";
	$veritabani	="hisarcik_etutsistem";
	
#veritabani baglanti
	$baglan=mysql_connect($host,$kullanici,$sifre) or die (mysql_error());
#veritabani sec
	mysql_select_db($veritabani,$baglan) or die (mysql_error());
#karakter sec
	mysql_query("SET NAMES 'UTF8'");
	mysql_query("SET character_set_connection = 'UTF8'");
	mysql_query("SET character_set_client = 'UTF8'");
	mysql_query("SET character_set_results = 'UTF8'"); 
	
	

?>