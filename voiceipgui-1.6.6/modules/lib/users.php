<div class="extension_add_bar">

    <a class="button1" href="/voiceip/administration/apply/">apply</a> 
    <a class="button1" href="/voiceip/administration/extensions/">extensions</a>    
    <a class="button1" href="/voiceip/administration/settings/polycom/">polycom</a>   
    <a class="button1" href="/voiceip/administration/settings/sip/">sip</a>       
       
</div>


<?php 

if ($users_edit==users_edit){
    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/users_edit.php");
    if ($users_update==users_update){
        include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/users_update.php");      
    }
    //if ($users_add==users_add){
    //    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/users_add.php");
    //}
}

if ($users_edit=='' ) {
    //if ($users_delete==users_delete){
    //    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/users_delete.php");
    //}
    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/users_table.php");
}
?>


