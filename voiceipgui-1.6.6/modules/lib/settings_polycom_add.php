<?php 
$time=exec('date +%s');
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
// Get all the data from the "example" table

//$estimate_ip=exec("/sbin/ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'");

$result = mysql_query("insert into setting_polycom (setting, callbackmode, callback, voipprot1, voipprot2, sntpaddress, gmtoffset, loglevelchange, sipoutboundproxy, idleimage500, idleimage600, idledisplay, idledisplayip, missedcalls, homepage, modified, volume, voicevolumepersisthandsfree, voicevolumepersistheadset, upanalogHeadsetOption, voicegainrxdigitalchassisIP_650, voicegainrxdigitalchassis, voicegainrxanalogchassis, voicegainrxanalogchassisIP_650, voicegainrxdigitalringerIP_650, voicegainrxdigitalheadset, voicevolumepersisthandset) values ('new-$time','contact','299','$estimate_ip','','pool.ntp.org','-28000','','','','','','','on','','','','1','1','1','','','','','','','1')");
$result_id = mysql_query("select id from setting_polycom where setting='new-$time'") 
or die(mysql_error());
while($row_extension = mysql_fetch_array( $result_id )) {
$id=$row_extension['id'];
}
?>
