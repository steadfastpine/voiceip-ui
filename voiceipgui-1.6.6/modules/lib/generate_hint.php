<?php 
$gen_path="/var/lib/voiceip/output/";
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$hint_file = $gen_path."hint.auto.conf";
$fh = fopen($hint_file, 'w')or die("can't open file");
fclose($fh);
echo "hint.auto.conf<br />";
$hint_file = $gen_path."hint.auto.conf";
$fh = fopen($hint_file, 'a')or die("can't open file");
$result_extension = mysql_query("select sidecar1,sidecar2,sidecar3,sidecar4,sidecar5,sidecar6,sidecar7,sidecar8,sidecar9,sidecar10,sidecar11,sidecar12,sidecar13,sidecar14,sidecar15,sidecar16,sidecar17,sidecar18,sidecar19,sidecar20,sidecar21,sidecar22,sidecar23,sidecar24,sidecar25,sidecar26,sidecar27,sidecar28,sidecar29,sidecar30,sidecar31,sidecar32,sidecar33,sidecar34,sidecar35,sidecar36,sidecar37,sidecar38,sidecar39,sidecar40,sidecar41,sidecar42,sidecar43,sidecar44,sidecar45,sidecar46,sidecar47,sidecar48,sidecar49,sidecar50,sidecar51,sidecar52,sidecar53,sidecar54,sidecar55,sidecar56,sidecar57,sidecar58,sidecar59,sidecar60,sidecar61,sidecar62,sidecar63,sidecar64 from setting_spa") 
or die(mysql_error()); 
while($row_extension = mysql_fetch_array( $result_extension )) {
$sidecar1=$row_extension["sidecar1"];
$sidecar2=$row_extension["sidecar2"];
$sidecar3=$row_extension["sidecar3"];
$sidecar4=$row_extension["sidecar4"];
$sidecar5=$row_extension["sidecar5"];
$sidecar6=$row_extension["sidecar6"];
$sidecar7=$row_extension["sidecar7"];
$sidecar8=$row_extension["sidecar8"];
$sidecar9=$row_extension["sidecar9"];
$sidecar10=$row_extension["sidecar10"];
$sidecar11=$row_extension["sidecar11"];
$sidecar12=$row_extension["sidecar12"];
$sidecar13=$row_extension["sidecar13"];
$sidecar14=$row_extension["sidecar14"];
$sidecar15=$row_extension["sidecar15"];
$sidecar16=$row_extension["sidecar16"];
$sidecar17=$row_extension["sidecar17"];
$sidecar18=$row_extension["sidecar18"];
$sidecar19=$row_extension["sidecar19"];
$sidecar20=$row_extension["sidecar20"];
$sidecar21=$row_extension["sidecar21"];
$sidecar22=$row_extension["sidecar22"];
$sidecar23=$row_extension["sidecar23"];
$sidecar24=$row_extension["sidecar24"];
$sidecar25=$row_extension["sidecar25"];
$sidecar26=$row_extension["sidecar26"];
$sidecar27=$row_extension["sidecar27"];
$sidecar28=$row_extension["sidecar28"];
$sidecar29=$row_extension["sidecar29"];
$sidecar30=$row_extension["sidecar30"];
$sidecar31=$row_extension["sidecar31"];
$sidecar32=$row_extension["sidecar32"];
$sidecar33=$row_extension["sidecar33"];
$sidecar34=$row_extension["sidecar34"];
$sidecar35=$row_extension["sidecar35"];
$sidecar36=$row_extension["sidecar36"];
$sidecar37=$row_extension["sidecar37"];
$sidecar38=$row_extension["sidecar38"];
$sidecar39=$row_extension["sidecar39"];
$sidecar40=$row_extension["sidecar40"];
$sidecar41=$row_extension["sidecar41"];
$sidecar42=$row_extension["sidecar42"];
$sidecar43=$row_extension["sidecar43"];
$sidecar44=$row_extension["sidecar44"];
$sidecar45=$row_extension["sidecar45"];
$sidecar46=$row_extension["sidecar46"];
$sidecar47=$row_extension["sidecar47"];
$sidecar48=$row_extension["sidecar48"];
$sidecar49=$row_extension["sidecar49"];
$sidecar50=$row_extension["sidecar50"];
$sidecar51=$row_extension["sidecar51"];
$sidecar52=$row_extension["sidecar52"];
$sidecar53=$row_extension["sidecar53"];
$sidecar54=$row_extension["sidecar54"];
$sidecar55=$row_extension["sidecar55"];
$sidecar56=$row_extension["sidecar56"];
$sidecar57=$row_extension["sidecar57"];
$sidecar58=$row_extension["sidecar58"];
$sidecar59=$row_extension["sidecar59"];
$sidecar60=$row_extension["sidecar60"];
$sidecar61=$row_extension["sidecar61"];
$sidecar62=$row_extension["sidecar62"];
$sidecar63=$row_extension["sidecar63"];
$sidecar64=$row_extension["sidecar64"];
$array2=array($sidecar1, $sidecar2, $sidecar3, $sidecar4, $sidecar5, $sidecar6, $sidecar7, $sidecar8, $sidecar9, $sidecar10, $sidecar11, $sidecar12, $sidecar13, $sidecar14, $sidecar15, $sidecar16, $sidecar17, $sidecar18, $sidecar19, $sidecar20, $sidecar21, $sidecar22, $sidecar23, $sidecar24, $sidecar25, $sidecar26, $sidecar27, $sidecar28, $sidecar29, $sidecar30, $sidecar31, $sidecar32, $sidecar33, $sidecar34, $sidecar35, $sidecar36, $sidecar37, $sidecar38, $sidecar39, $sidecar40, $sidecar41, $sidecar42, $sidecar43, $sidecar44, $sidecar45, $sidecar46, $sidecar47, $sidecar48, $sidecar49, $sidecar50, $sidecar51, $sidecar52, $sidecar53, $sidecar54, $sidecar55, $sidecar56, $sidecar57, $sidecar58, $sidecar59, $sidecar60, $sidecar61, $sidecar62, $sidecar63, $sidecar64);
foreach ($array2 as $i){
$hint_body="exten =>$i,hint,park:$i@parkedcalls\n";
//echo "$hint_body";
fwrite($fh, $hint_body);
}
		
}
fclose($fh);
// remove duplicate lines
// filename
$filename = $gen_path."hint.auto.conf";
$text = array_unique(file($filename));
$f = @fopen($filename,'w+');
if ($f) {
 fputs($f, join('',$text));
 fclose($f);
}
?>
