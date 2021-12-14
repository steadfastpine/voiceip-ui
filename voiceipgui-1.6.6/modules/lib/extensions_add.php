<?php 
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
if (empty($extension)){
$result_fill = mysql_query("select extension from extension order by extension desc limit 1;");
while($row_extension = mysql_fetch_array( $result_fill )) {
$extension=$row_extension['extension'] + 1;
}
}
if (empty($line)){
$line="1";
}
if (empty($phone_type)){
$phone_type="polycom";
}

$secret=randString(20);
$result = mysql_query("insert into extension (macaddress, line, site, extension, mailbox, label, agent, firstname, lastname, email, did, setting, voicepass, modified, phonecfg, directorycfg, voicemailcfg, sipcfg, setting_sip, setting_polycom, setting_spa, phone_type, secret, cidcfg, context) values ('$macaddress','$line','local','$extension','$extension','$extension','$agent','$firstname','$lastname','$email','$did','default','1234','1','on','on','on','on','default','default','default','$phone_type','$secret','on','from-sip')");
$result_id = mysql_query("select id from extension where extension='$extension'") 
or die(mysql_error());
while($row_extension = mysql_fetch_array( $result_id )) {
$id=$row_extension['id'];
}
?>
