<div class="extension_add_bar">
    
    <a class="button1" href="/voiceip/administration/apply/">apply</a> 
    <a class="button1" href="/voiceip/administration/extensions/">extensions</a>    
    <a class="button4" href="/voiceip/administration/settings/polycom/">polycom</a>  
    <a class="button1" href="/voiceip/administration/settings/sip/">sip</a>     
    
    <form class="bar_quick_add" method="POST" action="/voiceip/administration/settings/polycom/" enctype="multipart/form-data">
        <input class="button2" type="submit" value="add polycom setting" >
        <input value="settings_polycom_edit" name="settings_polycom_edit" type="hidden" >
        <input value="settings_polycom_add" name="settings_polycom_add" type="hidden" >
    </form>
</div>

<?php 

if ($settings_polycom_edit==settings_polycom_edit){

    if ($settings_polycom_update==settings_polycom_update){
        include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/settings_polycom_update.php");
    }
    
    if ($settings_polycom_add==settings_polycom_add){
        include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/settings_polycom_add.php");
    }
    
    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/settings_polycom_edit.php");
    
}else{
    
    if ($settings_polycom_delete==settings_polycom_delete){
        include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/settings_polycom_delete.php");
    }
    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/settings_polycom_table.php");
}
?>
