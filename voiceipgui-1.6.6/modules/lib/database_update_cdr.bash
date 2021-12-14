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

# get system ip address for setting_polycom
estimate_ip_address=$(/sbin/ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}')
if [[ $estimate_ip_address == "" ]];then
    estimate_ip_address=$(/sbin/ifconfig eth1 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}')
fi

# random sip password
random_string=$(tr -dc A-Za-z0-9_ < /dev/urandom | head -c 30 | xargs)
# version number
dbname="voiceipgui_db_$versionnumberspecial"
dbuser="voiceipgui_user"
dbpassword=`cat /var/lib/voiceipgui/passwd/mysql-voiceprov`
rootpassword=`cat /var/lib/voiceipgui/passwd/mysql-root`

pass_mysql=$rootpassword
cdb_name="cdr_db"
#echo "use $cdb_name;show tables; mysql -uroot -p$pass_mysql"



database_list=$(echo "use $cdb_name;show tables;"|mysql -uroot -p$pass_mysql --silent --force -b 2> /dev/null)
if [[ `echo $database_list|grep $cdb_name` == '' ]];then
    echo "# asterisk stats: creating database $cdb_name "
    echo "
    CREATE DATABASE $cdb_name; 
    USE cdr_db; 
    CREATE TABLE cdr (
    accountcode varchar(20) NOT NULL default '', 
    amaflags int(11) NOT NULL default '0', 
    answerdate varchar(60) NOT NULL default '0',
    billsec int(11) NOT NULL default '0', 
    calldate datetime NOT NULL default '0000-00-00 00:00:00', 
    channel varchar(80) NOT NULL default '', 
    clid varchar(80) NOT NULL default '', 
    dcontext varchar(80) NOT NULL default '',  
    disposition varchar(45) NOT NULL default '',  
    dstchannel varchar(80) NOT NULL default '', 
    dst varchar(80) NOT NULL default '', 
    duration int(11) NOT NULL default '0', 
    hangupdate varchar(60) NOT NULL default '', 
    lastapp varchar(80) NOT NULL default '', 
    lastdata varchar(80) NOT NULL default '', 
    src varchar(80) NOT NULL default '', 
    uniqueid varchar(32) NOT NULL default '',
    userfield varchar(255) NOT NULL default '');
    \q;
    "|mysql -uroot -p$pass_mysql --silent --force -b 2> /dev/null;
    
else

    echo "# asterisk stats: database $cdb_name was allready installed"    
    
fi


echo "# updating cdr table columns"
echo "use $cdb_name;alter table cdr add column accountcode varchar(20);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column amaflags int(11);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column answerdate varchar(60);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column billsec int(11);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column channel varchar(80);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column clid varchar(80);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column dcontext varchar(80);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column disposition varchar(45);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column dstchannel varchar(80);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column dst varchar(80);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column duration int(11);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column hangupdate varchar(60);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column lastapp varchar(80);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column lastdata varchar(80);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column src varchar(80);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column uniqueid varchar(32);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $cdb_name;alter table cdr add column userfield varchar(255);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null





