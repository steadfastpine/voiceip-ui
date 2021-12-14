<?php 
$time=exec('date +%s');
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());


$insecure=no;
$qualify=yes;
$incominglimit=10;
$callerid=on;
$type=friend;
$host=dynamic;




$result = mysql_query("insert into setting_sip (setting, password, callerid, type, host, context, qualify, port, nat, canreinvite, dtmfmode, allow, insecure, fromuser, incominglimit, callgroup, pickupgroup) values ('new-$time','$random_string','$callerid','$type','$host','from-sip','$qualify','5060','$nat','$canreinvite','$dtmfmode','$allow','$insecure','$fromuser','$incominglimit','','')");
$result_id = mysql_query("select id from setting_sip where setting='new-$time'") or die(mysql_error());
while($row_extension = mysql_fetch_array( $result_id )) {
    $id=$row_extension['id'];
}
?>
