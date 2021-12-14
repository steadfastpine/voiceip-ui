<?php 
$manager_host = "127.0.0.1";
$manager_port = "5038";
$manager_connection_timeout = 30;
/* Connect to the manager */
$fp = fsockopen($manager_host, $manager_port, $errno, $errstr, $manager_connection_timeout);
if (!$fp) {
    echo "There was an error connecting to the manager: $errstr (Error Number: $errno)\n";
} else {
    $login = "Action: login\r\n";
    $login.= "Username: $manager_user\r\n";
    $login.= "Secret: $manager_pass\r\n";
    $login.= "Events: Off\r\n";
    $login.= "\r\n";
    fwrite($fp, $login);
    $manager_version = fgets($fp);
    $cmd_response = fgets($fp);
    $response = fgets($fp);
    $blank_line = fgets($fp);
    if (substr($response, 0, 9) == "Message: ") {
        $loginresponse = trim(substr($response, 9));
        if (!$loginresponse == "Authentication Accepted") {
            echo "-- Unable to log in: $loginresponse\n";
            fclose($fp);
            //exit(0);
            
        } else {
            $checkpeer = "Action: Command\r\n";
            $checkpeer.= "Command: reload\r\n";
            $checkpeer.= "\r\n";
            fwrite($fp, $checkpeer);
            $line = trim(fgets($fp));
            $found_entry = false;
            while ($line != "--END COMMAND--") {
                if (substr($line, 0, 6) == "Status") {
                    $status = trim(substr(strstr($line, ":"), 1));
                    $found_entry = true;
                    if (substr($status, 0, 2) == "OK") {
                        $peer_ok = true;
                    } else {
                        $peer_ok = false;
                    }
                }
                $line = trim(fgets($fp));
            }
            if ($found_entry == false) {
                //echo "-- We didn't get the response we were looking for.\n";
                
            } else if ($peer_ok == true) {
                $peer_online = "online";
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

?>
