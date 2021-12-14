<?php 
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
mysql_query("delete from operator where panel='$panel'") 
or die(mysql_error()); 
?>
