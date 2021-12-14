<div class="extension_add_bar">
    <a class="button1" href="/voiceip/administration/apply/">apply</a> 
    <a class="button1" href="/voiceip/administration/extensions/">extensions</a>    
    <a class="button1" href="/voiceip/administration/settings/polycom/">polycom</a>  
    <a class="button1" href="/voiceip/administration/settings/sip/">sip</a>       
      
    
<form class="bar_quick_add" method="POST" action="/voiceip/administration/backups/" enctype="multipart/form-data">
<input class="button1" type="submit" value="backup configuration">
<input value="backup_generate" name="backup_generate" type="hidden">
<input value="backups" name="backup_name" type="hidden">
<input value="backups" name="page" type="hidden">
</form>
<form class="bar_quick_add" enctype="multipart/form-data" action="/voiceip/administration/backups/" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
<input class="upload01" name="uploadedfile" type="file" title="choose file"/>
<input value="backups" name="page" type="hidden">
<input value="backup_upload" name="backup_upload" type="hidden">
<input class="button1" type="submit" value="import backup file" />
</form>
</div>

<?php 

if ($backup_upload==backup_upload){
    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/backups_upload.php");
}
if ($backup_download==backup_download){
    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/backups_download.php");
}
if ($backup_generate==backup_generate){
    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/backup.php");
}
if ($backup_restore==backup_restore){
    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/backups_restore.php");
}

include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/backups_table.php");

?>




