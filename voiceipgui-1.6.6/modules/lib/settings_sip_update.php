<?php 
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$result = mysql_query("update setting_sip set setting='$setting', password='$password', callerid='$callerid', type='$type', host='$host', context='$context', qualify='$qualify', port='$port', nat='$nat', canreinvite='$canreinvite', dtmfmode='$dtmfmode', allow='$allow', insecure='$insecure', fromuser='$fromuser', incominglimit='$incominglimit', callgroup='$callgroup', pickupgroup='$pickupgroup', modified='$modified' WHERE (id='$id')") 
or die(mysql_error()); 


$result = mysql_query("update extension set modified='1' where setting_sip='$setting'") 
or die(mysql_error()); 
?>
