<?php 
session_start();
$versionnumber = file_get_contents("/var/lib/voiceipgui/active.version");
$versionnumber = chop($versionnumber);

include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/variables.php");
if ($term1 == "logout") {
    $_SESSION['login'] = "";
    header("Location: /");
    exit;
}
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$key_check = mysql_query("select session_key from users where user_name='$user_name'") or die(mysql_error());
while ($row = mysql_fetch_array($key_check)) {
    $secret_word_c = $row["session_key"];
}
unset($user_name);
if ($_SESSION['login']) {
    list($c_user_name, $c_userid, $cookie_hash) = explode(',', $_SESSION['login']);
    if (md5($c_user_name . $secret_word_c) == $cookie_hash) {
        $user_name = $c_user_name;
        $logged_in = "yes";
    }
}



function cdrpage_getpost_ifset($test_vars)
{
    if (!is_array($test_vars)) {
	    $test_vars = array($test_vars);
    }
    foreach($test_vars as $test_var) { 
	    if (isset($_POST[$test_var])) { 
		    global $$test_var;
		    $$test_var = $_POST[$test_var]; 
	    } elseif (isset($_GET[$test_var])) {
		    global $$test_var; 
		    $$test_var = $_GET[$test_var];
	    }
    }
}
    

cdrpage_getpost_ifset(array('s', 't'));
$array = array ("INTRO", "CDR REPORT", "CALLS COMPARE", "MONTHLY TRAFFIC","DAILY LOAD", "CONTACT");
$s = $s ? $s : 0;
$section="section$s$t";
$racine=$PHP_SELF;
$update = "03 March 2005";
$paypal="NOK"; 

//echo "---$section---";    

include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/header.php");
include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/sidebar.php");


if ($term2 == "statistics") {

    if ( ($section != "section1") & ($section != "section2") & ($section != "section3") & ($section != "section4") & ($term3 == "") ) {
        include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/statistics.php");
    }   


    if ($section=="section1"){
        require("call-log.php");

    }


    if ($section=="section2"){
        require("call-comp.php");

    }


    if ($section=="section3"){
        require("call-last-month.php");
    }


    if ($section=="section4"){
        require("call-daily-load.php");
    }

}



?>
		


