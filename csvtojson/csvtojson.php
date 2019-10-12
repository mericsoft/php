<?php
// mericsoft //

function csvjs($filename){
	$file=fopen($filename, "r");  //dosyayı aç
	$ic=fread($file, filesize($filename)); //oku
	$satir=explode("\n", $ic); //satır satır arraya dönüştür
	$baslik=explode(",",$satir[0]);  //başlıkları bir array haline getir
	$satir2=array_shift($satir); //başlıkların buluduğu arrayı sil
	$arraysatir=array(); // satır sayısında kullanacağız
	$sonuc=array(); // sonucu basacağız
	for($i=0;$i<count($satir);$i++){ // satır sayısı kadar
		$arraysatir[$i]=explode(",", $satir[$i]); // her bir satırrdaki virgülle ayrılmıış alanlar arraya dönüşsün
		array_push($sonuc,array_combine($baslik, $arraysatir[$i])); // her yeni array sonuca eklenirken başlılar ile associative hale gelsin
	}

	return json_encode($sonuc,JSON_UNESCAPED_UNICODE); // json formatında bas
}

echo csvjs("test.csv");

?>