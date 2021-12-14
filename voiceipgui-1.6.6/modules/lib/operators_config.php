<div class="extension_add_bar">
    <a class="button1" href="/voiceip/administration/apply/">apply</a> 
    <a class="button1" href="/voiceip/administration/extensions/">extensions</a>    
    <a class="button1" href="/voiceip/administration/settings/polycom/">polycom</a>   
    <a class="button1" href="/voiceip/administration/settings/sip/">sip</a>       

    <form class="bar_quick_add" method="POST" action="/voiceip/administration/operators/" enctype="multipart/form-data">
        <input class="button1" type="submit" value="add panel">
        <input value="operator_edit" name="operator_edit" type="hidden">
    </form>
    

</div>


<?php 

if ($operator_edit==operator_edit){

    if ($operator_update==operator_update){
        include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/operators_config_update.php");
    }
    
    if ($operator_add==operator_add){
        include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/operators_config_add.php");
    }
    
    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/operators_config_edit.php");
}
if ($operator_edit=='' ) {

    if ($operator_delete==operator_delete){
        include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/operators_config_delete.php");
    }
    
    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/operators_config_table.php");
}

?>



