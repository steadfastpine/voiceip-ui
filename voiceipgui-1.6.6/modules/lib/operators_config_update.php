<?php 
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
mysql_query("delete from operator where panel='$panel'") 
or die(mysql_error()); 
$counter=0;
while ($counter<100){
$counter=$counter+1;
$extension=$_POST["operator$counter"];
if (! $extension==''){
//echo "adding $extension to $panel<br />";
mysql_query("insert into operator (panel, extension) values ('$panel','$extension')") 
or die(mysql_error()); 
}
}
?>
