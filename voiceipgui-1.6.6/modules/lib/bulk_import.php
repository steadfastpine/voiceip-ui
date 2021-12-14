<?php


$gen_path = "/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/upload/bulk_data.csv";
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$fh = fopen($gen_path, 'w') or die("can't open file");
$extension_bulk_data = preg_replace("/(^[\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $extension_bulk_data);
fwrite($fh, $extension_bulk_data);
fclose($fh);
$extension_bulk_data = explode("\n", $extension_bulk_data);
$bulk_header = $extension_bulk_data[0];
function cutline($filename, $line_no = - 1) {
    $strip_return = FALSE;
    $data = file($filename);
    $pipe = fopen($filename, 'w');
    $size = count($data);
    if ($line_no == - 1) $skip = $size - 1;
    else $skip = $line_no - 1;
    for ($line = 0;$line < $size;$line++) if ($line != $skip) fputs($pipe, $data[$line]);
    else $strip_return = TRUE;
    return $strip_return;
}


cutline("$gen_path", 1);
mysql_query("load data local infile '$gen_path' into table extension fields terminated by ',' enclosed by '\"' lines terminated by '\n' ($bulk_header)");
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$result = mysql_query("update extension set phone_type='polycom' where phone_type is NULL;");
$result = mysql_query("update extension set mailbox=extension where mailbox is NULL;");
$result = mysql_query("update extension set label=extension where label is NULL;");
$result = mysql_query("update extension set setting_polycom='default' where setting_polycom is NULL;");
$result = mysql_query("update extension set setting_spa='default' where setting_spa is NULL;");
$result = mysql_query("update extension set setting_sip='default' where setting_sip is NULL;");
$result = mysql_query("update extension set voicepass='1234' where voicepass is NULL;");
$result = mysql_query("update extension set modified='1' where modified is NULL;");
$result = mysql_query("update extension set context='from-sip' where context is NULL;");
$result = mysql_query("update extension set line='1' where line is NULL;");




mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$result_mac = mysql_query("select id from extension where secret is NULL") 
or die(mysql_error()); 

while($row_mac = mysql_fetch_array( $result_mac )) {
    $id=$row_mac['id'];
    $secret = randString(20);
    $result = mysql_query("update extension set secret='$secret' where id='$id';");
}






?>










