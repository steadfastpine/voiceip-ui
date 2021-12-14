<?php 
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
echo "<b>Sending configs to SPA phones</b><br /><br />";
$result_extension = mysql_query("select macaddress, ipaddress from extension WHERE phone_type='spa' and not macaddress=''") 
or die(mysql_error()); 
while($row_extension = mysql_fetch_array( $result_extension )) {
$mac=$row_extension['macaddress'];
$ipaddress=$row_extension['ipaddress'];
$mac_format_spa=strtoupper($mac);
$mac_format_arp=strtolower($mac);
//echo $mac_format_spa;
//exec('ping -w5 -b 192.168.1.255');
//$ip_phone=exec("arp -a|tr -d ':' |grep $mac_format_arp|cut -f1 -d')'|cut -f2 -d'('");
echo "$ipaddress" . "/administration/resync?tftp://$ip_tftp/spa$mac_format_spa.cfg<br>";
exec("curl $ipaddress/administration/resync?tftp://$ip_tftp/spa$mac_format_spa.cfg");
}
echo "<br /><br />";
?>
