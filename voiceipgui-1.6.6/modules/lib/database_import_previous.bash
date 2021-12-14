#!/bin/bash

v_check=0
while getopts ":v:" OPTION
do
     case $OPTION in
         v)
             version_actual="$OPTARG"
             versionnumberspecial=`echo ${OPTARG#*-}|sed 's/\./_/g'`
             v_check=1
             ;;
        \?)
             echo "Invalid option: -$OPTARG" >&2
             ;;
     esac
done

# version input needed, or exit
if [[ "$g_input" = "0" ]];then
    echo "# version number needed"
    exit
fi

# version number
dbname="voiceipgui_db_$versionnumberspecial"
dbuser="voiceipgui_user"
dbpassword=`cat /var/lib/voiceipgui/passwd/mysql-voiceprov`
rootpassword=`cat /var/lib/voiceipgui/passwd/mysql-root`
last_database=$(echo "show databases;"|mysql -uroot -p$rootpassword|egrep -i "voiceipgui_db_"|egrep -iwv "voip|voiceipgui_db_"|sort -r -V|sed '2,99999 d')

# if new database is a different version as current one
# and the name of old database is non zero in length
if [[ "$dbname" != "$last_database" ]] && [[ -n "$last_database" ]];then

    echo "# importing last installed database"    
    echo "#"
    echo "#     lastdatabase:	$last_database"
    echo "#     dbname:		$dbname"
    echo "#     dbuser:		voiceipgui_user"
    echo "#     dbpassword:	$dbpassword"
    echo "#     rootpassword:	$rootpassword"
    echo "#"

    echo "# building from $last_database"




    database_list=$(echo "show databases;"|mysql -uroot -p$rootpassword)

    if [[ `echo $database_list|grep $dbname` == '' ]];then
        echo "# database $dbname does not exist, creating before import"
        echo "create database $dbname;"|mysql -uroot -p$rootpassword
    fi


    mysqldump -uroot -p$rootpassword $last_database > /usr/src/$version_actual/modules/tmp/$last_database.import.sql
    mysql -uroot -p$rootpassword $dbname < /usr/src/$version_actual/modules/tmp/$last_database.import.sql

fi











