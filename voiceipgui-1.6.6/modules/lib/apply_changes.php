<div class="extension_add_bar">

    <a class="button4" href="/voiceip/administration/apply/">apply</a> 
    <a class="button1" href="/voiceip/administration/extensions/">extensions</a>    
    <a class="button1" href="/voiceip/administration/settings/polycom/">polycom</a>  
    <a class="button1" href="/voiceip/administration/settings/sip/">sip</a>       
      
</div>

<?php 



mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$result_mac = mysql_query("select id from extension where secret is NULL") 
or die(mysql_error()); 

while($row_mac = mysql_fetch_array( $result_mac )) {
    $id=$row_mac['id'];
    $secret = randString(20);
    $result = mysql_query("update extension set secret='$secret' where id='$id';");
}


$backup_name="apply";


include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/backup.php");
include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/generate_delete.php");
echo '<div class="extension_edit">';
echo "<b>Generated configuration files</b><br /><br />";
include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/generate_polycom.php");
//include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/generate_spa.php");
include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/generate_asterisk.php");
include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/generate_operator.php");
include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/generate_move.php");
include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/reload_asterisk.php");
include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/reload_panel.php");
echo '</div><div class="extension_edit">';
include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/reload_check.php");
echo '</div>';
//}
?>
</div>
