<?php 
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$result_extension = mysql_query("select extension from extension WHERE id='$id'") 
or die(mysql_error()); 
while($row_extension = mysql_fetch_array( $result_extension )) {
$extension=strtolower($row_extension['extension']);
}
// echo "Extension $extension deleted<br />";
// Get all the data from the "example" table
$result = mysql_query("delete from extension WHERE id='$id';") 
or die(mysql_error());
?>
