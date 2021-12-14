<div class="extension_add_bar">
    
    <a class="button1" href="/voiceip/administration/apply/">apply</a> 
    <a class="button4" href="/voiceip/administration/extensions/">extensions</a>    
    <a class="button1" href="/voiceip/administration/settings/polycom/">polycom</a>  
    <a class="button1" href="/voiceip/administration/settings/sip/">sip</a>          

    <form class="bar_quick_add2" method="POST" action="/voiceip/administration/extensions/" enctype="multipart/form-data">
        <input class="button2" type="submit" value="add extension">
        <input value="extension_edit" name="extension_edit" type="hidden">
        <input value="extension_add" name="extension_add" type="hidden">
        <input class="text1" type="text" name="extension" size="20" maxlength="50" value=""> exten
        <input class="text1" type="text" name="macaddress" size="20" maxlength="50" value=""> mac
        <input class="text1" type="text" name="firstname" size="20" maxlength="50" value=""> firstname
        <input class="text1" type="text" name="lastname" size="20" maxlength="50" value=""> lastname
    </form>
    
</div>

<?php 

//echo "--$bulk_update_extensions_delete--$bulk_update_extensions";

$checked_list='';
if ( ($bulk_update_extensions) & ($bulk_update_extensions_delete) ){
    //echo $bulk_update_extensions_array[1] . "<br/>";
    foreach($bulk_update_extensions_array as $bulk_update_extension){
        //echo "--bulk_update_extension--$bulk_update_extension--<br/>";
        
        mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
        mysql_select_db("$dbname") or die(mysql_error());
        $result = mysql_query("delete from extension WHERE id='$bulk_update_extension';") 
        or die(mysql_error());     
    }
}



if ( ($bulk_update_extensions) & ($bulk_update_extensions_auth_reset) ){
    //echo $bulk_update_extensions_array[1] . "<br/>";
    foreach($bulk_update_extensions_array as $bulk_update_extension){
        //echo "----$bulk_update_extension---<br/>";
        //echo $auth_reset_extension;

        mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
        mysql_select_db("$dbname") or die(mysql_error()); 
        $secret = randString(20);
        
        //echo "----$secret---<br/>";    
        $result = mysql_query("update extension set secret='$secret' where id='$bulk_update_extension';");
  
    }
}



$update_line='';
// Bulk update extensions
$checked_list='';
if ( ($bulk_update_extensions) & ($bulk_update_extensions_update) ){
    //echo $bulk_update_extensions_array[1] . "<br/>";
    foreach($bulk_update_extensions_array as $bulk_update_extension){
        //echo "----$setting_sip---<br/>";
        //echo $bulk_update_extension;
        //$checked_list=$checked_list.$bulk_update_extension;
        if (!empty($nat)){
        $update_line=$update_line.", nat='$nat'";
        }          
        if (!empty($cidcfg)){
        $update_line=$update_line.", cidcfg='$cidcfg'";
        }        
        if (!empty($phonecfg)){
        $update_line=$update_line.", phonecfg='$phonecfg'";
        }
        if (!empty($directorycfg)){
        $update_line=$update_line.", directorycfg='$directorycfg'";
        }
        if (!empty($voicemailcfg)){
        $update_line=$update_line.", voicemailcfg='$voicemailcfg'";
        }
        if (!empty($iaxcfg)){
        $update_line=$update_line.", iaxcfg='$iaxcfg'";
        }
        if (!empty($sipcfg)){
        $update_line=$update_line.", sipcfg='$sipcfg'";
        }
        if (!empty($setting_sip)){
        $update_line=$update_line.", setting_sip='$setting_sip'";
        }
        if (!empty($setting_polycom)){
        $update_line=$update_line.", setting_polycom='$setting_polycom'";
        } 
        if (!empty($voicepass)){
        $update_line=$update_line.", voicepass='$voicepass'";
        } 
        if (!empty($secret)){
        $update_line=$update_line.", secret='$secret'";
        } 
        if (!empty($context)){
        $update_line=$update_line.", context='$context'";
        } 
        if (!empty($gmtoffset)){
        $update_line=$update_line.", gmtoffset='$gmtoffset'";
        }         
        if (!empty($missedcalls)){
        $update_line=$update_line.", missedcalls='$missedcalls'";
        }         
        //echo "--$update_line--";
        mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
        mysql_select_db("$dbname") or die(mysql_error());
        $result = mysql_query("update extension set modified='1'$update_line WHERE id='$bulk_update_extension';") 
        or die(mysql_error());     
    }
}



if ($extension_edit==extension_edit){

    if ($extension_update==extension_update){
        include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/extensions_update.php");
    }
    if ($extension_add==extension_add){
        include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/extensions_add.php");
    }

    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/extensions_edit.php");
}



if ($extension_bulk=='' & $extension_edit=='') {

    if ($extension_delete==extension_delete){
        include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/extensions_delete.php");
    }
    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/extensions_table.php");
}

?>





