<?php
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$gen_path = "/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/output/polycom/";
$gennum = '';

//clear output directory
$command = "rm -r $gen_path*";
system($command);
$missedcalls ="";

// phone file header
$result_polycom_phone_list = mysql_query("select distinct macaddress, setting_polycom from extension WHERE macaddress REGEXP '^0004f' and modified='1' and not macaddress=''") or die(mysql_error());

while ($row_polycom_phone_list = mysql_fetch_array($result_polycom_phone_list)) {

    $missedcalls ="";
    $setting_polycom ="";
    $macaddress = $row_polycom_phone_list['macaddress'];
    
    $polycom_file = $gen_path . $macaddress . "-phone.cfg";
    //echo "--"."$polycom_file"."--";
    $fh = fopen($polycom_file, 'w') or die("can't open file $polycom_file");
    $gennum = $gennum . "$macaddress-phone.cfg<br />";
    #echo $gennum;
   

	$result_phonemeta = mysql_query("select missedcalls, setting_polycom from extension WHERE modified='1' and macaddress='$macaddress' limit 1") or die(mysql_error());
  
    while ($row_phonemeta = mysql_fetch_array($result_phonemeta)) {
	    $setting_polycom = $row_phonemeta['setting_polycom'];
	    $missedcalls = $row_phonemeta["missedcalls"];
	}
    
    $polycom_body = "<?xml version=\"1.0\" standalone=\"yes\"?>
<PHONE_CONFIG>
<OVERRIDES
voIpProt.SIP.specialEvent.checkSync.alwaysReboot=\"1\"
tcpIpApp.sntp.address.overrideDHCP=\"1\"
tcpIpApp.sntp.gmtOffset.overrideDHCP=\"1\"
tcpIpApp.sntp.daylightSavings.enable=\"1\"";   
    
    
    $result_setting_polycom = mysql_query("select id, setting, callback, missedcalls, callbackmode, gmtoffset, homepage, idledisplay, idledisplayip, idleimage500, idleimage600, loglevelchange, modified, sipoutboundproxy, sntpaddress, volume, modified, voicevolumepersisthandsfree, upanalogHeadsetOption, voicegainrxdigitalchassisIP_650, voicegainrxdigitalchassis, voicegainrxanalogchassis, voicegainrxanalogchassisIP_650, voicegainrxdigitalringerIP_650, voicegainrxdigitalheadset, voicegainrxdigitalhandset, voipprot1, voipprot2, voicevolumepersistheadset, voicevolumepersisthandset from setting_polycom where id='$setting_polycom' limit 1") or die(mysql_error());
    // write file header

    while ($row_setting_polycom = mysql_fetch_array($result_setting_polycom)) {
        //$macaddress = strtolower($row_polycom_phone_list['macaddress']);
        //$polycom_file = $gen_path . $macaddress . "-phone.cfg";
        //echo $polycom_file;
        //$fh = fopen($polycom_file, 'a') or die("can't open file");
        $callbackmode = $row_setting_polycom["callbackmode"];
        $callback = $row_setting_polycom["callback"];
        $callerid = $row_setting_polycom["callerid"];
        //$gmtoffset = $row_setting_polycom["gmtoffset"];
        $homepage = $row_setting_polycom["homepage"];
        $idledisplayip = $row_setting_polycom["idledisplayip"];
        $idledisplay = $row_setting_polycom["idledisplay"];
        $idleimage500 = $row_setting_polycom["idleimage500"];
        $idleimage600 = $row_setting_polycom["idleimage600"];
        $id = $row_setting_polycom["id"];
        $loglevelchange = $row_setting_polycom["loglevelchange"];
        //$missedcalls = $row_setting_polycom["missedcalls"];
        $modified = $row_setting_polycom["modified"];
        $setting_polycom_update = $row_setting_polycom["setting_polycom_update"];
        $setting_polycom_view = $row_setting_polycom["setting_polycom_view"];
        $setting = $row_setting_polycom["setting"];
        $sipoutboundproxy = $row_setting_polycom["sipoutboundproxy"];
        $sntpaddress = $row_setting_polycom["sntpaddress"];
        $upanalogHeadsetOption = $row_setting_polycom["upanalogHeadsetOption"];
        $voicegainrxanalogchassisIP_650 = $row_setting_polycom["voicegainrxanalogchassisIP_650"];
        $voicegainrxanalogchassis = $row_setting_polycom["voicegainrxanalogchassis"];
        $voicegainrxdigitalchassisIP_650 = $row_setting_polycom["voicegainrxdigitalchassisIP_650"];
        $voicegainrxdigitalchassis = $row_setting_polycom["voicegainrxdigitalchassis"];
        $voicegainrxdigitalhandset = $row_setting_polycom["voicegainrxdigitalhandset"];
        $voicegainrxdigitalheadset = $row_setting_polycom["voicegainrxdigitalheadset"];
        $voicegainrxdigitalringerIP_650 = $row_setting_polycom["voicegainrxdigitalringerIP_650"];
        $voicevolumepersisthandset = $row_setting_polycom["voicevolumepersisthandset"];
        $voicevolumepersisthandsfree = $row_setting_polycom["voicevolumepersisthandsfree"];
        $voicevolumepersistheadset = $row_setting_polycom["voicevolumepersistheadset"];
        $volume = $row_setting_polycom["volume"];

        if (!empty($row_setting_polycom['sntpaddress'])) {
            $polycom_body = "$polycom_body" . "\ntcpIpApp.sntp.address=\"" . $row_setting_polycom['sntpaddress'] . "\"";
        }
//      if (!empty($row_setting_polycom['gmtoffset'])) {
//            $polycom_body = "$polycom_body" . "\ntcpIpApp.sntp.gmtOffset=\"" . $row_setting_polycom['gmtoffset'] . "\"";
//      }
        if (!empty($row_setting_polycom['loglevelchange'])) {
            $polycom_body = "$polycom_body" . "\n_.0x20._log.level.change.sip=\"" . $row_setting_polycom['loglevelchange'] . "\"";
        }
        if ($missedcalls == on) {
            $polycom_body = "$polycom_body" . "\nfeature.8.name=\"calllist-missed\"\nfeature.8.enabled=\"1\"";

        }else{
            $polycom_body = "$polycom_body" . "\nfeature.8.name=\"calllist-missed\"\nfeature.8.enabled=\"0\"";
        }
        if (!$sipoutboundproxy == '') {
            $polycom_body = "$polycom_body" . "\nvoIpProt.SIP.outboundProxy.address=\"" . $sipoutboundproxy . "\"";
        }
        if ($upanalogHeadsetOption || $upanalogHeadsetOption == "0") {
            $polycom_body = "$polycom_body" . "\nup.analogHeadsetOption=\"$upanalogHeadsetOption\"";
        }
        if ($voicegainrxanalogchassis || $voicegainrxanalogchassis == "0") {
            $polycom_body = "$polycom_body" . "\nvoice.gain.rx.analog.chassis=\"$voicegainrxanalogchassis\"";
        }
        if ($voicegainrxanalogchassisIP_650 || $voicegainrxanalogchassisIP_650 == "0") {
            $polycom_body = "$polycom_body" . "\nvoice.gain.rx.analog.chassis.IP_650=\"$voicegainrxanalogchassisIP_650\"";
        }
        if ($voicegainrxdigitalchassis || $voicegainrxdigitalchassis == "0") {
            $polycom_body = "$polycom_body" . "\nvoice.gain.rx.digital.chassis=\"$voicegainrxdigitalchassis\"";
        }
        if ($voicegainrxdigitalchassisIP_650 || $voicegainrxdigitalchassisIP_650 == "0") {
            $polycom_body = "$polycom_body" . "\nvoice.gain.rx.digital.chassis.IP_650=\"$voicegainrxdigitalchassisIP_650\"";
        }
        if ($voicegainrxdigitalringerIP_650 || $voicegainrxdigitalringerIP_650 == "0") {
            $polycom_body = "$polycom_body" . "\nvoice.gain.rx.digital.ringer.IP_650=\"$voicegainrxdigitalringerIP_650\"";
        }
        if ($voicegainrxdigitalhandset || $voicegainrxdigitalhandset == "0") {
            $polycom_body = "$polycom_body" . "\nvoice.gain.rx.digital.handset=\"$voicegainrxdigitalhandset\"";
        }
        if ($voicegainrxdigitalheadset || $voicegainrxdigitalheadset == "0") {
            $polycom_body = "$polycom_body" . "\nvoice.gain.rx.digital.headset=\"$voicegainrxdigitalheadset\"";
        }
        if ($voicevolumepersisthandsfree || $voicevolumepersisthandsfree == "0") {
            $polycom_body = "$polycom_body" . "\nvoice.volume.persist.handsfree=\"$voicevolumepersisthandsfree\"";
        }
        if ($voicevolumepersisthandset || $voicevolumepersisthandset == "0") {
            $polycom_body = "$polycom_body" . "\nvoice.volume.persist.handset=\"$voicevolumepersisthandset\"";
        }
        if ($voicevolumepersistheadset || $voicevolumepersistheadset == "0") {
            $polycom_body = "$polycom_body" . "\nvoice.volume.persist.headset=\"$voicevolumepersistheadset\"";
        }
        if (!$homepage == '') {
            $polycom_body = "$polycom_body" . "\nmb.main.home=\"$homepage\"";
        }
        if (!$callback == '') {
            $polycom_body = "$polycom_body" . "\nmsg.mwi.1.callBack=\"" . $callback . "\"";
        }
        if (!$callbackmode == '') {
            $polycom_body = "$polycom_body" . "\nmsg.mwi.1.callBackMode=\"" . $callbackmode . "\"";
        }
        
    }  
               
    $result_extension = mysql_query("select id, gmtoffset, missedcalls, secret, macaddress, line, site, extension, mailbox, label, firstname, lastname, email, did, setting, voicepass, modified, phonecfg, directorycfg, voicemailcfg, sipcfg, phone_type, setting_sip, setting_polycom, setting_spa from extension where macaddress='$macaddress' order by line") or die(mysql_error());
    $i = 1;
    while ($row_extension = mysql_fetch_array($result_extension)) {
        //$macaddress = strtolower($row_extension['macaddress']);
        //$polycom_file = $gen_path . $macaddress . "-phone.cfg";
        //$fh = fopen($polycom_file, 'a') or die("can't open file");

        $line = $i++;
        
        $id = $row_extension["id"];        
        $line_update = mysql_query("update extension set line='$line' where id='$id'") or die(mysql_error());
        
        $gmtoffset = $row_extension["gmtoffset"];


	if ( ($line==1) & (!empty($gmtoffset)) ){
                $polycom_body = "$polycom_body" . "\ntcpIpApp.sntp.gmtOffset=\"" . $gmtoffset . "\"";
	}


        $missedcalls = $row_extension["missedcalls"];
                
        $setting_sip = $row_extension["setting_sip"];
        $setting_polycom = $row_extension["setting_polycom"];
        $setting_spa = $row_extension["setting_spa"];


        $site = $row_extension["site"];
        $password = $row_extension["secret"];
        $extension = $row_extension["extension"];
        $mailbox = $row_extension["mailbox"];
        $label = $row_extension["label"];
        if ((empty($label)) || ($label == "")) {
            $label = $extension;
        }
        $agent = $row_extension["agent"];
        $firstname = $row_extension["firstname"];
        $lastname = $row_extension["lastname"];
        $email = $row_extension["email"];
        $did = $row_extension["did"];
        $setting = $row_extension["setting"];
        $voicepass = $row_extension["voicepass"];
        $operator = $row_extension["operator"];
        $modified = $row_extension["modified"];
        $phone_type = $row_extension["phone_type"];
        $phonecfg = $row_extension["phonecfg"];
        $directorycfg = $row_extension["directorycfg"];
        $voicemailcfg = $row_extension["voicemailcfg"];
        $sipcfg = $row_extension["sipcfg"];
        $phone_type = $row_extension["phone_type"];
        if ($phone_type = polycom) {
            $result_setting_poly_1 = mysql_query("select voipprot1, voipprot2 from setting_polycom WHERE id='$setting_polycom' limit 1") or die(mysql_error());
            while ($row_setting_poly_1 = mysql_fetch_array($result_setting_poly_1)) {
                $sip_server_1 = $row_setting_poly_1['voipprot1'];
                $sip_server_2 = $row_setting_poly_1['voipprot2'];
            }
            
            if ($idledisplay == "on" & $line == "1") {
                $polycom_body = "$polycom_body" . "\nmb.idleDisplay.home=\"http://$sip_server_1/polycom/$extension.xhtml\"\nmb.idleDisplay.refresh=\"4\"";
            }
            if (!$sip_server_1 == '') {
                $polycom_body = "$polycom_body" . "\nreg.$line.server.1.address=\"$sip_server_1\"";
            }
            if (!$sip_server_2 == '') {
                $polycom_body = "$polycom_body" . "\nreg.$line.server.2.address=\"$sip_server_2\"";
            }
            $polycom_body = "$polycom_body
reg.$line.auth.password=\"$password\"
reg.$line.label=\"$label\"
reg.$line.address=\"$extension\"
reg.$line.auth.userId=\"$extension\"
reg.$line.displayName=\"$extension\"";    
        
        }        
           

    }        
   
    // footer       
    $polycom_body = "$polycom_body
/>
</PHONE_CONFIG>";      

        
    fwrite($fh, $polycom_body);
    fclose($fh);

}



if (!empty($gennum)) {
    echo "<b>polycom</b><br/>";
    echo "$gennum" . "<br/>";
}
mysql_query("update extension set modified='0'") or die(mysql_error());
?>





