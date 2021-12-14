<?php
if ($direction == asc) {
    $direction = desc;
} else {
    $direction = asc;
}
if (empty($sort)) {
    $sort = extension;
}
$manager_pass=rtrim($manager_pass);
//echo "--manager_user---$manager_user---<br/>";
//echo "--manager_pass---$manager_pass---";
//exit;
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$result = mysql_query("select * from extension order by $sort $direction") or die(mysql_error());
$manager_host = "127.0.0.1";
$manager_port = "5038";
$manager_connection_timeout = 3;
$peer_name = $exten;
$peer_type = "sip";
$peer_online = "offline";
$on_list = '';
$fp = fsockopen($manager_host, $manager_port, $errno, $errstr, $manager_connection_timeout);
if (!$fp) {
    
} else {
    $login = "Action: login\r\n";
    $login.= "Username: $manager_user\r\n";
    $login.= "Secret: $manager_pass\r\n";
    $login.= "Events: Off\r\n";
    $login.= "\r\n";
    fwrite($fp, $login);
    $manager_version = fgets($fp);
    $cmd_response = fgets($fp);
    $response = fgets($fp);
    $blank_line = fgets($fp);
    if (substr($response, 0, 9) == "Message: ") {
        $loginresponse = trim(substr($response, 9));
        if (!$loginresponse == "Authentication Accepted") {
            echo "-- Unable to log in: $loginresponse\n";
            fclose($fp);
            
        } else {
            $checkpeer = "Action: Command\r\n";
            $checkpeer.= "Command: sip show peers\r\n";
            $checkpeer.= "\r\n";
            fwrite($fp, $checkpeer);
            $line = trim(fgets($fp));
            $found_entry = false;
            while ($line != "--END COMMAND--") {
                if (substr($line, 0, 6) == "Status") {
                    $status = trim(substr(strstr($line, ":"), 1));
                    $found_entry = true;
                    if (substr($status, 0, 2) == "OK") {
                        $peer_ok = true;
                    } else {
                        $peer_ok = false;
                    }
                }
                $line = trim(fgets($fp));
                $on_list = "$on_list" . "$line" . "\n";
            }
            if ($found_entry == false) {
            } else if ($peer_ok == true) {
                $peer_online = "online";
            } else {
            }
            fclose($fp);
        }
    } else {
        //echo "Unexpected response: $response\n";
        fclose($fp);
        
    }
}
?>
<div class="extension_add_bar">
<div class="select_all_box" >
<input type="checkbox" name="select-all" id="select-all" />select&nbsp;all
</div>
<!-- live search box -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" /></script>
<script type="text/javascript">
function createRequestObject(){
var request_o;
var browser = navigator.appName;
if(browser == "Microsoft Internet Explorer"){
request_o = new ActiveXObject("Microsoft.XMLHTTP");
}else{
request_o = new XMLHttpRequest();
}
return request_o;
}
var http = createRequestObject();
function liveSearch()
{
var url = "/voiceip/livesearch.php";
var s = document.getElementById('qsearch').value;
var params = "&s="+s;
http.open("POST", url, true);
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
http.setRequestHeader("Content-length", params.length);
http.setRequestHeader("Connection", "close");
http.onreadystatechange = function() {
if(http.readyState == 4 && http.status != 200) {
document.getElementById('searchResults').innerHTML='<li>Loading...</li>';
}
if(http.readyState == 4 && http.status == 200) {
document.getElementById('searchResults').innerHTML = http.responseText;
}
}
http.send(params);
}
function sendToSearch(str){
document.getElementById('qsearch').value = str;
document.getElementById('searchResults').innerHTML = "";
}
</script>
<div id="quick-search" >
<input id="qsearch" type="text" name="qsearch" onkeyup="liveSearch()" />
<label for="qsearch">search</label>
</div>
<form method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1_d" type="submit" value="delete">

<input type="hidden" name="bulk_update_extensions_delete" value="bulk_update_extensions_delete" >
<input type="hidden" name="bulk_update_extensions" value="" class="tags">
</form>
<form method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1_u" type="submit" value="auth reset">

<input type="hidden" name="bulk_update_extensions_auth_reset" value="bulk_update_extensions_auth_reset" >
<input type="hidden" name="bulk_update_extensions" value="" class="tags">
</form>
<form method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1_u" type="submit" value="update">

<input type="hidden" name="bulk_update_extensions_update" value="bulk_update_extensions_update" >
<input type="hidden" name="bulk_update_extensions" value="" class="tags">
<select name="cidcfg">
<option value=""></option>
<option value="on">on</option>
<option value="off">off</option>
</select>cid&nbsp;&nbsp;
<select name="iaxcfg">
<option value=""></option>
<option value="on">on</option>
<option value="off">off</option>
</select>iax&nbsp;&nbsp;
<select name="sipcfg">
<option value=""></option>
<option value="on">on</option>
<option value="off">off</option>
</select>sip&nbsp;&nbsp;
<select name="missedcalls">
<option value=""></option>
<option value="on">on</option>
<option value="off">off</option>
</select>missed&nbsp;calls&nbsp;&nbsp;
<select name="voicemailcfg">
<option value=""></option>
<option value="on">on</option>
<option value="off">off</option>
</select>vm&nbsp;&nbsp;
<select name="directorycfg">
<option value=""></option>
<option value="on">on</option>
<option value="off">off</option>
</select>vm&nbsp;dir&nbsp;&nbsp;
<select name="nat" >
<option value="" ></option>
<option value="yes" >yes</option>
<option value="no">no</option>
<option value="never">never</option>
<option value="route">route</option>
</select>nat&nbsp;&nbsp;
<select name="setting_polycom" >
<?php
$result_setting_polycom = mysql_query("select id, setting from setting_polycom");
echo "<option value=\"" . $row_extension['id'] . "\">" . $row_extension['setting_polycom'] . "</option>";
while ($row_setting_polycom = mysql_fetch_array($result_setting_polycom)) {
    echo "<option value=\"" . $row_setting_polycom['id'] . "\">" . $row_setting_polycom['setting'] . "</option>";
}
echo "</select>poly&nbsp;setting&nbsp;&nbsp;
<select name=\"setting_sip\" >
<option value=\"" . $row_extension['id'] . "\">" . $row_extension['setting_sip'] . "</option>";
$result_setting_sip = mysql_query("select id, setting from setting_sip");
while ($row_setting_sip = mysql_fetch_array($result_setting_sip)) {
    echo "<option value=\"" . $row_setting_sip['id'] . "\">" . $row_setting_sip['setting'] . "</option>";
}
echo "</select>sip&nbsp;setting&nbsp;&nbsp;";
?><span>
<span><input type="text" name="voicepass" value="" class="voicepass_q">vmail&nbsp;pw&nbsp;&nbsp;</span>
<span><input type="text" name="secret" value="" class="voicepass_q">secret&nbsp;&nbsp;</span>
<span><input type="text" name="context" value="" class="voicepass_q">context&nbsp;&nbsp;</span>
<span><input type="text" name="gmtoffset" value="" class="voicepass_q">gmt&nbsp;&nbsp;</span></span>
</form>
</div>
<div id="searchResults">
<table class="extensions" border="0" cellspacing="0">
<tr><th></th><th></th><th></th><th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="exten">

<input type="hidden" name="sort" value="extension" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="macaddress">

<input type="hidden" name="sort" value="macaddress" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="did">

<input type="hidden" name="sort" value="did" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="firstname">

<input type="hidden" name="sort" value="firstname" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="lastname">

<input type="hidden" name="sort" value="lastname" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="email">

<input type="hidden" name="sort" value="email" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th>
<th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="cid">

<input type="hidden" name="sort" value="cidcfg" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th>
<th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="iax">

<input type="hidden" name="sort" value="iaxcfg" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="sip">

<input type="hidden" name="sort" value="sipcfg" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th>
<th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="m c">

<input type="hidden" name="sort" value="missedcalls" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th>
<th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="vm">

<input type="hidden" name="sort" value="voicemailcfg" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="vm dir">

<input type="hidden" name="sort" value="directorycfg" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th>
<th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="vm pw">

<input type="hidden" name="sort" value="voicepass" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th>
<th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="nat">

<input type="hidden" name="sort" value="nat" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th>
<th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="poly cfg">

<input type="hidden" name="sort" value="setting_polycom" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="sip cfg">

<input type="hidden" name="sort" value="setting_sip" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="context">

<input type="hidden" name="sort" value="context" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th>
<th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="gmt">

<input type="hidden" name="sort" value="gmtoffset" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th>
<th>
<form class="cell1" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
<input class="button1" type="submit" value="secret">
<input type="hidden" name="sort" value="secret" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th>
</tr>
<?php
while ($row = mysql_fetch_array($result)) {
    echo "<tr>
<td>
<input name=\"checkbox-" . $row['id'] . "\" id=\"" . $row['id'] . "\" type=\"checkbox\" value=\"" . $row['id'] . "\" >
</td>
<td><form method=\"POST\" action=\"/voiceip/administration/extensions/\" ><input type=\"hidden\" value=\"extension_edit\" name=\"extension_edit\" /><input type=\"hidden\" value=\"" . $row['id'] . "\" name=\"id\" /><input type=\"submit\" class=\"cellfacing\" value=\"edit\"></form></td>";
    echo "<td>";
    $exten_line = $row['extension'];
    $extension_match = '';
    $pattern = "/^.*$exten_line\/.*\$/m";
    if (preg_match_all($pattern, $on_list, $matches)) {
        $extension_match = implode("\n", $matches[0]);
    }
    $table_reg_check = "table_offline";
    $pattern = "/^.* OK .*\$/m";
    if ((preg_match_all($pattern, $extension_match, $matches)) & (!empty($exten_line))) {
        $table_reg_check = "table_online";
    }
    
    
    
    $polycom_setting_id=$row['setting_polycom'] ;
    $result_000 = mysql_query("select setting from setting_polycom where id='$polycom_setting_id'");
    while ($row_000 = mysql_fetch_array($result_000)) {
        $polycom_setting_name=$row_000['setting'];
    }
    $sip_setting_id=$row['setting_sip'] ;
    $result_001 = mysql_query("select setting from setting_sip where id='$sip_setting_id'");
    while ($row_001 = mysql_fetch_array($result_001)) {
        $sip_setting_name=$row_001['setting'];
    } 
    
    
    //adjust table display for visual quality
    if ($row['cidcfg']==off){
        $row['cidcfg']='';
    }
    if ($row['iaxcfg']==off){
        $row['iaxcfg']='';
    }
    if ($row['sipcfg']==off){
        $row['sipcfg']='';
    }
    if ($row['voicemailcfg']==off){
        $row['voicemailcfg']='';
    }    
    if ($row['directorycfg']==off){
        $row['directorycfg']='';
    } 
    if ($row['missedcalls']==off){
        $row['missedcalls']='';
    } 
    
    echo "<div class=\"$table_reg_check\"></div></td>";
    echo "<td class=\"pt10\">" . $row['extension'] . "</td><td class=\"pt10\">" . $row['macaddress'] . "</td><td class=\"pt10\">" . $row['did'] . "</td><td class=\"pt10\">" . $row['firstname'] . "</td><td class=\"pt10\">" . $row['lastname'] . "</td><td class=\"pt10\">" . $row['email'] . "</td><td class=\"pt8\">" . $row['cidcfg'] . "</td><td class=\"pt8\">" . $row['iaxcfg'] . "</td><td class=\"pt8\">" . $row['sipcfg'] . "</td><td class=\"pt8\">" . $row['missedcalls'] . "</td><td class=\"pt8\">" . $row['voicemailcfg'] . "</td><td class=\"pt8\">" . $row['directorycfg'] . "</td><td class=\"pt10\">" . $row['voicepass'] . "</td><td class=\"pt8\">" . $row['nat'] . "</td><td class=\"pt10\">" . $polycom_setting_name . "</td><td class=\"pt10\">" . $sip_setting_name . "</td><td class=\"pt10\">" . $row['context'] . "</td><td class=\"pt8\">" . $row['gmtoffset'] . "</td><td class=\"pt8\">" . $row['secret'] . "</td></tr>";
}
echo "</table>
</div>
";
?>
<!-- select all tags and add all id's to value="" field wherem class="tags" -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" /></script>
<script type="text/javascript">
function Populate(){
    vals = $('input[type="checkbox"]:checked').map(function() {
        return this.value;
    }).get().join(',');
    console.log(vals);
    $('.tags').val(vals);
}
$(function () {
       $('#select-all').click(function (event) {
           var selected = this.checked;
           // Iterate each checkbox
           $(':checkbox').each(function () {    this.checked = selected; });
           Populate()
       });
    });
</script>
<!-- each individual checkbox click updates checked id's to value="" field where class="tags" -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" /></script>
<script type="text/javascript">
function Populate(){
    vals = $('input[type="checkbox"]:checked').map(function() {
        return this.value;
    }).get().join(',');
    console.log(vals);
    $('.tags').val(vals);
}
$('input[type="checkbox"]').on('change', function() {
    Populate()
}).change();
</script>
