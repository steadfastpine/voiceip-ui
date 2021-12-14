<?php 
// Make a MySQL Connection
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
// Get all the data from the "example" table
$result = mysql_query("select distinct panel from operator") 
or die(mysql_error()); 
echo '<table class="extensions" border="0" cellspacing="0">';
echo "<tr><th></th><th>panel name</th></tr>";
// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $result )) {
	// Print out the contents of each row into a table
echo "<tr><td><form method=\"POST\" action=\"/voiceip/administration/operators/\" ><input value=\"operators\" name=\"page\" type=\"hidden\" >
<input value=\"operator_edit\" name=\"operator_edit\" type=\"hidden\" ><input type=\"hidden\" value=\"". $row['panel']."\" name=\"panel\" /><input type=\"submit\" class=\"cellfacing\" value=\"edit\"></form></td>";
echo "<td>" . $row['panel'] . "</td></tr>";
} 
//<td>" . $row['setting'] . "</td><td>" . $row['operator'] . "</td>
echo "</table>";
?>
