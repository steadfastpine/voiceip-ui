<?php 
// Make a MySQL Connection
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
?>
<h2><?php echo $update_user_name;?></h2>
<div class="users_edit">
    <div class="box010">
        <form method="POST" action="/voiceip/administration/users/" enctype="multipart/form-data">
        <input value="users_update" name="users_update" type="hidden" >
        <input value="users_edit" name="users_edit" type="hidden" >
        <input type="hidden" name="update_user_name" value="<?php echo $update_user_name;?>">
        <input type="hidden" name="update_user_id" value="<?php echo $update_user_id;?>">
        <input value="" name="password_change" type="password" > new password<br /><br />
        <input value="" name="password_confirm" type="password" > confirm password<br /><br />
    </div>
</div>
<div class="extension_edit03">
    <div class="box010">
        <input class="button_update" type="submit" value="update" >
        </form>
    </div>
</div>
