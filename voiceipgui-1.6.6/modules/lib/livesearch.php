<?php
$s = $_REQUEST["s"];
if ($s){
$search_string="select * from extension where extension like '%$s%' or macaddress like '%$s%' or firstname like '%$s%' or lastname like '%$s%' or setting_sip like '%$s%' and not extension=''";
}else{
$search_string="select * from extension where not extension='' order by extension";
}
$manager_host="127.0.0.1";
$manager_port = "5038";
$manager_connection_timeout = 30;
$peer_name = $exten;
$peer_type = "sip";
$peer_online="offline";
$on_list='';
$fp = fsockopen($manager_host, $manager_port, $errno, $errstr, $manager_connection_timeout);
if (!$fp) {
} else {
    $login = "Action: login\r\n";
    $login .= "Username: $manager_user\r\n";
    $login .= "Secret: $manager_pass\r\n";
    $login .= "Events: Off\r\n";
    $login .= "\r\n";
    fwrite($fp,$login);
    $manager_version = fgets($fp);
    $cmd_response = fgets($fp);
    $response = fgets($fp);
    $blank_line = fgets($fp);
    if (substr($response,0,9) == "Message: ") {
        $loginresponse = trim(substr($response,9));
        if (!$loginresponse == "Authentication Accepted") {
            echo "-- Unable to log in: $loginresponse\n";
            fclose($fp);
            //exit(0);
        } else {
            $checkpeer = "Action: Command\r\n";
            $checkpeer .= "Command: sip show peers\r\n";
            $checkpeer .= "\r\n";
            fwrite($fp,$checkpeer);
            $line = trim(fgets($fp));            
            $found_entry = false;
            while ($line != "--END COMMAND--") {
                if (substr($line,0,6) == "Status") {
                    $status = trim(substr(strstr($line, ":"),1));
                    $found_entry = true;
                    if (substr($status,0,2) == "OK") {
                        $peer_ok = true;
                    } else {
                        $peer_ok = false;
                    }
                }
                $line = trim(fgets($fp));
                
            $on_list="$on_list" . "$line"."\n";
            }
            if ($found_entry == false) {
            } else if ($peer_ok == true) {
                $peer_online="online";
            } else {
            }
            fclose($fp);
        }
    } else {
        //echo "Unexpected response: $response\n";
        fclose($fp);
    }
}
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$result = mysql_query("$search_string") 
or die(mysql_error()); 
?>

<table class="extensions" border="0" cellspacing="0">
<tr><th></th><th></th><th></th><th>
<form class="cell1" method="POST" action="/voiceip/administration/" enctype="multipart/form-data">
<input class="button1" type="submit" value="exten">
<input type="hidden" name="page" value="extensions" />
<input type="hidden" name="sort" value="extension" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/" enctype="multipart/form-data">
<input class="button1" type="submit" value="macaddress">
<input type="hidden" name="page" value="extensions" />
<input type="hidden" name="sort" value="macaddress" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/" enctype="multipart/form-data">
<input class="button1" type="submit" value="did">
<input type="hidden" name="page" value="extensions" />
<input type="hidden" name="sort" value="did" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/" enctype="multipart/form-data">
<input class="button1" type="submit" value="firstname">
<input type="hidden" name="page" value="extensions" />
<input type="hidden" name="sort" value="firstname" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/" enctype="multipart/form-data">
<input class="button1" type="submit" value="lastname">
<input type="hidden" name="page" value="extensions" />
<input type="hidden" name="sort" value="lastname" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/" enctype="multipart/form-data">
<input class="button1" type="submit" value="email">
<input type="hidden" name="page" value="extensions" />
<input type="hidden" name="sort" value="email" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th>




<th>
<form class="cell1" method="POST" action="/voiceip/administration/" enctype="multipart/form-data">
<input class="button1" type="submit" value="iax">
<input type="hidden" name="page" value="extensions" />
<input type="hidden" name="sort" value="iaxcfg" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/" enctype="multipart/form-data">
<input class="button1" type="submit" value="sip">
<input type="hidden" name="page" value="extensions" />
<input type="hidden" name="sort" value="sipcfg" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/" enctype="multipart/form-data">
<input class="button1" type="submit" value="vm">
<input type="hidden" name="page" value="extensions" />
<input type="hidden" name="sort" value="voicemailcfg" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/" enctype="multipart/form-data">
<input class="button1" type="submit" value="vm dir">
<input type="hidden" name="page" value="extensions" />
<input type="hidden" name="sort" value="directorycfg" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th>

<th>
<form class="cell1" method="POST" action="/voiceip/administration/" enctype="multipart/form-data">
<input class="button1" type="submit" value="vm pw">
<input type="hidden" name="page" value="extensions" />
<input type="hidden" name="sort" value="voicepass" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th>



<th>
<form class="cell1" method="POST" action="/voiceip/administration/" enctype="multipart/form-data">
<input class="button1" type="submit" value="poly cfg">
<input type="hidden" name="page" value="extensions" />
<input type="hidden" name="sort" value="setting_polycom" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/" enctype="multipart/form-data">
<input class="button1" type="submit" value="sip cfg">
<input type="hidden" name="page" value="extensions" />
<input type="hidden" name="sort" value="setting_sip" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th><th>
<form class="cell1" method="POST" action="/voiceip/administration/" enctype="multipart/form-data">
<input class="button1" type="submit" value="context">
<input type="hidden" name="page" value="extensions" />
<input type="hidden" name="sort" value="context" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th>

<th>
<form class="cell1" method="POST" action="/voiceip/administration/" enctype="multipart/form-data">
<input class="button1" type="submit" value="secret">
<input type="hidden" name="page" value="extensions" />
<input type="hidden" name="sort" value="secret" />
<input type="hidden" name="direction" value="<?php echo $direction; ?>" />
</form>
</th>

</tr>
<?php
while ($row = mysql_fetch_array($result)) {

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

    echo "<tr>
<td>
<input name=\"checkbox-" . $row['id'] . "\" id=\"" . $row['id'] . "\" type=\"checkbox\" value=\"" . $row['id'] . "\" >
</td>
<td><form method=\"POST\" action=\"/voiceip/administration/\" ><input type=\"hidden\" value=\"extensions\" name=\"page\" /><input type=\"hidden\" value=\"extension_view\" name=\"extension_view\" /><input type=\"hidden\" value=\"" . $row['id'] . "\" name=\"id\" /><input type=\"submit\" class=\"cellfacing\" value=\"edit\"></form></td>";
    echo "<td>";
    $exten_line = $row['extension'];
    $extension_match = '';
    $pattern = "/^.*$exten_line.*\$/m";
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
    
    
    
    echo "<div class=\"$table_reg_check\"></div></td>";
    echo "<td>" . $row['extension'] . "</td><td>" . $row['macaddress'] . "</td><td>" . $row['did'] . "</td><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['email'] . "</td><td>" . $row['iaxcfg'] . "</td><td>" . $row['sipcfg'] . "</td><td>" . $row['voicemailcfg'] . "</td><td>" . $row['directorycfg'] . "</td><td>" . $row['voicepass'] . "</td><td>" . $polycom_setting_name . "</td><td>" . $sip_setting_name . "</td><td>" . $row['context'] . "</td><td>" . $row['secret'] . "</td></tr>";
}
echo "</table>
</div>";
?>
