<?php 

$versionnumber_formatted=str_replace(".", "_",$versionnumber);
$dbname="voiceipgui_db_$versionnumber_formatted";
$dbuser="voiceipgui_user";
$dbpassword=chop(file_get_contents("/var/lib/voiceipgui/passwd/mysql-voiceprov"));


// ami credentials
$manager_user="voiceipgui";
$manager_pass=file_get_contents("/var/lib/voiceipgui/passwd/asterisk-manager");


// tftp server address
$ip_tftp="";
$server_address="";

$user_login=$_POST['user_login'];
$password_login=$_POST['password_login'];

$page=$_POST['page'];


// current url string
$full_url=$_SERVER['REQUEST_URI'];
$terms=explode("/", "$full_url");
$term0=$terms[0];
$term1=$terms[1];
$term2=$terms[2];
$term3=$terms[3];
$term4=$terms[4];


function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_')
{
    $str = '';
    $count = strlen($charset);
    while ($length--) {
        $str .= $charset[mt_rand(0, $count-1)];
    }
    return $str;
}




        

function pc_validate($user,$pass,$dbname,$dbuser,$dbpassword) {
    mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
    mysql_select_db("$dbname") or die(mysql_error());
    $result = mysql_query("select password from users where password='$pass' and user_name='$user'") or die(mysql_error()); 
    while($row = mysql_fetch_array( $result )) {
      $password_c=$row["password"];
    } 
    //echo "--password_check--".$password_c."--<br>";
    if  ($password_c==$pass) {
     
      if  (!empty($password_c)) {
        echo "<br> logn sucessfull<br>"; 
        return true;
      } else{
        exit;
      }
      } else {
          //echo "<br> logn failed";
          return false;
        }
    }
    //echo "--".$_REQUEST['password']."--".$_REQUEST['user_name']."--<br>";
    if ((!empty($user_login)) & (!empty($password_login))) {
    if (pc_validate($_REQUEST['user_login'],$_REQUEST['password_login'],$dbname,$dbuser,$dbpassword)) {
      // 32 character string 
      for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 32; $x = rand(0,$z), $s .= $a{$x}, $i++);
      $secret_word=$s;
    mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
    mysql_select_db("$dbname") or die(mysql_error());
    $user_id_get = mysql_query("select id from users where user_name='$user_login'") 
    or die(mysql_error()); 
    while($row = mysql_fetch_array( $user_id_get )) {
       $user_id=$row["id"];
    } 
    $result = mysql_query("update users set session_key='$secret_word' where user_name='$user_login'") 
    or die(mysql_error()); 
      if  (!$result) {
        echo "login key database update did not execute.<br>";
      }
      $_SESSION['login'] = ($_REQUEST['user_login'].','.$user_id.','.md5($_REQUEST['user_login'].$secret_word));
    header( "Location: /" ) ;
    exit;
    } else {
     $system_message0="<br/><br/></h2>User or password not found.</h2>";
    }
}

$session_var=$_SESSION['login'];
$session_vars=explode(",","$session_var");
$user_name=$session_vars[0];
$user_id=$session_vars[1];


// setting sip
$allow=$_POST["allow"];
$callerid=$_POST["callerid"];
$callgroup=$_POST["callgroup"];
$canreinvite=$_POST["canreinvite"];
$context=$_POST["context"];
$dtmfmode=$_POST["dtmfmode"];
$fromuser=$_POST["fromuser"];
$host=$_POST["host"];
$id=$_POST["id"];
$incominglimit=$_POST["incominglimit"];
$insecure=$_POST["insecure"];
$modified=$_POST["modified"];
$nat=$_POST["nat"];
$password=$_POST["password"];
$pickupgroup=$_POST["pickupgroup"];
$port=$_POST["port"];
$qualify=$_POST["qualify"];
$setting=$_POST["setting"];
$settings_sip_add=$_POST["settings_sip_add"];
$settings_sip_delete=$_POST["settings_sip_delete"];
$settings_sip_edit=$_POST["settings_sip_edit"];
$settings_sip_update=$_POST["settings_sip_update"];
$type=$_POST["type"];



$bulk_update_extensions=$_POST["bulk_update_extensions"];
//echo "--$bulk_update_extensions--";
// extensions
$agent=$_POST["agent"];
$bulk_update_extensions_array=explode(',',$bulk_update_extensions);
$bulk_update_extensions_auth_reset=$_POST["bulk_update_extensions_auth_reset"];
$bulk_update_extensions_delete=$_POST["bulk_update_extensions_delete"];
$bulk_update_extensions=$_POST["bulk_update_extensions"];
$bulk_update_extensions_update=$_POST["bulk_update_extensions_update"];
$bulk_update=$_POST["bulk_update"];
$cidcfg=$_POST["cidcfg"];
$context=$_POST["context"];
$did=$_POST["did"];
$direction=$_POST["direction"];
$directorycfg=$_POST["directorycfg"];
$email=$_POST["email"];
$extension_add=$_POST["extension_add"];
$extension_bulk_add_import=$_POST["extension_bulk_add_import"];
$extension_bulk_add=$_POST["extension_bulk_add"];
$extension_bulk_data=$_POST["extension_bulk_data"];
$extension_bulk=$_POST["extension_bulk"];
$extension_delete=$_POST["extension_delete"];
$extension_edit=$_POST["extension_edit"];
$extension=$_POST["extension"];
$extension_update=$_POST["extension_update"];
$firmware_spa=$_POST["firmware_spa"];
$firstname=$_POST["firstname"];
$gmtoffset=$_POST["gmtoffset"];
$iaxcfg=$_POST["iaxcfg"];
$ipaddress=$_POST["ipaddress"];
$label=$_POST["label"];
$lastname=$_POST["lastname"];
$line=$_POST["line"];
$macaddress=$_POST["macaddress"];
$mailbox=$_POST["mailbox"];
$missedcalls=$_POST["missedcalls"];
$nat=$_POST["nat"];
$operator=$_POST["operator"];
$phonecfg=$_POST["phonecfg"];
$phone_type=$_POST["phone_type"];
$secret=$_POST["secret"];
$setting_polycom=$_POST["setting_polycom"];
$setting=$_POST["setting"];
$setting_sip=$_POST["setting_sip"];
$setting_spa=$_POST["setting_spa"];
$sipcfg=$_POST["sipcfg"];
$site=$_POST["site"];
$sort=$_POST["sort"];
$voicemailcfg=$_POST["voicemailcfg"];
$voicepass=$_POST["voicepass"];


//polycom
$settings_polycom_add=$_POST["settings_polycom_add"];
$settings_polycom_edit=$_POST["settings_polycom_edit"];
$settings_polycom_delete=$_POST["settings_polycom_delete"];
$settings_polycom_update=$_POST["settings_polycom_update"];
$setting=$_POST["setting"];
$callbackmode=$_POST["callbackmode"];
$callback=$_POST["callback"];
$voipprot1=$_POST["voipprot1"];
$voipprot2=$_POST["voipprot2"];
$callerid=$_POST["callerid"];
$homepage=$_POST["homepage"];
$volume=$_POST["volume"];
$loglevelchange=$_POST["loglevelchange"];
$sipoutboundproxy=$_POST["sipoutboundproxy"];
$idleimage500=$_POST["idleimage500"];
$idleimage600=$_POST["idleimage600"];
$idledisplay=$_POST["idledisplay"];
$idledisplayip=$_POST["idledisplayip"];
$missedcalls=$_POST["missedcalls"];
$upanalogHeadsetOption=$_POST["upanalogHeadsetOption"];
$voicegainrxdigitalchassisIP_650=$_POST["voicegainrxdigitalchassisIP_650"];
$voicegainrxdigitalchassis=$_POST["voicegainrxdigitalchassis"];
$voicegainrxanalogchassis=$_POST["voicegainrxanalogchassis"];
$voicegainrxanalogchassisIP_650=$_POST["voicegainrxanalogchassisIP_650"];
$voicegainrxdigitalringerIP_650=$_POST["voicegainrxdigitalringerIP_650"];
$voicegainrxdigitalheadset=$_POST["voicegainrxdigitalheadset"];
$voicegainrxdigitalhandset=$_POST["voicegainrxdigitalhandset"];
$voicevolumepersisthandsfree=$_POST["voicevolumepersisthandsfree"];
$voicevolumepersisthandset=$_POST["voicevolumepersisthandset"];
$voicevolumepersistheadset=$_POST["voicevolumepersistheadset"];
$sntpaddress=$_POST["sntpaddress"];
$gmtoffset=$_POST["gmtoffset"];
$missedcalls=$_POST["missedcalls"];


// users
$operatorcfg=$_POST["operatorcfg"];
$users_edit=$_POST["users_edit"];
$users_update=$_POST["users_update"];
$users_add=$_POST["users_add"];
$users_delete=$_POST["users_delete"];
$password_change=$_POST["password_change"];
$password_confirm=$_POST["password_confirm"];
$update_user_id=$_POST['update_user_id'];
$update_user_name=$_POST['update_user_name'];


// operator panels
$operatorcfg=$_POST["operatorcfg"];
$operator_edit=$_POST["operator_edit"];
$operator_update=$_POST["operator_update"];
$operator_add=$_POST["operator_add"];
$operator_delete=$_POST["operator_delete"];
$id=$_POST["id"];
$panel=$_POST["panel"];


// backups
$backup_upload=$_POST["backup_upload"];
$backup_generate=$_POST["backup_generate"];
$backup_name=$_POST["backup_name"];
$backup_restore=$_POST["backup_restore"];
$backup_download=$_POST["backup_download"];
$file=$_POST["file"];


// save
$save_confirm=$_POST["save_confirm"];


// build
$build_users_path=$_POST["build_users_path"];
$build_sip_path=$_POST["build_sip_path"];
$build_iax_path=$_POST["build_iax_path"];
$build_voicemail_path=$_POST["build_voicemail_path"];
$build_polycom_path=$_POST["build_polycom_path"];


// statistics config
$cdr_database_update=$_POST["cdr_database_update"];
$build_cdr_sync_path=$_POST["build_cdr_sync_path"];





?>








