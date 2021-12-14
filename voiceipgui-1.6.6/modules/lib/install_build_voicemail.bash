#!/bin/bash

dbname="voiceipgui_db_$2"
dbuser="voiceipgui_user"
dbpassword=`cat /var/lib/voiceipgui/passwd/mysql-voiceprov`
rootpassword=`cat /var/lib/voiceipgui/passwd/mysql-root`
versionnumber=$(echo $2 | perl -p -i -e "s/_/./g")
version="voiceipgui-$versionnumber"
echo "--$1--
--"

#echo "--$1--"
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

full_file=$(echo "$full_file" | grep -v "^;"| grep "=>"| perl -p -i -e 's# =#=#g;s#> #>#g;s# ,#,#g;s#, #,#g;s# #_#g;' )

#echo "$voicemail_list"


for entry in $full_file;do
    echo "--$entry--"
    extension=$(echo "$entry" | cut -f1 -d"="|head -n 1)

    voicepass=$(echo "$entry" | perl -p -i -e 's#,#,\n#g;' |grep "=>"| cut -f2 -d">" |perl -p -i -e 's#,##g;' |head -n 1)
    


    email=$(echo "$entry" | perl -p -i -e 's#,#,\n#g;' |grep "@" |perl -p -i -e 's#,##g;'|head -n 1)  

    firstname=$(echo "$entry" | cut -f2 -d","| cut -f1 -d"_"|head -n 1)
    lastname=$(echo "$entry" | cut -f2 -d","| cut -f2 -d"_"| cut -f1 -d","|head -n 1)      

    if [[ -z $voicepass ]];then
        voicepass="1234"
    fi
    #echo "--$voicepass--"
    if [[ "$firstname" == "null" ]] || [[ "$firstname" == "Null" ]];then
        firstname=""
    fi

    if [[ "$lastname" == "null" ]] || [[ "$lastname" == "Null" ]];then
        lastname=""
    fi
    
    secret=$(tr -dc A-Za-z0-9_ < /dev/urandom | head -c 20 | xargs)
    voicemailcfg=on
    mailbox=$extension
    label=$extension
    cidcfg=on
    directorycfg=on    
    modified=1


        
    if [[ -n $extension ]];then
    # if not empty
    
        echo "use $dbname;insert into extension (secret, macaddress, line, site, extension, mailbox, label, agent, firstname, lastname, email, did, setting, voicepass, modified, phonecfg, directorycfg, voicemailcfg, sipcfg, setting_sip, setting_polycom, setting_spa, phone_type, context, cidcfg, iaxcfg) values ('$secret','$macaddress','$line','$site','$extension','$mailbox','$label','$agent','$firstname','$lastname','$email','$did','$setting','$voicepass','$modified','$phonecfg','$directorycfg','$voicemailcfg','$sipcfg','$setting_sip','$setting_polycom','$setting_spa','$phone_type','$context','$cidcfg','$iaxcfg');"|mysql -u$dbuser -p$dbpassword

        echo "use $dbname;update extension set email='$email', voicepass='$voicepass', firstname='$firstname', lastname='$lastname', voicemailcfg='$voicemailcfg', modified='1' where extension='$extension';"|mysql -u$dbuser -p$dbpassword

    fi

done



exit


