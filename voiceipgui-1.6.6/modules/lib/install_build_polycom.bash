#!/bin/bash

dbname="voiceipgui_db_$2"
dbuser="voiceipgui_user"
dbpassword=`cat /var/lib/voiceipgui/passwd/mysql-voiceprov`
rootpassword=`cat /var/lib/voiceipgui/passwd/mysql-root`
versionnumber=$(echo $2 | perl -p -i -e "s/_/./g")
version="voiceipgui-$versionnumber"
echo "--$1--
--"

#echo "--$dbname--"
#echo "--$dbuser--"
#echo "--$dbpassword--"

/var/lib/voiceipgui/$version/modules/lib/database_install_default_settings.bash -v "$version"


polycom_list=$(ls -1 "$1" |grep "phone.cfg"|grep "0004")

#iaxcfg=off    
cidcfg=on
#voicemailcfg=on
directorycfg=on    
sipcfg=on
modified=1



setting_polycom=$(echo "use $dbname;select id from setting_polycom where setting='default'"|mysql -u$dbuser -p$dbpassword|grep -v "id")
setting_sip=$(echo "use $dbname;select id from setting_sip where setting='default'"|mysql -u$dbuser -p$dbpassword|grep -v "id")





for entry in $polycom_list;do
    # path to phone file
    dos2unix "$1""$entry"
    echo "$1""$entry"

    macaddress=
    polycom_file_contents=
    polycom_sip_lines=
    gmtoffset=
    missedcalls=

    macaddress=$(echo "$entry"| cut -f1 -d\-|head -n 1)
    polycom_file_contents=$(cat "$1""$entry"| perl -p -i -e 's#" #" \n#g;')
    polycom_sip_lines=$(echo "$polycom_file_contents"|grep "userId=")
    gmtoffset=$(echo "$polycom_file_contents"|grep "gmtOffset="| cut -f2 -d\"| cut -f1 -d\"|head -n 1)    
    missedcalls=$(echo "$polycom_file_contents"|grep --quiet "calllist-missed" && echo "on")    
        
    for polycom_sip_line in $polycom_sip_lines;do

       #echo "--$polycom_line--"
       extension=$(echo "$polycom_sip_line"| cut -f2 -d\"| cut -f1 -d\"|head -n 1)
       line=$(echo "$polycom_sip_line"| cut -f2 -d.)
       mailbox=$extension
       label=$extension    

       if [[ "$macaddress" != "null" ]] && [[ "$macaddress" != "Null" ]] && [[ -n "$macaddress" ]];then

           secret=$(echo "$polycom_file_contents"| grep -i "reg.$line.auth.password" | cut -f2 -d\"| cut -f1 -d\"|head -n 1)
                 
           echo "--extension--$extension--line--$line--"
           #echo "--secret--$secret--"
           #echo "--gmtoffset--$gmtoffset--"
           #echo "--missedcalls--$missedcalls--"

           echo "use $dbname;insert into extension (secret, macaddress, line, site, extension, mailbox, label, agent, firstname, lastname, email, did, setting, voicepass, modified, phonecfg, directorycfg, voicemailcfg, sipcfg, setting_sip, setting_polycom, setting_spa, phone_type, context, cidcfg, iaxcfg) values ('$secret','$macaddress','$line','$site','$extension','$mailbox','$label','$agent','$firstname','$lastname','$email','$did','$setting','$voicepass','$modified','$phonecfg','$directorycfg','$voicemailcfg','$sipcfg','$setting_sip','$setting_polycom','$setting_spa','$phone_type','$context','$cidcfg','$iaxcfg');"|mysql -u$dbuser -p$dbpassword

           echo "use $dbname;update extension set missedcalls='$missedcalls', gmtoffset='$gmtoffset', secret='$secret', line='$line', macaddress='$macaddress', modified='1' where extension='$extension';"|mysql -u$dbuser -p$dbpassword


            


    
        fi   
        

        
    done
 
    echo "--"
done


echo "use $dbname;delete from extension where extension='0';"|mysql -u$dbuser -p$dbpassword

exit



