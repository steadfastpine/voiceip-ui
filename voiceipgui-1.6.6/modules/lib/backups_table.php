<table class="extensions" border="0" cellspacing="0">
<tr><th>&nbsp;</th><th>date</th><th>generated&nbsp;by</th><th>restore&nbsp;backup</th><th>download&nbsp;backup</th></tr>
<?php
$dir = "/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/backup";
if ($handle = opendir($dir)) {
    $files = array();
    while (false !== ($file = readdir($handle))) {
        $files[$file] = preg_replace('/[^0-9]/', '', $file);
    }
    closedir($handle);
    arsort($files);
    $files = array_keys($files);
    foreach ($files as & $row) {
        $filename_raw = $row;
        $filebase = explode(".", $row);
        $filedate = $filebase[2];
        $filename = $filebase[1];
        if (!$filedate == '') {
            echo "<tr><td></td><td>$filedate</td><td>$filename button</td><td>
<form method=\"POST\" action=\"/voiceip/administration/backups/\" enctype=\"multipart/form-data\">
<input value=\"backups\" name=\"page\" type=\"hidden\" >
<input value=\"backup_restore\" name=\"backup_restore\" type=\"hidden\" >
<input value=\"$filename_raw\" name=\"file\" type=\"hidden\" >
<input class=\"button1\" type=\"submit\" value=\"restore\" >
</form>
</div>
</td><td>
<form method=\"POST\" action=\"/voiceip/download/\" enctype=\"multipart/form-data\" target=\" _new\">
<input value=\"backups\" name=\"page\" type=\"hidden\" >
<input value=\"backup_download\" name=\"backup_download\" type=\"hidden\" >
<input value=\"$filename_raw\" name=\"file\" type=\"hidden\" >
<input class=\"button1\" type=\"submit\" value=\"download\" >
</form>
</div>
</td></tr>";
        }
    }
}
?>
</table>
