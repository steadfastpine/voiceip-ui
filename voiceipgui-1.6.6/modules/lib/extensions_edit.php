<?php
$ftpdir = "/home/PlcmSpIp";
$tftpdir = "/var/tftpd";
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$result_mac = mysql_query("select macaddress from extension WHERE (id=$id)") or die(mysql_error());
while ($row_mac = mysql_fetch_array($result_mac)) {
    $macaddress = $row_mac['macaddress'];
}
if ($macaddress == '') {
    $result_extension = mysql_query("select gmtoffset, missedcalls, id, nat, macaddress, ipaddress, secret, cidcfg, context, line, site, extension, mailbox, label, firstname, lastname, email, did, setting, voicepass, modified, phonecfg, directorycfg, iaxcfg, voicemailcfg, sipcfg, phone_type, setting_sip, setting_polycom, setting_spa from extension WHERE (id=$id)") or die(mysql_error());
} else {
    $result_extension = mysql_query("select gmtoffset, missedcalls, id, nat, macaddress, ipaddress, secret, cidcfg, context, line, site, extension, mailbox, label, firstname, lastname, email, did, setting, voicepass, modified, phonecfg, directorycfg, iaxcfg, voicemailcfg, sipcfg, phone_type, setting_sip, setting_polycom, setting_spa from extension WHERE macaddress='$macaddress' order by extension asc") or die(mysql_error());
}
$result_site = mysql_query("select site from site");
$result_operator = mysql_query("select operator from operator");
$result_setting = mysql_query("select setting from extension WHERE (id=$id)");
$result_setting_sip = mysql_query("select setting from setting_sip");
$result_setting_polycom = mysql_query("select id, setting from setting_polycom");
$result_setting_spa = mysql_query("select setting from setting_spa");
while ($row_extension = mysql_fetch_array($result_extension)) {
    $mac = $row_extension['macaddress'];
    $exten = $row_extension['extension'];
    $manager_host = "127.0.0.1";
    $manager_port = "5038";
    $manager_connection_timeout = 30;
    $peer_name = $exten;
    $peer_type = "sip";
    $peer_online = "offline";
    /* Connect to the manager */
    $fp = fsockopen($manager_host, $manager_port, $errno, $errstr, $manager_connection_timeout);
    if (!$fp) {
        echo "There was an error connecting to the manager: $errstr (Error Number: $errno)\n";
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
                //exit(0);
                
            } else {
                $checkpeer = "Action: Command\r\n";
                $checkpeer.= "Command: $peer_type show peer $peer_name\r\n";
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
                }
                if ($found_entry == false) {
                    //echo "-- We didn't get the response we were looking for.\n";
                    
                } else if ($peer_ok == true) {
                    $peer_online = "online";
                } else {
                }
                fclose($fp);
                //exit(0);
                
            }
        } else {
            //echo "Unexpected response: $response\n";
            fclose($fp);
            //exit(0);
            
        }
    }
    echo "
<div class=\"extension_edit\">
<div class=\"extension_edit_nav\">
<div class=\"extension_edit_nav_t\">
<div class=\"$peer_online\" ></div><span></span>
</div>
<div class=\"extension_edit_nav_r\">
<form method=\"POST\" action=\"/voiceip/administration/extensions/\" enctype=\"multipart/form-data\">
<input value=\"" . $row_extension['id'] . cbox . "\" name=\"id\" type=\"hidden\" >
<input value=\"extensions\" name=\"page\" type=\"hidden\" >
<input value=\"extension_delete\" name=\"extension_delete\" type=\"hidden\" >
<input class=\"button_delete\" type=\"submit\" value=\"delete\" >
</form>
</div>
<form method=\"POST\" action=\"/voiceip/administration/extensions/\" enctype=\"multipart/form-data\">
<div class=\"extension_edit_nav_l\">
<input class=\"button_update\" type=\"submit\" value=\"update\" >
</div>
</div>
<input value=\"" . $row_extension['id'] . "\" name=\"id\" type=\"hidden\" >
<input value=\"extension_edit\" name=\"extension_edit\" type=\"hidden\" >
<input value=\"extensions\" name=\"page\" type=\"hidden\" >
<input value=\"extension_update\" name=\"extension_update\" type=\"hidden\" >
<div class=\"box009\">
<input type=\"text\" name=\"extension\" size=\"20\" maxlength=\"50\" value=\"" . $row_extension['extension'] . "\">extension *
<input type=\"text\" name=\"mailbox\" size=\"20\" maxlength=\"50\" value=\"" . $row_extension['mailbox'] . "\">mailbox
<input type=\"text\" name=\"label\" size=\"20\" maxlength=\"50\" value=\"" . $row_extension['label'] . "\">label
<input type=\"text\" name=\"macaddress\" size=\"20\" maxlength=\"50\" value=\"" . $row_extension['macaddress'] . "\">macaddress
<input type=\"text\" name=\"did\" size=\"20\" maxlength=\"50\" value=\"" . $row_extension['did'] . "\">did
</div>
<div class=\"box009\">
<input type=\"text\" name=\"firstname\" size=\"20\" maxlength=\"50\" value=\"" . $row_extension['firstname'] . "\">first&nbsp;name
<input type=\"text\" name=\"lastname\" size=\"20\" maxlength=\"50\" value=\"" . $row_extension['lastname'] . "\">last&nbsp;name
<input type=\"text\" name=\"email\" size=\"20\" maxlength=\"100\" value=\"" . $row_extension['email'] . "\">email
<input type=\"text\" name=\"context\" size=\"20\" maxlength=\"50\" value=\"" . $row_extension['context'] . "\">context

<input type=\"text\" name=\"secret\" size=\"20\" maxlength=\"50\" value=\"" . $row_extension['secret'] . "\">secret




</div>
<div class=\"box009\">
<select name=\"line\" >
<option value=\"" . $row_extension['line'] . "\">" . $row_extension['line'] . "</option>
<option value=\"1\" size=\"20\" >1</option>
<option value=\"2\" size=\"20\" >2</option>
<option value=\"3\" size=\"20\" >3</option>
<option value=\"4\" size=\"20\" >4</option>
<option value=\"5\" size=\"20\" >5</option>
<option value=\"6\" size=\"20\" >6</option>
<option value=\"\"></option>
</select>line
<select name=\"setting_polycom\" >";


    // current polycom setting for extension as first entry
    $polycom_setting_id=$row_extension['setting_polycom'] ;
    $result_000 = mysql_query("select setting from setting_polycom where id='$polycom_setting_id'");
    while ($row_000 = mysql_fetch_array($result_000)) {
        $setting_polycom_name=$row_000['setting'];
    }
    echo "<option value=\"" . $row_extension['setting_polycom'] . "\">" . $setting_polycom_name . "</option>";

    // all polycom settings
    $result_setting_polycom = mysql_query("select id, setting from setting_polycom");
    while ($row_setting_polycom = mysql_fetch_array($result_setting_polycom)) {

        echo "<option value=\"" . $row_setting_polycom['id'] . "\">" . $row_setting_polycom['setting'] . "</option>";
    }
    echo "<option value=\"\"></option>";
    echo "</select>poly&nbsp;setting

<select name=\"setting_sip\" >";

    // current sip setting for extension as first entry
    $sip_setting_id=$row_extension['setting_sip'] ;
    $result_001 = mysql_query("select setting from setting_sip where id='$sip_setting_id'");
    while ($row_001 = mysql_fetch_array($result_001)) {
        $setting_sip_name=$row_001['setting'];
    }
    echo "<option value=\"" . $row_extension['setting_sip'] . "\">" . $setting_sip_name . "</option>";

    // all sip settings
    $result_setting_sip = mysql_query("select id, setting from setting_sip");
    while ($row_setting_sip = mysql_fetch_array($result_setting_sip)) {
        echo "<option value=\"" . $row_setting_sip['id'] . "\">" . $row_setting_sip['setting'] . "</option>";
    }
    echo "<option value=\"\"></option>";
    echo "</select>sip&nbsp;setting
    
    
<select name=\"nat\" >
<option value=\"". $row_extension['nat'] ."\">". $row_extension['nat'] ."</option>
<option value=\"yes\" size=\"20\" >yes</option>
<option value=\"no\" size=\"20\" >no</option>
<option value=\"never\" size=\"20\" >never</option>
<option value=\"route\" size=\"20\" >route</option>
<option value=\"\" size=\"20\" ></option>
</select>nat


<input type=\"text\" name=\"gmtoffset\" size=\"20\" maxlength=\"50\" value=\"" . $row_extension['gmtoffset'] . "\">gmtoffset


<input type=\"text\" name=\"voicepass\" size=\"20\" maxlength=\"50\" value=\"" . $row_extension['voicepass'] . "\">voicemail&nbsp;pass


</div>
<div class=\"box222\">";
    $checked = "";
    if ($row_extension['cidcfg'] == "on") {
        $checked = "checked";
    }
    echo "<span><input class=\"cbox\" type=\"checkbox\" name=\"cidcfg\" value=\"on\" " . $checked . ">cid</span>";
    $checked = "";
    if ($row_extension['iaxcfg'] == "on") {
        $checked = "checked";
    }
    echo "<span><input class=\"cbox\" type=\"checkbox\" name=\"iaxcfg\" value=\"on\" " . $checked . ">iax</span>";
    $checked = "";
    if ($row_extension['sipcfg'] == "on") {
        $checked = "checked";
    }
    echo "<span><input class=\"cbox\" type=\"checkbox\" name=\"sipcfg\" value=\"on\" " . $checked . ">sip</span><br/>";
    $checked = "";
    if ($row_extension['missedcalls'] == "on") {
        $checked = "checked";
    }
    echo "<span><input class=\"cbox\" type=\"checkbox\" name=\"missedcalls\" value=\"on\" " . $checked . ">missed&nbsp;calls</span>";
    $checked = "";
    if ($row_extension['voicemailcfg'] == "on") {
        $checked = "checked";
    }
    echo "<span><input class=\"cbox\" type=\"checkbox\" name=\"voicemailcfg\" value=\"on\" " . $checked . ">voicemail</span>";
    $checked = "";
    if ($row_extension['directorycfg'] == "on") {
        $checked = "checked";
    }
    echo "<span><input class=\"cbox\" type=\"checkbox\" name=\"directorycfg\" value=\"on\" " . $checked . ">voicemail&nbsp;directory</span>";

    echo "</div>
</form>
</div>";
}
echo "
<div class=\"diag_box\">
";
// diagnostics
if (!empty($mac)) {
    echo "
<h2>$ftpdir/$mac-phone.cfg</h2>
<textarea>
";
    passthru("cat $ftpdir/$mac-phone.cfg||echo 'no files found'");
    echo "
</textarea>
";


    echo "
<h2>$ftpdir/$mac*</h2>
<textarea>
";
    passthru("ls -l $ftpdir/$mac*||echo 'no files found'");
    echo "
</textarea>
";
}
if ((file_exists("/var/log/vsftpd.log")) & (!empty($mac))) {
    echo "<h2>/var/log/vsftpd.log</h2>
<textarea>
";
    passthru("tail -10000 /var/log/vsftpd.log|grep -i $mac|tail -400||echo 'no entries found'");
    echo "
</textarea>
";
}
if (!empty($mac)) {
    $result_extension = mysql_query("select extension from extension WHERE macaddress='$mac' order by extension asc") or die(mysql_error());
    while ($row_extension = mysql_fetch_array($result_extension)) {
        $exten = $row_extension['extension'];
        if (file_exists("/var/log/asterisk/messages")) {
            echo "<h2>/var/log/asterisk/messages ($exten)</h2>
            <textarea>";
            passthru("tail -10000 /var/log/asterisk/messages|egrep -i \":$exten@|'$exten'\" |tail -400||echo 'no entries found'");
            echo "</textarea>";

            
        }            
    }
}

echo "</div>";
?>

