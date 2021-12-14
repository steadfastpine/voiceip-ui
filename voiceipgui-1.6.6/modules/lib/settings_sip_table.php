<?php 
// Make a MySQL Connection
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
// Get all the data from the "example" table
$result = mysql_query("select id, setting, password, callerid, type, host, context, qualify, port, nat, canreinvite, dtmfmode, allow, insecure, fromuser, incominglimit, callgroup, pickupgroup from setting_sip order by setting") 
or die(mysql_error()); 
echo '<table class="extensions" border="0" cellspacing="0">';
echo "<tr><th></th><th>setting&nbsp;name</th><th>allow</th><th>callerid</th><th>callgroup</th><th>canreinvite</th><th>dtmfmode</th><th>fromuser</th><th>insecure</th><th>pickupgroup</th><th>port</th><th>qualify</th><th>type</th></tr>";
// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $result )) {
	// Print out the contents of each row into a table
echo "<tr><td><form method=\"POST\" action=\"/voiceip/administration/settings/sip/\" ><input type=\"hidden\" value=\"settings_sip\" name=\"page\" /><input type=\"hidden\" value=\"settings_sip_edit\" name=\"settings_sip_edit\" /><input type=\"hidden\" value=\"". $row['id']."\" name=\"id\" /><input type=\"submit\" class=\"cellfacing\" value=\"edit\"></form></td>";
echo "<td>" . $row['setting'] . "</td><td>" . $row['allow'] . "</td><td>" . $row['callerid'] . "</td><td>" . $row['callgroup'] . "</td><td>" . $row['canreinvite']. "</td><td>" . $row['dtmfmode']. "</td><td>" . $row['fromuser']. "</td><td>" . $row['insecure']. "</td><td>" . $row['pickupgroup']. "</td><td>" . $row['port']. "</td><td>" . $row['qualify'] . "</td><td>" . $row['type'] . "</td></tr>";
} 
//<td>" . $row['setting'] . "</td><td>" . $row['operator'] . "</td>
echo "</table>";
?>
