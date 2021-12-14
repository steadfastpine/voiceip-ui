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

#echo "--setting_polycom--$setting_polycom--"
#echo "--setting_sip--$setting_sip--"


full_file=$(cat "$1")

full_file=$(echo "$full_file" |sed '/^$/d')                         # remove newlines

full_file=$(echo "$full_file" |perl -p -i -e 's# +# #g;')           # condense whitespace

full_file=$(echo "$full_file" |perl -p -i -e 's#^ +##g;s# +$##g;')  # remove preceeding and trailing  whitespace

full_file=$(echo "$full_file" |cut -f1 -d";"|perl -p -i -e 's#\r#\n#g;s#\t##g;s#\ \=#\=#g;s#\=\ #\=#g;s#\n#_____#g;s# #-----#g;s#\[#\n\[#g;s#^$##g;'|grep -v '\[general\]')


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

        firstname=$(echo "$entry" |grep "^fullname="| cut -f2 -d"="| cut -f1 -d" "| perl -p -i -e 's#"##g;'|head -n 1)
        lastname=$(echo "$entry" |grep "^fullname="| cut -f2 -d"="| cut -f2 -d" "| perl -p -i -e 's#"##g;'|head -n 1)

        macaddress=$(echo "$entry" |grep "^macaddress="| cut -f2 -d"="|tr '[:upper:]' '[:lower:]'|head -n 1)   
        nat=$(echo "$entry" |grep "^nat="| cut -f2 -d"="|head -n 1)
        secret=$(echo "$entry" |grep "^secret="| cut -f2 -d"="|head -n 1)
        context=$(echo "$entry" |grep "^context="| cut -f2 -d"="|head -n 1)
        mailbox=$(echo "$entry" |grep "^mailbox="| cut -f2 -d"="|head -n 1)
        label=$(echo "$entry" |grep "^label="| cut -f2 -d"="|head -n 1)
        email=$(echo "$entry" |grep "^email="| cut -f2 -d"="|head -n 1)    
        voicepass=$(echo "$entry" |grep "^vmsecret="| cut -f2 -d"="|head -n 1)  


        if [[ "$firstname" == "$lastname" ]];then
            lastname=""
        fi

        if [[ "$firstname" == "null" ]] || [[ "$firstname" == "Null" ]];then
            firstname=""
        fi

        if [[ "$lastname" == "null" ]] || [[ "$lastname" == "Null" ]];then
            lastname=""
        fi

        if [[ -z $voicepass ]];then
            voicepass="1234"
        fi     
        
        if [[ -z $mailbox ]];then
            mailbox=$extension
        fi

        if [[ -z $label ]];then
            label=$extension
        fi
                


        cidcfg=on
        sipcfg=on    
        directorycfg=on    
        modified=1
        missedcalls=on

        echo "--extension--$extension--"
        echo "--firstname--$firstname--"
        echo "--lastname--$lastname--"
        echo "--secret--$secret--"
        echo "--email--$email--"
        echo "--context--$context--"
        echo "--nat--$nat--"   
        echo "--"
        
        

        if [[ -n $extension ]] ;then
            # if not empty
            

            echo "use $dbname;insert into extension (nat, secret, macaddress, line, site, extension, mailbox, label, agent, firstname, lastname, email, did, setting, voicepass, modified, phonecfg, directorycfg, voicemailcfg, sipcfg, setting_sip, setting_polycom, setting_spa, phone_type, context, cidcfg, iaxcfg) values ('$nat','$secret','$macaddress','$line','$site','$extension','$mailbox','$label','$agent','$firstname','$lastname','$email','$did','$setting','$voicepass','$modified','$phonecfg','$directorycfg','$voicemailcfg','$sipcfg','$setting_sip','$setting_polycom','$setting_spa','$phone_type','$context','$cidcfg','$iaxcfg');"|mysql -u$dbuser -p$dbpassword

            echo "use $dbname;update extension set voicepass='$voicepass', email='$email', macaddress='$macaddress', nat='$nat', missedcalls='$missedcalls', context='$context', secret='$secret', firstname='$firstname', lastname='$lastname', sipcfg='$sipcfg', modified='1' where extension='$extension';"|mysql -u$dbuser -p$dbpassword

            
        fi
        

fi

   

done

echo "use $dbname;delete from extension where extension='0';"|mysql -u$dbuser -p$dbpassword

exit


