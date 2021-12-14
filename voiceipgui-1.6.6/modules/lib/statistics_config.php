<div class="extension_add_bar">
    
    <a class="button1" href="/voiceip/administration/apply/">apply</a> 
    <a class="button1" href="/voiceip/administration/extensions/">extensions</a>    
    <a class="button1" href="/voiceip/administration/settings/polycom/">polycom</a>  
    <a class="button1" href="/voiceip/administration/settings/sip/">sip</a>       
        
    
</div>

<div class="extension_edit">

    <div class="build_nav">

        <form method="post" action="/voiceip/administration/statistics/" >
            <input type="hidden" name="cdr_database_update" value="cdr_database_update" />
            <span></span>
            <input type="submit" value="update crm database">
        </form>

        <form method="post" action="/voiceip/administration/statistics/" >
            <input type="text" name="build_cdr_sync_path" value="/var/log/asterisk/cdr-csv/Master.csv" />
            <input type="submit" value="syncronize crm database">
        </form>

    </div>
    
    
    
    
</div>
<div class="diag_box_build">
<textarea>

<?php 


if (!empty($cdr_database_update)){
    //echo "--$versionnumber_formatted--";
    system("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/database_update_cdr.bash $versionnumber_formatted");
}

if (!empty($build_cdr_sync_path)){
    system("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/database_update_cdr.bash $versionnumber_formatted");
    system("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/cdr_sync.php $build_cdr_sync_path");
}


?>


</textarea>
</div>







