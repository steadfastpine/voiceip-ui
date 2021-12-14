<?php 
$socket = fsockopen("127.0.0.1","5038", $errno, $errstr, 99999999999999);
fputs($socket, "Action: Login\n");
fputs($socket, "UserName: $manager_user\n");
fputs($socket, "Secret: $manager_pass\n");
fputs($socket, "\n");
fputs($socket, "Action: Originate\n");
fputs($socket, "Channel: local/s@reload_operator\n");
fputs($socket, "Context: reload_operator\n");
fputs($socket, "Extension: s\n");
fputs($socket, "Priority: 1\n");
fputs($socket, "\n");
$wrets=fgets($socket,128);
fclose($socket);
?>
