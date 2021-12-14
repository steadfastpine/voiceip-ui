<?php 
// Make a MySQL Connection
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
// Get all the data from the "example" table
$result = mysql_query("select id, setting, callback, callbackmode, gmtoffset, homepage, idledisplay, idledisplayip, idleimage500, idleimage600, loglevelchange, modified, sipoutboundproxy, sntpaddress, voipprot1, voipprot2, volume, voicevolumepersisthandsfree, upanalogHeadsetOption, voicegainrxdigitalchassisIP_650, voicegainrxdigitalchassis, voicegainrxanalogchassis, voicegainrxanalogchassisIP_650, voicegainrxdigitalringerIP_650, voicegainrxdigitalheadset, voicevolumepersistheadset from setting_polycom order by setting") 
or die(mysql_error()); 
echo '<table class="extensions" border="0" cellspacing="0">';
echo "<tr><th></th><th>profile name</th><th>callback</th><th>callbackmode</th><th>sip proxy 1</th><th>sip proxy 2</th><th>time server</th></tr>";
// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $result )) {
	// Print out the contents of each row into a table
echo "<tr><td><form method=\"POST\" action=\"/voiceip/administration/settings/polycom/\" ><input type=\"hidden\" value=\"settings-polycom\" name=\"page\" /><input type=\"hidden\" value=\"settings_polycom_edit\" name=\"settings_polycom_edit\" /><input type=\"hidden\" value=\"". $row['id']."\" name=\"id\" /><input type=\"submit\" class=\"cellfacing\" value=\"edit\"></form></td>";
echo "<td>" . $row['setting'] . "</td><td>" . $row['callback'] . "</td><td>" . $row['callbackmode'] . "</td><td>" . $row['voipprot1'] . "</td><td>" . $row['voipprot2']. "</td><td>" . $row['sntpaddress'] . "</td></tr>";
} 
//<td>" . $row['setting'] . "</td><td>" . $row['operator'] . "</td>
echo "</table>";
?>
