<?php 
// Where the file is going to be placed 
$target_path = "/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/upload/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
$backup_name=upload;
include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/backup.php");
echo "The file ".basename( $_FILES['uploadedfile']['name'])." has been uploaded.<br /><br/>";
$file=basename( $_FILES['uploadedfile']['name']);
$filebase=explode(".gz",$file);
$filename=$filebase[0];
system("gunzip /var/lib/voiceipgui/voiceipgui-$versionnumber/modules/upload/$filename");
system("mysql -hlocalhost -u$dbuser -p$dbpassword $dbname < /var/lib/voiceipgui/voiceipgui-$versionnumber/modules/upload/$filename");

 echo "Backup profile $filename is now active.<br/><br/>";
system("gzip /var/lib/voiceipgui/voiceipgui-$versionnumber/modules/upload/$filename");
} else{
 echo "There was an error uploading the file, please try again!<br/><br/>";
}
?>
