
<?php 


// Lecture de listtxt qui contient les URL

if( file_exists("list.txt") ) {

	$urltab = file_get_contents("list.txt");
	$urltab = preg_replace("/\n|\r|\r\n/","",$urltab); // Suppression saut de ligne
	$urltab = explode(",", $urltab);
}



foreach( $urltab as $key => $url ) {

	if( onlineCheck($url) ) echo $url."	 : OK<br>";
	
	else echo $url."	 : ERREUR<br>";
}



//CURL

function onlineCheck($domain){

	$timeout = 10;
	$curlInit = curl_init($domain);
	curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,$timeout);
	curl_setopt($curlInit,CURLOPT_HEADER,true);
	curl_setopt($curlInit,CURLOPT_NOBODY,true);
	curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);
	$reponse = curl_exec($curlInit);
	curl_close($curlInit);
	
	if ($reponse) return true;
	
	return false;
}


 ?>