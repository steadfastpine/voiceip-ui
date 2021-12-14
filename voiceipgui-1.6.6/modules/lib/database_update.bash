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


database_list=$(echo "show databases;"|mysql -uroot -p$rootpassword)

if [[ `echo $database_list|grep $dbname` == '' ]];then
    echo "# database $dbname does not exist, creating"
    echo "create database $dbname;"|mysql -uroot -p$rootpassword
fi

echo "# updating mysql database permissions"
echo "#"
echo "# use $dbname;GRANT ALL ON *.* TO '$dbuser'@'localhost' IDENTIFIED BY '$dbpassword';"
echo "#"
echo "use $dbname;GRANT ALL ON *.* TO '$dbuser'@'localhost' IDENTIFIED BY '$dbpassword';"|mysql -uroot -p$rootpassword



table_list=$(echo "use $dbname;show tables;"|mysql -uroot -p$rootpassword)

# extension 
table_name="extension"
if [[ `echo $table_list|grep $table_name` == '' ]];then
    echo "# table $table_name does not exist, creating"
    echo "use $dbname;create table extension (id MEDIUMINT NOT NULL AUTO_INCREMENT, extension BIGINT(40), PRIMARY KEY(id), UNIQUE INDEX(extension))"|mysql -u$dbuser -p$dbpassword
fi

# setting_polycom
table_name="setting_polycom"
if [[ `echo $table_list|grep $table_name` == '' ]];then
    echo "# table $table_name does not exist, creating"
    echo "use $dbname;create table setting_polycom (id MEDIUMINT NOT NULL AUTO_INCREMENT, setting char(40), PRIMARY KEY (id), UNIQUE INDEX(setting));"|mysql -u$dbuser -p$dbpassword
fi

# setting_sip
table_name="setting_sip"
if [[ `echo $table_list|grep $table_name` == '' ]];then
    echo "# table $table_name does not exist, creating"
    echo "use $dbname;create table setting_sip (id MEDIUMINT NOT NULL AUTO_INCREMENT, setting char(40), PRIMARY KEY (id), UNIQUE INDEX(setting));"|mysql -u$dbuser -p$dbpassword
fi

# operator
table_name="operator"
if [[ `echo $table_list|grep $table_name` == '' ]];then
    echo "# table $table_name does not exist, creating"
    echo "use $dbname;create table operator (id MEDIUMINT NOT NULL AUTO_INCREMENT, PRIMARY KEY (id));"|mysql -u$dbuser -p$dbpassword
fi

# users
table_name="users"
if [[ `echo $table_list|grep $table_name` == '' ]];then
    echo "# table $table_name does not exist, creating"
    echo "use $dbname;create table users (id MEDIUMINT NOT NULL AUTO_INCREMENT, user_name char(40), password char(40), session_key char(40), UNIQUE KEY (user_name), PRIMARY KEY (id));"|mysql -u$dbuser -p$dbpassword
    echo "# installing admin user account"
    echo "use $dbname;insert into users (user_name, password) values ('admin','pass');"|mysql -u$dbuser -p$dbpassword
fi




echo "# updating operator table columns"
echo "use $dbname;alter table operator add column panel char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table operator add column extension char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null

echo "# updating setting_sip table columns"
echo "use $dbname;alter table setting_sip add column allow char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column callerid char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column callgroup char(10);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column canreinvite char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column context char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column dtmfmode char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column fromuser char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column host char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column incominglimit char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column insecure char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column modified char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column nat char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column password char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column pickupgroup char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column port char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column qualify char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_sip add column type char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null


echo "# updating setting_polycom table columns"
echo "use $dbname;alter table setting_polycom add column callback char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column callbackmode char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column gmtoffset char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column homepage char(200);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column idledisplay char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column idledisplayip char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column idleimage500 char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column idleimage600 char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column loglevelchange char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column missedcalls char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column modified char(1);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column sipoutboundproxy char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column sntpaddress char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column upanalogHeadsetOption char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column voicegainrxanalogchassis char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column voicegainrxanalogchassisIP_650 char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column voicegainrxdigitalchassis char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column voicegainrxdigitalchassisIP_650 char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column voicegainrxdigitalhandset char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column voicegainrxdigitalheadset char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column voicegainrxdigitalringerIP_650 char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column voicevolumepersisthandset char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column voicevolumepersisthandsfree char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column voicevolumepersistheadset char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column voipprot1 char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column voipprot2 char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table setting_polycom add column volume char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null



echo "# updating extension table columns"

echo "use $dbname;alter table extension add column agent char(30);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column cidcfg char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column context char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column did char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column directorycfg char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column email char(100);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column firstname char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column gmtoffset char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column iaxcfg char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column ipaddress char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column label char(30);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column lastname char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column line char(12);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column macaddress char(12);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column mailbox char(30);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column missedcalls char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column modified char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column nat char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column phonecfg char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column phone_type char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column secret char(60);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column setting char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column setting_iax char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column setting_polycom char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column setting_sip char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column setting_spa char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column sipcfg char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column site char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column voicemailcfg char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null
echo "use $dbname;alter table extension add column voicepass char(40);"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null


echo "# updating column type update, enable correct numeric sorting"
echo "use $dbname;alter table extension modify column extension bigint;"|mysql -u$dbuser -p$dbpassword

echo "# completed database update"

