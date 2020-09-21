
<?php 


// Lecture de listtxt qui contient les URL

if( file_exists("list.txt") ) {

	$urltab = file_get_contents("list.txt");
	$urltab = preg_replace("/\n|\r|\r\n/","",$urltab); // Suppression saut de ligne
	$urltab = explode(",", $urltab);
}


// HEADER

foreach( $urltab as $key => $url ) {

	$file_headers = @get_headers($url);
	
	if ( !$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found' ) echo $url."	 : 404<br>";
	
	else echo $url."	 : OK<br>";
}






 ?>