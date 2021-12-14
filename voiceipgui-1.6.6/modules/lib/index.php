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



// non gui html items
if ($term2 == "livesearch.php") {
    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/livesearch.php");
}

if ($term2 == "bulk_update.php") {
    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/bulk_update.php");
}






// process each gui page


if ( ($term2 != "download") & ($term2 != "graph_stat") & ($term2 != "livesearch.php") & ($term2 != "directory.csv") ) {

    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/header.php");
    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/sidebar.php");


    if ($logged_in == "yes") {
            
        if ($term1 == "") {
            include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/home.php");    
        }


        if ($term1 == "voiceip") {

            // About
            if ($term2 == "about") {            
                include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/about.php");
            }

            // Directory
            if ($term2 == "directory") {        
                include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/directory.php");                
            }



            // Operator Panels           
            if ($term2 == "operators") {            
                include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/operators.php");
            }   

            // Statistics         
            //if ($term2 == "statistics") {    
                    //if ($term3 == "") {          
                    //    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/statistics.php");
                    //}
                    //if ($term3 == "call-records") {          
                    //    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/statistics/call-log.php");
                    //}
            //}   

            // Administration
            if ($term2 == "administration") {

                if ($term3 == "") {            
                    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/administration.php");
                }  
                       
                if ($term3 == "apply") {            
                    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/apply_changes.php");
                }     
                                       
                if ($term3 == "backups") {            
                    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/backups.php");
                }     

                if ($term3 == "build") {            
                    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/build.php");
                } 
                    
                if ($term3 == "bulk") {            
                    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/bulk.php");
                } 
                
                if ($term3 == "commands") {        
                    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/commands.php");                
                }  
                             
                if ($term3 == "extensions") {            
                    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/extensions.php");
                }    
                 
                if ($term3 == "statistics") {            
                    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/statistics_config.php");
                }                        

                if ($term3 == "operators") {            
                    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/operators_config.php");
                }     

                
                if ($term3 == "settings") {
                    
                    if ($term4 == "") {          
                        include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/settings.php");
                    }
                    
                    if ($term4 == "sip") {          
                        include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/settings_sip.php");
                    }
                    
                    if ($term4 == "polycom") {          
                        include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/settings_polycom.php");
                    }                                                               
                }                                  
                               
                if ($term3 == "users") {            
                    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/users.php");
                }    
            }
            
        }    
    }else{
        include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/voicepass.php");
        include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/login_screen.php");
    }

    include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/footer.php");
    
}



if ($logged_in == "yes") {
    if ($term2 == "download") {
        include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/backups_download.php");
    }

    if ( ($term2 == "statistics") & ($term3 == "cdr") ) {
        $_GET['s'] = "2";
        echo "--" . $_GET['s'] . "--";
        include ("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/$term3/index.php");
    }
}


echo "$system_message0";
?>

