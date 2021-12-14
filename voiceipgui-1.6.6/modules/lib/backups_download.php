<?php 
$versionnumber=file_get_contents("/var/lib/voiceipgui/active.version");
$versionnumber=chop($versionnumber);
$file=$_POST["file"];
$file=trim($file);
$filen="/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/backup/$file";
ob_end_clean();
header('Content-Type: application/octet-stream');
header("Content-Disposition: attachment; filename=\"$file\"");
@readfile("$filen") or die("File not found.");
ob_flush();
?>
