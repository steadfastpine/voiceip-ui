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

dos2unix "$1"

/var/lib/voiceipgui/$version/modules/lib/database_install_default_settings.bash -v "$version"

setting_polycom=$(echo "use $dbname;select id from setting_polycom where setting='default';"|mysql -u$dbuser -p$dbpassword|tail -1)
setting_sip=$(echo "use $dbname;select id from setting_sip where setting='default';"|mysql -u$dbuser -p$dbpassword|tail -1)


full_file=$(cat "$1")

full_file=$(echo "$full_file" |sed '/^$/d')                         # remove newlines

full_file=$(echo "$full_file" |perl -p -i -e 's# +# #g;')           # condense whitespace

full_file=$(echo "$full_file" |perl -p -i -e 's#^ +##g;s# +$##g;')  # remove preceeding and trailing  whitespace

full_file=$(echo "$full_file" |cut -f1 -d";"|perl -p -i -e 's#\r#\n#g;s#\t##g;s#\ \=#\=#g;s#\=\ #\=#g;s#\n#_____#g;s# #-----#g;s#\[#\n\[#g;s#^$##g;'|grep -v '\[general\]')

#echo "$full_file"
#exit

for entry in $full_file;do


    entry=$(echo "$entry"| perl -p -i -e 's#_____#\n#g;s#-----# #g;')
    #echo "--$entry--"   
    extension=
    extension=$(echo "$entry" | cut -f2 -d"["| cut -f1 -d"]"|head -n 1)


    if [[ -n $extension ]];then

        macaddress=
        nat=
        secret=
        context=
        mailbox=
        label=
        email=    
        voicepass=
        firstname=
        lastname=  
        firstname=$(echo "$entry"|grep "^callerid="| cut -f2 -d"="| cut -f1 -d" "| perl -p -i -e 's#"##g;'|head -n 1)
        lastname=$(echo "$entry"|grep "^callerid="| cut -f2 -d"="| cut -f2 -d" "| perl -p -i -e 's#"##g;'|head -n 1)


        if [[ "$firstname" == "null" ]] || [[ "$firstname" == "Null" ]];then
            firstname=""
        fi

        if [[ "$lastname" == "null" ]] || [[ "$lastname" == "Null" ]];then
            lastname=""
        fi



        
        nat=$(echo "$entry"|grep "^nat="| cut -f2 -d"="|head -n 1)
        secret=$(echo "$entry"|grep "^secret="| cut -f2 -d"="|head -n 1)
        context=$(echo "$entry"|grep "^context="| cut -f2 -d"="|head -n 1)
        

        mailbox=$extension
        label=$extension
        cidcfg=on
        iaxcfg=on    
        directorycfg=on    
        modified=1
        missedcalls=on

        
        echo "--extension--$extension--"
        echo "--firstname--$firstname--"
        echo "--lastname--$lastname--"
        echo "--secret--$secret--"
        echo "--context--$context--"
        echo "--nat--$nat--"   
        echo "--"  


        if [ -n $extension ];then
        # if not empty
        
            setting_polycom=$(echo "use $dbname;select id from setting_polycom where setting='default';"|mysql -u$dbuser -p$dbpassword|tail -1)

            setting_sip=$(echo "use $dbname;select id from setting_sip where setting='default';"|mysql -u$dbuser -p$dbpassword|tail -1)


            echo "use $dbname;insert into extension (nat, secret, macaddress, line, site, extension, mailbox, label, agent, firstname, lastname, email, did, setting, voicepass, modified, phonecfg, directorycfg, voicemailcfg, sipcfg, setting_sip, setting_polycom, setting_spa, phone_type, context, cidcfg, iaxcfg) values ('$nat','$secret','$macaddress','$line','$site','$extension','$mailbox','$label','$agent','$firstname','$lastname','$email','$did','$setting','$voicepass','$modified','$phonecfg','$directorycfg','$voicemailcfg','$sipcfg','$setting_sip','$setting_polycom','$setting_spa','$phone_type','$context','$cidcfg','$iaxcfg');"|mysql -u$dbuser -p$dbpassword

            echo "use $dbname;update extension set nat='$nat', missedcalls='$missedcalls', context='$context', secret='$secret', firstname='$firstname', lastname='$lastname', iaxcfg='$iaxcfg', modified='1' where extension='$extension';"|mysql -u$dbuser -p$dbpassword

        fi

fi

done

echo "use $dbname;delete from extension where extension='0';"|mysql -u$dbuser -p$dbpassword

exit






