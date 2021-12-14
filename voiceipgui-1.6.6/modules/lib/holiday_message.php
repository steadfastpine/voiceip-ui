<?php 
$holiday_update=$_POST['holiday_update'];
require "/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/ami/AsteriskManager.php" ;
$params = array('server' => '127.0.0.1', 'port' => '5038');
$ast = new Net_AsteriskManager($params);
$ast->connect();
$ast->login("$manager_user", "$manager_pass");
// update closed variable from button press
if ($holiday_update == "on") {
    $ast->command('database put closed 1 1');
}
if ($holiday_update == "off") {
    $ast->command('database put closed 1 0');
}
// get current state of closed variable
$return_var = $ast->command('database show closed/1');
// configure images
$image_on="blank";
$image_off="blank";
$pos = strpos($return_var,": 0");
if($pos === false) {
 $holiday_current="on";
 $holiday_other="off";
}
else {
 $holiday_current="off";
 $holiday_other="on";
}
?>
<table class="operators" border="0" cellspacing="0">
<tr><th>Options</th></tr>
<tr class="operator_row"><td>
<form method="POST" action="" enctype="multipart/form-data">
<select name="holiday_update" >
<option value="<?php echo $holiday_current; ?>" ><?php echo $holiday_current; ?></option>
<option value="<?php echo $holiday_other; ?>" ><?php echo $holiday_other; ?></option>
</select>
<input type="submit" value="Update" >
<input type="hidden" value="holiday-message" name="page" >
</form>
</td>
</tr>
</table>
