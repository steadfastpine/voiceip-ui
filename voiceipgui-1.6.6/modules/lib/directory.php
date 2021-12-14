<div class="box012">

<h2>Menu Message Recording Lines</h2>


<?php

$vars=passthru("cat /etc/asterisk/extensions.conf|grep -i 'record('|perl -p -i -e 's# ##g;s#exten=>##g;s#exten=##g;s#\;##g;s#,n,# #g;s#,[0-9],# #g;s#$#<br/>#g;'");



?>


</div>
<div class="box012">
<h2>Main Voicemail Access</h2>

<?php

$vars=passthru("cat /etc/asterisk/extensions.conf|grep -i 'VoicemailMain('|grep -i -v 'a,n,'|grep -i -v 'a,[0-9],'|perl -p -i -e 's# ##g;s#exten=>##g;s#exten=##g;s#\;##g;s#,n,# #g;s#,[0-9],# #g;s#$#<br/>#g;'");



?>



</div>



<div class="box012">


<table class="t_directory" border="0" cellspacing="0">
<tr><th>
extension,
</th><th>
did,
</th><th>
firstname,
</th><th>
lastname,
</th></tr>
<?php

mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$result = mysql_query("select * from extension order by extension asc") or die(mysql_error());

while ($row = mysql_fetch_array($result)) {
    echo "<tr><td>" . $row['extension'] . ",</td><td>" . $row['did'] . ",</td><td>" . $row['firstname'] . ",</td><td>" . $row['lastname'] . ",</td></tr>";
}

?>
</table>
</div>


