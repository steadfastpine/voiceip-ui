<?php 
echo "<div class=\"extension_add_bar\">
<form class=\"cell1\" method=\"POST\" action=\"/voiceip/administration/\" enctype=\"multipart/form-data\">
<input class=\"button1\" type=\"submit\" value=\"apply changes\" >
<input value=\"save\" name=\"page\" type=\"hidden\" >
</form>
<form class=\"cell1\" method=\"POST\" action=\"/voiceip/administration/\" enctype=\"multipart/form-data\">
<input class=\"button1\" type=\"submit\" value=\"backup configuration\" >
<input value=\"backup_generate\" name=\"backup_generate\" type=\"hidden\" >
<input value=\"backups\" name=\"backup_name\" type=\"hidden\" >
<input value=\"backups\" name=\"page\" type=\"hidden\" >
</form>
<form enctype=\"multipart/form-data\" action=\"/voiceip/administration/\" method=\"POST\">
<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"100000\" />
<input type=\"hidden\" name=\"backup_upload\" value=\"backup_upload\" />
<input name=\"uploadedfile\" type=\"file\" />
<input type=\"submit\" value=\"Upload File\" />
</form>
</div>";
?>
