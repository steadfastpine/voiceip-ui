<table class="extensions" border="0" cellspacing="0">
<tr><th></th><th>user name</th></tr>

<?php 
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$result = mysql_query("select id, user_name from users") or die(mysql_error()); 
while($row = mysql_fetch_array( $result )) {
    echo "<tr><td><form method=\"POST\" action=\"/voiceip/administration/users/\" ><input value=\"users_edit\" name=\"users_edit\" type=\"hidden\" ><input type=\"hidden\" value=\"". $row['user_name']."\" name=\"update_user_name\" /><input type=\"hidden\" value=\"". $row['id']."\" name=\"update_user_id\" /><input type=\"submit\" class=\"cellfacing\" value=\"edit\"></form></td><td>" . $row['user_name'] . "</td></tr>";
} 
?>

</table>
