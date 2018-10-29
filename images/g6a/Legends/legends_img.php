<?php
$dir = './';
$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
	if(is_file($filename) && substr($filename, -4) == '.htm'){
		$html = file_get_contents($filename);
		$html = preg_replace("/(src=(?:\"|'))([^\/])/", "$1/$2", $html);
		
		
		$file = fopen($filename, "w+");
	 	fwrite($file, $html);
	 	fclose($file);
		
		
	}
  
}







?>