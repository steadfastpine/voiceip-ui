<div class="extension_add_bar">
    
    <a class="button1" href="/voiceip/administration/apply/">apply</a> 
    <a class="button1" href="/voiceip/administration/extensions/">extensions</a>    
    <a class="button1" href="/voiceip/administration/settings/polycom/">polycom</a>  
    <a class="button4" href="/voiceip/administration/settings/sip/">sip</a>    
    
    <form class="bar_quick_add" method="POST" action="/voiceip/administration/settings/sip/" enctype="multipart/form-data">
        <input class="button1" type="submit" value="add sip setting">
        <input value="settings_sip_edit" name="settings_sip_edit" type="hidden">
        <input value="settings_sip_add" name="settings_sip_add" type="hidden">
    </form>
</div>

<?php 

if ($settings_sip_edit==settings_sip_edit){

    if ($settings_sip_update==settings_sip_update){
        include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/settings_sip_update.php");
    }
    
    if ($settings_sip_add==settings_sip_add){
        include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/settings_sip_add.php");
    }
    
    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/settings_sip_edit.php");
    
}else{

    if ($settings_sip_delete==settings_sip_delete){

        include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/settings_sip_delete.php");
    }
    
    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/settings_sip_table.php");
}

?>



