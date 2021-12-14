

<?php 
$backup_name=restore;
include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/backup.php");
$filename=$file;
system("gunzip /var/lib/voiceipgui/voiceipgui-$versionnumber/modules/backup/$filename");
system("mysql -hlocalhost -u$dbuser -p$dbpassword $dbname < /var/lib/voiceipgui/voiceipgui-$versionnumber/modules/backup/$filename");
 echo "<div class=\"extension_edit\">Backup profile $filename is now active.<br/><br/>";
 echo "restore filename: /var/lib/voiceipgui/voiceipgui-$versionnumber/modules/backup/$filename<br/><br/></div>";
system("gzip /var/lib/voiceipgui/voiceipgui-$versionnumber/modules/backup/$filename");



?>

