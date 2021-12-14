<div class="extension_edit">
    <?php 
    $backupFile = "pbx_backup." ."$backup_name." . date("Y-m-d:H:i:s").".sql";
    $command = "mysqldump --opt -h localhost -u $dbuser -p$dbpassword $dbname > /var/lib/voiceipgui/voiceipgui-$versionnumber/modules/backup/$backupFile";
    system($command);
    echo "<b>Backed up configuration</b><br /><br />Current backup profile saved as $backupFile<br /><br />";
    ?>
</div>
