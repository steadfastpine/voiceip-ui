<?php 
$ftpdir="/home/PlcmSpIp";
copy("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/output/sip.auto.conf", "/etc/asterisk/sip.auto.conf");
copy("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/output/voicemail.conf", "/etc/asterisk/voicemail.conf");
copy("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/output/did.auto.conf", "/etc/asterisk/did.auto.conf");
copy("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/output/cid.auto.conf", "/etc/asterisk/cid.auto.conf");
copy("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/output/iax.auto.conf", "/etc/asterisk/iax.auto.conf");
function recurse_copy($src,$dst) { 
 $dir = opendir($src); 
 @mkdir($dst); 
 while(false !== ( $file = readdir($dir)) ) { 
 if (( $file != '.' ) && ( $file != '..' )) { 
 if ( is_dir($src . '/' . $file) ) { 
 recurse_copy($src . '/' . $file,$dst . '/' . $file); 
 } 
 else { 
 copy($src . '/' . $file,$dst . '/' . $file); 
 } 
 } 
 } 
 closedir($dir); 
} 
recurse_copy("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/output/polycom","$ftpdir");
?>
