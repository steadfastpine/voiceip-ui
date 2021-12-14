<div class="extension_add_bar">

    <a class="button1" href="/voiceip/administration/apply/">apply</a> 
    <a class="button1" href="/voiceip/administration/extensions/">extensions</a>    
    <a class="button1" href="/voiceip/administration/settings/polycom/">polycom</a>  
    <a class="button1" href="/voiceip/administration/settings/sip/">sip</a>       
      
      
</div>

<div class="extension_add_bar">

    <a class="button1"  href="/voiceip/administration/commands/core-show-channels/">core show channels</a>  
    <a class="button1"  href="/voiceip/administration/commands/dahdi-show-channels/">dahdi show channels</a>     
    <a class="button1"  href="/voiceip/administration/commands/iax2-show-peers/">iax2 show peers</a>     
    <a class="button1"  href="/voiceip/administration/commands/iax2-show-registry/">iax2 show registry</a>    
    <a class="button1"  href="/voiceip/administration/commands/sip-show-peers/">sip show peers</a> 
    <a class="button1"  href="/voiceip/administration/commands/sip-show-registry/">sip show registry</a>  

</div>

<?php 

$command = str_replace("-", " ", $term4);


if ($command=="core show channels"){
    $command_exec=$command;
}


if ($command=="dahdi show channels"){
    $command_exec=$command;
}


if ($command=="iax2 show peers"){
    $command_exec=$command;
}

if ($command=="iax2 show registry"){
    $command_exec=$command;
}

if ($command=="sip show peers"){
    $command_exec=$command;
}

if ($command=="sip show registry"){
    $command_exec=$command;
}


?>

<h2 class="command_t"><?php echo $command;?></h2>

<div class="c_response">

<pre>
<?php
$line='';
$c_content='';
$manager_host="127.0.0.1";
$manager_port = "5038";
$manager_connection_timeout = 30;
$peer_name = $exten;
$peer_type = "sip";
$peer_online="offline";
/* Connect to the manager */
$fp = fsockopen($manager_host, $manager_port, $errno, $errstr, $manager_connection_timeout);
if (!$fp) {
    //echo "There was an error connecting to the manager: $errstr (Error Number: $errno)\n";
} else {
//    echo "-- Connected to the Asterisk Manager\n";
//    echo "-- About to log in\n";
    $login = "Action: login\r\n";
    $login .= "Username: $manager_user\r\n";
    $login .= "Secret: $manager_pass\r\n";
    $login .= "Events: Off\r\n";

    fwrite($fp,$login);
    $manager_version = fgets($fp);
    $cmd_response = fgets($fp);
    $response = fgets($fp);
    $blank_line = fgets($fp);
    if (substr($response,0,9) == "Message: ") {
        /* We have got a response */
        $loginresponse = trim(substr($response,9));
        if (!$loginresponse == "Authentication Accepted") {
            echo "-- Unable to log in: $loginresponse\n";
            fclose($fp);
            //exit(0);
        } else {
            //echo "-- Logged in Successfully\n";
            $checkpeer = "Action: Command\r\n";
            $checkpeer .= "Command: $command_exec\r\n";
            $checkpeer .= "\r\n";
            fwrite($fp,$checkpeer);
            $line = trim(fgets($fp));
            
         
            $found_entry = false;
            while ($line != "--END COMMAND--") {
                if (substr($line,0,6) == "Status") {
                    $status = trim(substr(strstr($line, ":"),1));
                    $found_entry = true;
                    if (substr($status,0,2) == "OK") {
                        $peer_ok = true;
                    } else {
                        $peer_ok = false;
                    }
                }
                $line = trim(fgets($fp));
                

                $str=$line;
if ( (  strpos ($str,"Privilege:" ) === FALSE ) & (  strpos ($str,"Status:" ) === FALSE )& (  strpos ($str,"Response:" ) === FALSE ) & (  strpos ($str,"--END COMMAND--" ) === FALSE )) {
 $c_content=$c_content."$line"."<br>";
}
                
                //echo "$line"."<br>";
                 
            }
            if ($found_entry == false) {
                //echo "-- We didn't get the response we were looking for - is the peer name correct? Use ?ext=XXX after the URL\n";
            } else if ($peer_ok == true) {
                $peer_online="online";
  

                
            } else {
              
            }
            fclose($fp);
            //exit(0);
        }
    } else {
        //echo "Unexpected response: $response\n";
        fclose($fp);
        //exit(0);
    }
}



$c_content = preg_replace("/^(.*\n){4}/", "",$c_content);

echo $c_content;


?>

</pre>
</div>
