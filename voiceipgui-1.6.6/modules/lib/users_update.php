<?php 
if ($password_change==$password_confirm){
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$result = mysql_query("update users set password='$password_change' where id='$update_user_id'") 
or die(mysql_error()); 
echo "Password updated<br/><br/>";
}else{
echo "Password and confirmation do not match<br/><br/>";
}
?>
