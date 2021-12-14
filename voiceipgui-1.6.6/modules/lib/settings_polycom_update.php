<?php 
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$result = mysql_query("update setting_polycom set setting='$setting', callbackmode='$callbackmode', callback='$callback', voipprot1='$voipprot1', voipprot2='$voipprot2', homepage='$homepage', sntpaddress='$sntpaddress', gmtoffset='$gmtoffset', volume='$volume', loglevelchange='$loglevelchange', idleimage500='$idleimage500', idleimage600='$idleimage600', idledisplay='$idledisplay', idledisplayip='$idledisplayip', missedcalls='$missedcalls', modified='$modified', voicevolumepersisthandsfree='$voicevolumepersisthandsfree', upanalogHeadsetOption='$upanalogHeadsetOption', voicegainrxdigitalchassisIP_650='$voicegainrxdigitalchassisIP_650', voicegainrxdigitalchassis='$voicegainrxdigitalchassis', voicegainrxanalogchassis='$voicegainrxanalogchassis', voicegainrxanalogchassisIP_650='$voicegainrxanalogchassisIP_650', voicegainrxdigitalringerIP_650='$voicegainrxdigitalringerIP_650', voicegainrxdigitalheadset='$voicegainrxdigitalheadset', voicegainrxdigitalhandset='$voicegainrxdigitalhandset', voicegainrxdigitalheadset='$voicegainrxdigitalheadset', voicevolumepersistheadset='$voicevolumepersistheadset', voicevolumepersisthandset='$voicevolumepersisthandset' WHERE (id='$id')") 
or die(mysql_error()); 



$result = mysql_query("update extension set modified='1' where (setting_polycom='$setting')") 
or die(mysql_error()); 
?>
