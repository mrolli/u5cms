<?php 
 $file_1='';
 $path='../r/'.$row_a['name'];
     if ($handle = @opendir($path))  { 
     while (false !== ($file = readdir($handle)))  { 
    
	 if ($file_d=='' && str_replace($row_a['name'],'',$file)!=$file) $file_1=$file; 
     if (str_replace($row_a['name'],'',$file)!=$file && str_replace('_100','',$file)!=$file) $file_1=$file;
     
	 }}
?>