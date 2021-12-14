<?php 
$id=$_POST["id"];

//echo "--extensions--update--";





$result = mysql_query("update extension set gmtoffset='$gmtoffset', missedcalls='$missedcalls', nat='$nat', ipaddress='$ipaddress', macaddress='$macaddress', secret='$secret', cidcfg='$cidcfg', context='$context', line='$line', site='$site', extension='$extension', mailbox='$mailbox', label='$label', agent='$agent', firstname='$firstname', lastname='$lastname', email='$email', did='$did', setting='$setting', voicepass='$voicepass', modified='1', phonecfg='$phonecfg', directorycfg='$directorycfg', voicemailcfg='$voicemailcfg', iaxcfg='$iaxcfg', sipcfg='$sipcfg', phone_type='$phone_type', setting_sip='$setting_sip', setting_polycom='$setting_polycom', setting_spa='$setting_spa' WHERE id='$id';") 
or die(mysql_error()); 
?>
