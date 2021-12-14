<?php 
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$result = mysql_query("select id, setting, password, callerid, type, host, context, qualify, port, nat, canreinvite, dtmfmode, allow, insecure, fromuser, incominglimit, callgroup, pickupgroup from setting_sip WHERE (id=$id)") 
or die(mysql_error()); 
while($row_setting = mysql_fetch_array( $result )) {
echo "
<div class=\"extension_edit\">
<form method=\"POST\" action=\"/voiceip/administration/settings/sip/\" enctype=\"multipart/form-data\">

<div class=\"box009\">
<input type=\"text\" name=\"setting\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['setting'] ."\"> <strong>Profile</strong><br><br>
<input type=\"text\" name=\"host\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['host'] ."\"> host<br>
<input type=\"text\" name=\"port\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['port'] ."\"> port<br>
<input type=\"text\" name=\"qualify\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['qualify'] ."\"> qualify<br>
</div>




<input value=\"". $row_setting['id'] ."\" name=\"id\" type=\"hidden\" >
<input value=\"settings_sip_edit\" name=\"settings_sip_edit\" type=\"hidden\" >
<input value=\"settings-sip\" name=\"page\" type=\"hidden\" >
<input value=\"settings_sip_update\" name=\"settings_sip_update\" type=\"hidden\" >

<div class=\"box009\">";
$codex=array(all, g723, gsm, ulaw, alaw, g726, adpcm, slin, lpc10, g729, speex, ilbc);
echo "<select name=\"allow\" >
<option value=\"". $row_setting['allow'] ."\">". $row_setting['allow'] ."</option>";
foreach ($codex as $i){
echo "<option value=\"$i\" size=\"20\" >$i</option>";
}
unset($i);
echo "<option value=\"\" size=\"20\" ></option>";
echo "</select> allow<br>
<select name=\"callgroup\" >
<option value=\"". $row_setting['callgroup'] ."\">". $row_setting['callgroup'] ."</option>";
$cgrouplist=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
foreach ($cgrouplist as $i){
echo "<option value=\"$i\" size=\"20\" >$i</option>";
}
echo "<option value=\"\" size=\"20\" ></option>
</select> callgroup<br>
<select name=\"callerid\" >
<option value=\"". $row_setting['callerid'] ."\">". $row_setting['callerid'] ."</option>
<option value=\"on\" size=\"20\" >on</option>
<option value=\"\" size=\"20\" ></option>
</select> callerid<br>
<select name=\"incominglimit\" >
<option value=\"". $row_setting['incominglimit'] ."\">". $row_setting['incominglimit'] ."</option>";
foreach ($cgrouplist as $i){
echo "<option value=\"$i\" size=\"20\" >$i</option>";
}
echo "<option value=\"\" size=\"20\" ></option>
</select> call-limit<br>
<select name=\"canreinvite\" >
<option value=\"". $row_setting['canreinvite'] ."\">". $row_setting['canreinvite'] ."</option>
<option value=\"yes\" size=\"20\" >yes</option>
<option value=\"no\" size=\"20\" >no</option>
<option value=\"\" size=\"20\" ></option>
</select> directmedia<br>

</div>

<div class=\"box009\">
<select name=\"dtmfmode\" >
<option value=\"". $row_setting['dtmfmode'] ."\">". $row_setting['dtmfmode'] ."</option>
<option value=\"auto\" size=\"20\" >auto</option>
<option value=\"inband\" size=\"20\" >inband</option>
<option value=\"info\" size=\"20\" >info</option>
<option value=\"rfc2833\" size=\"20\" >rfc2833</option>
<option value=\"\" size=\"20\" ></option>
</select> dtmfmode<br>";
$insecureoptions=array(port,invite);
echo "<select name=\"insecure\" >
<option value=\"". $row_setting['insecure'] ."\">". $row_setting['insecure'] ."</option>";
foreach ($insecureoptions as $i){
echo "<option value=\"$i\" size=\"20\" >$i</option>";
}
echo "<option value=\"\" size=\"20\" ></option>
</select> insecure<br>

<select name=\"pickupgroup\" >
<option value=\"". $row_setting['pickupgroup'] ."\">". $row_setting['pickupgroup'] ."</option>";
foreach ($cgrouplist as $i){
echo "<option value=\"$i\" size=\"20\" >$i</option>";
}
echo "<option value=\"\" size=\"20\" ></option>
</select> pickupgroup<br>";
$typelist=array(peer,user,friend);
echo "<select name=\"type\" >
<option value=\"". $row_setting['type'] ."\">". $row_setting['type'] ."</option>";
foreach ($typelist as $i){
echo "<option value=\"$i\" size=\"20\" >$i</option>";
}
echo "<option value=\"\" size=\"20\" ></option>
</select> type<br>
</div>


<div class=\"extension_edit03\">
<input class=\"button_update\" type=\"submit\" value=\"update\" >
</form>
</div>
<div class=\"extension_edit03\">
<form method=\"POST\" action=\"/voiceip/administration/settings/sip/\" enctype=\"multipart/form-data\">
<input value=\"". $row_setting ['id'] ."\" name=\"id\" type=\"hidden\" >
<input value=\"settings-sip\" name=\"page\" type=\"hidden\" >
<input value=\"settings_sip_delete\" name=\"settings_sip_delete\" type=\"hidden\" >
<input class=\"button_delete\" type=\"submit\" value=\"delete\" >
</form>
</div></div>";
} 
?>
