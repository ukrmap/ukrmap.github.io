<?php
$dir = './';
$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) { //echo substr($filename, -5); echo '<br>';
	if(is_file($filename) && (substr($filename, -4) == '.htm' || substr($filename, -5) == '.html') && strpos($filename, '-utf.htm') === false){
		echo $filename; echo '<br>';
		
		$contents = file_get_contents($filename);
		
		/*if(substr($filename, -5) == '.html'){
			rename($filename, str_replace('.html', '.htm', $filename));
			$filename = str_replace('.html', '.htm', $filename);
		}*/
		
		//$contents = iconv('UTF-8', 'windows-1251', $contents);
		$contents = iconv('windows-1251', 'UTF-8', $contents);
		/*while(($start = strpos($contents, '<!--')) && ($finish = strpos($contents, '-->')) && ($finish>$start)){
			//echo $filename.' [START]'.$start.' [FINISH]'.$finish.'<br>';
			$contents = substr_replace($contents, '', $start, $finish-$start+3);
		}*/
		//$contents = str_replace('</body>', "", $contents);
		//$contents = str_replace('</html>', "", $contents);
		
		//$content = preg_replace("/<body[^<>]*>/", "<body>", $contents);
		
		//$contents = substr_replace($contents, '', 0, (strpos($contents, '<body>')+6));
		
		$new_filename = str_replace('.htm', '-utf.htm', $filename);
		$file_ru = fopen($new_filename, "w+");
	 	fwrite($file_ru, $contents);
	 	fclose($file_ru);
	}	
}

	
?>