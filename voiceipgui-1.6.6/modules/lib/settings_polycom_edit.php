<?php 
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$result = mysql_query("select id, setting, callback, missedcalls, callbackmode, gmtoffset, homepage, idledisplay, idledisplayip, idleimage500, idleimage600, loglevelchange, modified, sipoutboundproxy, sntpaddress, voipprot1, voipprot2, volume, modified, voicevolumepersisthandsfree, upanalogHeadsetOption, voicegainrxdigitalchassisIP_650, voicegainrxdigitalchassis, voicegainrxanalogchassis, voicegainrxanalogchassisIP_650, voicegainrxdigitalringerIP_650, voicegainrxdigitalhandset, voicegainrxdigitalheadset, voicevolumepersistheadset, voicevolumepersisthandset from setting_polycom WHERE (id=$id)") 
or die(mysql_error()); 
while($row_setting = mysql_fetch_array( $result )) {
$cgrouplist=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
echo "
<div class=\"extension_edit\">

<form method=\"POST\" action=\"/voiceip/administration/settings/polycom/\" enctype=\"multipart/form-data\">
<div class=\"poly_settings_rx\">
<input type=\"text\" name=\"setting\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['setting'] ."\"> <strong>profile name</strong><br /><br />
<input type=\"text\" name=\"callback\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['callback'] ."\"> callback<br>
<input type=\"text\" name=\"homepage\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['homepage'] ."\"> homepage<br>
<input type=\"text\" name=\"idleimage500\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['idleimage500'] ."\"> idleimage500<br>
<input type=\"text\" name=\"idleimage600\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['idleimage600'] ."\"> idleimage600<br>
<input type=\"text\" name=\"sntpaddress\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['sntpaddress'] ."\"> sntpaddress<br>
<input type=\"text\" name=\"voipprot1\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['voipprot1'] ."\"> reg.1.server.1.address<br>
<input type=\"text\" name=\"voipprot2\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['voipprot2'] ."\"> reg.1.server.2.address<br>













<input value=\"". $row_setting['id'] ."\" name=\"id\" type=\"hidden\" >
<input value=\"settings_polycom_edit\" name=\"settings_polycom_edit\" type=\"hidden\" >
<input value=\"settings-polycom\" name=\"page\" type=\"hidden\" >
<input value=\"settings_polycom_update\" name=\"settings_polycom_update\" type=\"hidden\" >

</div>

<div class=\"poly_settings_rx\">

<select name=\"callbackmode\" >
<option value=\"". $row_setting['callbackmode'] ."\">". $row_setting['callbackmode'] ."</option>
<option value=\"contact\" size=\"20\" >contact</option>
<option value=\"disabled\" size=\"20\" >disabled</option>
<option value=\"\" size=\"20\" ></option>
</select> callbackmode<br>
<select name=\"loglevelchange\" >
<option value=\"". $row_setting['loglevelchange'] ."\">". $row_setting['loglevelchange'] ."</option>";
foreach ($cgrouplist as $i){
echo "<option value=\"$i\" size=\"20\" >$i</option>";
}
echo "<option value=\"\" size=\"20\" ></option>
</select> loglevelchange<br>

<select name=\"idledisplay\" >
<option value=\"". $row_setting['idledisplay'] ."\">". $row_setting['idledisplay'] ."</option>
<option value=\"on\" size=\"20\" >on</option>
<option value=\"off\" size=\"20\" >off</option>
<option value=\"\" size=\"20\" ></option>
</select> agent status<br>

<select name=\"voicevolumepersisthandset\" >
<option value=\"". $row_setting['voicevolumepersisthandset'] ."\">". $row_setting['voicevolumepersisthandset'] ."</option>
<option value=\"1\" size=\"20\" >1</option>
<option value=\"0\" size=\"20\" >0</option>
<option value=\"\" size=\"20\" ></option>
</select> voice.volume.persist.handset<br />
<select name=\"voicevolumepersisthandsfree\" >
<option value=\"". $row_setting['voicevolumepersisthandsfree'] ."\">". $row_setting['voicevolumepersisthandsfree'] ."</option>
<option value=\"1\" size=\"20\" >1</option>
<option value=\"0\" size=\"20\" >0</option>
<option value=\"\" size=\"20\" ></option>
</select> voice.volume.persist.handsfree<br />
<select name=\"voicevolumepersistheadset\" >
<option value=\"". $row_setting['voicevolumepersistheadset'] ."\">". $row_setting['voicevolumepersistheadset'] ."</option>
<option value=\"0\" size=\"20\" >0</option>
<option value=\"1\" size=\"20\" >1</option>
<option value=\"\" size=\"20\" ></option>
</select> voice.volume.persist.headset<br />
<select name=\"upanalogHeadsetOption\" >
<option value=\"". $row_setting['upanalogHeadsetOption'] ."\">". $row_setting['upanalogHeadsetOption'] ."</option>
<option value=\"0\" size=\"20\" >0</option>
<option value=\"1\" size=\"20\" >1</option>
<option value=\"2\" size=\"20\" >2</option>
<option value=\"3\" size=\"20\" >3</option>
<option value=\"\" size=\"20\" ></option>
</select> up.analogHeadsetOption<br /><br />



</div>

<div class=\"poly_settings_rx\">


<input type=\"text\" name=\"voicegainrxanalogchassis\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['voicegainrxanalogchassis'] ."\"> voice.gain.rx.analog.chassis<br>
<input type=\"text\" name=\"voicegainrxanalogchassisIP_650\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['voicegainrxanalogchassisIP_650'] ."\"> voice.gain.rx.analog.chassis.IP_650<br>
<input type=\"text\" name=\"voicegainrxdigitalchassis\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['voicegainrxdigitalchassis'] ."\"> voice.gain.rx.digital.chassis<br>
<input type=\"text\" name=\"voicegainrxdigitalchassisIP_650\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['voicegainrxdigitalchassisIP_650'] ."\"> voice.gain.rx.digital.chassis.IP_650<br>
<input type=\"text\" name=\"voicegainrxdigitalringerIP_650\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['voicegainrxdigitalringerIP_650'] ."\"> voice.gain.rx.digital.ringer.IP_650<br>
<input type=\"text\" name=\"voicegainrxdigitalheadset\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['voicegainrxdigitalheadset'] ."\"> voice.gain.rx.digital.headset<br>
<input type=\"text\" name=\"voicegainrxdigitalhandset\" size=\"20\" maxlength=\"100\" value=\"". $row_setting['voicegainrxdigitalhandset'] ."\"> voice.gain.rx.digital.handset<br>


</div>

<div class=\"extension_edit03\">
<input class=\"button_update\" type=\"submit\" value=\"update\" >
</form>
</div>
<div class=\"extension_edit03\">
<form method=\"POST\" action=\"/voiceip/administration/settings/polycom/\" enctype=\"multipart/form-data\">
<input value=\"". $row_setting ['id'] ."\" name=\"id\" type=\"hidden\" >
<input value=\"settings-polycom\" name=\"page\" type=\"hidden\" >
<input value=\"settings_polycom_delete\" name=\"settings_polycom_delete\" type=\"hidden\" >
<input class=\"button_delete\" type=\"submit\" value=\"delete\" >
</form>
</div>
</div></div>";
} 
?>
