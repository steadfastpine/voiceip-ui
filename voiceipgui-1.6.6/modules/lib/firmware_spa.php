<?php 
echo "Sending firmware update to SPA phone $macaddress<br /><br />";
$mac_format_spa=strtoupper($mac);
echo "$ipaddress" . "/administration/resync?tftp://$ip_tftp/spa962-6-1-5a.bin<br>";
exec("curl $ipaddress/upgrade?tftp://$ip_tftp/spa962-6-1-5a.bin");
echo "<br />";
?>
