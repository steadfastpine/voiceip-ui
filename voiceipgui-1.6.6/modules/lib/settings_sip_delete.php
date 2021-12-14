<?php 
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$result_setting = mysql_query("select setting from setting_sip WHERE id='$id'") 
or die(mysql_error()); 
while($row_setting = mysql_fetch_array( $result_setting )) {
$setting=strtolower($row_setting['setting']);
}
//echo "Setting $setting deleted";
$result = mysql_query("delete from setting_sip WHERE id='$id';") 
or die(mysql_error()); 
?>
