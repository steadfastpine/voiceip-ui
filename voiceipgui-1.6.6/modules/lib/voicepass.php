<?php 
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
// Get all the data from the "example" table
$result = mysql_query("select extension from extension where voicemailcfg='on'");
while($row_extension = mysql_fetch_array( $result )) {
$extension=$row_extension['extension'];
#echo "$extension". "<br>";
$vstring=exec("cat /etc/asterisk/voicemail.conf |grep \"$extension => \"") . "<br>";
$vvars=explode(",",$vstring);
#echo $vvars[0] . "<br>";
$vvars=explode("=> ",$vvars[0]);
$pass=$vvars[1];
mysql_query("update extension set voicepass='$pass' where extension=$extension");
}
?>
