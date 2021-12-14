<?php 
echo "<b>operator panel</b><br/>";
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
echo "op_buttons.cfg<br /><br />"; 
$gen_path="/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/panel/op_buttons.cfg";
$fh = fopen($gen_path, 'w')or die("can't open file /var/lib/voiceipgui/voiceipgui-$versionnumber/modules/panel/op_buttons.cfg");
$result_panel = mysql_query("select distinct panel from operator") 
or die(mysql_error()); 
while($row_panel = mysql_fetch_array( $result_panel )) {
$panel=$row_panel['panel'];
$counter=0;
$result_extension = mysql_query("select extension from operator where panel='$panel'") 
or die(mysql_error()); 
while($row_extension = mysql_fetch_array( $result_extension )) {
$counter=$counter+1;
$extension=$row_extension['extension'];
$result_meta = mysql_query("select setting_sip, firstname, lastname from extension where extension='$extension'") 
or die(mysql_error()); 
while($row_meta = mysql_fetch_array( $result_meta )) {
$firstname=ucfirst($row_meta['firstname']);
$lastname=ucfirst($row_meta['lastname']);
$setting_sip=$row_meta['setting_sip'];
}
$result_settip_sip = mysql_query("select context from setting_sip where setting='$setting_sip'") 
or die(mysql_error()); 
while($row_settip_sip = mysql_fetch_array( $result_settip_sip )) {
$context=$row_settip_sip['context'];
}
$input="[SIP/$extension]
Position=$counter
Label=$extension $firstname $lastname
Extension=$extension
Context=$context
panel_context=$panel
Icon=1
";
fwrite($fh, $input);
}
$input= file_get_contents("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/panel/template.default.conf", FILE_USE_INCLUDE_PATH);
fwrite($fh, $input);
} 
fclose($fh);
//echo "<br />";
?>
