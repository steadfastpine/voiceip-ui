<?php
$gen_path = "/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/output/";
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
echo "<b>asterisk</b><br/>
iax.auto.conf<br />
sip.auto.conf<br />
voicemail.conf<br />";
$filehandle_iax_conf =       $gen_path . "iax.auto.conf";
$filehandle_iax_conf =       fopen($filehandle_iax_conf, 'w') or die("can't open file");
$filehandle_sip_conf =       $gen_path . "sip.auto.conf";
$filehandle_sip_conf =       fopen($filehandle_sip_conf, 'w') or die("can't open file");
$filehandle_voicemail_conf = $gen_path . "voicemail.conf";
$filehandle_voicemail_conf = fopen($filehandle_voicemail_conf, 'w') or die("can't open file");
$filehandle_did_conf =       $gen_path . "did.auto.conf";
$filehandle_did_conf =       fopen($filehandle_did_conf, 'w') or die("can't open file");
$filehandle_cid_conf =       $gen_path . "cid.auto.conf";
$filehandle_cid_conf =       fopen($filehandle_cid_conf, 'w') or die("can't open file");
$voicemail_conf_content = "[general]
format=wav
attach=yes
review=yes
minsecs=2
maxsecs=300
maxsilence=30
operator=yes
pollmailboxes=yes
;externnotify=/etc/asterisk/externnotify/sync.sh
emailsubject=[PBX]: New Message in ( \${VM_NAME} \${VM_MAILBOX} ) #\${VM_MSGNUM} from ( \${VM_CIDNUM} ) name( \${VM_CIDNAME} )
emailbody=\${VM_NAME}:\\n\\n\\tA message was just received in mailbox \${VM_MAILBOX}.\\n\\n\\nmessage number:\\t\\t\${VM_MSGNUM}\\nmessage duration:\\t\${VM_DUR}\\n\\ncaller number:\\t\\t\${VM_CIDNUM}\\ncaller name:\\t\\t\${VM_CIDNAME}\\n\\n\\n\\t\\t\\t\\t--Telephone System\\n
	
[default]
";
fwrite($filehandle_voicemail_conf, $voicemail_conf_content);
$iax_conf_content ='';
$cid_conf_content ='';
$did_conf_content ='';
$sip_conf_content ='';
$voicemail_conf_content ='';
$result_extension = mysql_query("select id, nat, context, secret, macaddress, line, site, extension, mailbox, label, firstname, lastname, email, did, setting, voicepass, modified, phonecfg, directorycfg, voicemailcfg, iaxcfg, sipcfg, phone_type, setting_sip, setting_polycom, setting_spa from extension order by extension") or die(mysql_error());
while ($row_extension = mysql_fetch_array($result_extension)) {
    $nat = $row_extension["nat"];  
    $setting_sip = $row_extension["setting_sip"];
    $macaddress = $row_extension["macaddress"];
    $line = $row_extension["line"];
    $site = $row_extension["site"];
    $extension_pre = $row_extension["extension"];
    $extension = rtrim($extension_pre, "\n");
    $mailbox = $row_extension["mailbox"];
    $label = $row_extension["label"];
    $agent = $row_extension["agent"];
    $firstname = $row_extension["firstname"];
    $lastname = $row_extension["lastname"];
    $email = $row_extension["email"];
    $did = $row_extension["did"];
    $setting = $row_extension["setting"];
    $voicepass = $row_extension["voicepass"];
    
    if (empty($voicepass)) {
        $voicepass = "1234";
    }
    
    $operator = $row_extension["operator"];
    $modified = $row_extension["modified"];
    $phone_type = $row_extension["phone_type"];
    $directorycfg = $row_extension["directorycfg"];
    $iaxcfg = $row_extension["iaxcfg"];
    $sipcfg = $row_extension["sipcfg"];    
    $voicemailcfg = $row_extension["voicemailcfg"];    
    $voicemail_directory_include = "";
    $context = $row_extension["context"];   
    $secret = $row_extension["secret"];      
    if (!$directorycfg=="on") {
        $voicemail_directory_include = "|hidefromdir=yes";
    }
    
    $result_setting_sip = mysql_query("select setting, password, callerid, type, host, qualify, port, nat, canreinvite, dtmfmode, allow, insecure, fromuser, incominglimit, callgroup, pickupgroup from setting_sip where id='$setting_sip'") or die(mysql_error());
    while ($row_setting_sip = mysql_fetch_array($result_setting_sip)) {
        $setting = $row_setting_sip["setting"];
        //$password = $row_setting_sip["password"];
        $callerid = $row_setting_sip["callerid"];
        $type = $row_setting_sip["type"];
        $host = $row_setting_sip["host"];
        $qualify = $row_setting_sip["qualify"];
        $port = $row_setting_sip["port"];
        //$nat = $row_setting_sip["nat"];
        $canreinvite = $row_setting_sip["canreinvite"];
        $dtmfmode = $row_setting_sip["dtmfmode"];
        $allow = $row_setting_sip["allow"];
        $insecure = $row_setting_sip["insecure"];
        $fromuser = $row_setting_sip["fromuser"];
        $incominglimit = $row_setting_sip["incominglimit"];
        $callgroup = $row_setting_sip["callgroup"];
        $pickupgroup = $row_setting_sip["pickupgroup"];
        $modified = $row_setting_sip["modified"];
    }
    
    
    if ( (!empty($extension)) & ($sipcfg==on) ) {   
    
        $sip_conf_content =$sip_conf_content . "
[$extension]			    ; $macaddress
defaultuser=$extension\n";
        if (!$mailbox == '') {
            $sip_conf_content = $sip_conf_content . "mailbox=$mailbox@default\n";
        }
        if (!$context == '') {
            $sip_conf_content = $sip_conf_content . "context=$context\n";
        }
        if (!$host == '') {
            $sip_conf_content = $sip_conf_content . "host=$host\n";
        }
        if (!$type == '') {
            $sip_conf_content = $sip_conf_content . "type=$type\n";
        }        
        if (!$qualify == '') {
            $sip_conf_content = $sip_conf_content . "qualify=$qualify\n";
        }
        if (!$port == '') {
            $sip_conf_content = $sip_conf_content . "port=$port\n";
        }
        if (!$nat == '') {
            $sip_conf_content = $sip_conf_content . "nat=$nat\n";
        }
        if (!$dtmfmode == '') {
            $sip_conf_content = $sip_conf_content . "dtmfmode=$dtmfmode\n";
        }
        if (!$allow == '') {
            $sip_conf_content = $sip_conf_content . "allow=$allow\n";
        }
        if (!$insecure == '') {
            $sip_conf_content = $sip_conf_content . "insecure=$insecure\n";
        }
        if (!$fromuser == '') {
            $sip_conf_content = $sip_conf_content . "fromuser=$fromuser\n";
        }
        if (!$incominglimit == '') {
            $sip_conf_content = $sip_conf_content . "call-limit=$incominglimit\n";
        }
        if (!$canreinvite == '') {
            $sip_conf_content = $sip_conf_content . "directmedia=$canreinvite\n";
        }
        if (!$callgroup == '') {
            $sip_conf_content = $sip_conf_content . "callgroup=$callgroup\n";
        }
        if (!$pickupgroup == '') {
            $sip_conf_content = $sip_conf_content . "pickupgroup=$pickupgroup\n";
        }
        if (!$callerid == '') {
            $sip_conf_content = $sip_conf_content . "callerid=\"$firstname $lastname\" <$extension>\n";
        }
        if (!$secret == '') {
            $sip_conf_content = $sip_conf_content . "secret=$secret\n";
        }
    }
    if ($voicemailcfg == on) {
        if (!empty($email)) {
            $voicemail_conf_content = $voicemail_conf_content . "$extension => $voicepass,$firstname $lastname,$email,attach=yes|saycid=no|envelope=yes|delete=no$voicemail_directory_include\n";
        } else {
            $voicemail_conf_content = $voicemail_conf_content . "$extension => $voicepass,$firstname $lastname,,\n";
        }
    }
    if ($iaxcfg == on) {
        $iax_conf_content = $iax_conf_content . "
[$extension]
type=$type
context=$context
secret=$secret
host=$host
auth=md5,rsa
callerid=\"$firstname $lastname\" <$extension>
qualify=$qualify
mailbox=$mailbox@default\n";
    }
    if (!empty($did)) {
        $cid_conf_content = $cid_conf_content . "CID_$extension=$did\n";
        $did_conf_content = $did_conf_content . "exten => $did,1,goto(from-internal,$extension,1)\n";
    }
    
 
}
fwrite($filehandle_iax_conf, $iax_conf_content);   
fwrite($filehandle_sip_conf, $sip_conf_content);    
fwrite($filehandle_did_conf, $did_conf_content);
fwrite($filehandle_cid_conf, $cid_conf_content); 
fwrite($filehandle_voicemail_conf, $voicemail_conf_content);  
fclose($filehandle_iax_conf);
fclose($filehandle_sip_conf);
fclose($filehandle_voicemail_conf);
fclose($filehandle_did_conf);
fclose($filehandle_cid_conf);
echo "<br />";
?>
