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

if [[ "$g_input" = "0" ]];then
echo "# version number needed"
exit
fi

datevar=$(date +%Y-%m-%d:%H:%M:%S)

# default setting ip address
estimate_ip_address=$(/sbin/ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}')

if [[ $estimate_ip_address == "" ]];then
    estimate_ip_address=$(/sbin/ifconfig eth1 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}')
fi

# random sip password
random_string=$(tr -dc A-Za-z0-9_ < /dev/urandom | head -c 20 | xargs)

# version number
dbname="voiceipgui_db_$versionnumberspecial"
dbuser="voiceipgui_user"
dbpassword=`cat /var/lib/voiceipgui/passwd/mysql-voiceprov`
rootpassword=`cat /var/lib/voiceipgui/passwd/mysql-root`

voicevolumepersisthandset=1
voicevolumepersisthandsfree=1
voicevolumepersistheadset=1
missedcalls=on
upanalogHeadsetOption=1

#echo "# database installing setting_polycom default"
echo "use $dbname;insert into setting_polycom (setting, callbackmode, callback, voipprot1, voipprot2, sntpaddress, gmtoffset, loglevelchange, sipoutboundproxy, idleimage500, idleimage600, idledisplay, idledisplayip, missedcalls, homepage, modified, volume, voicevolumepersisthandsfree, voicevolumepersistheadset, upanalogHeadsetOption, voicegainrxdigitalchassisIP_650, voicegainrxdigitalchassis, voicegainrxanalogchassis, voicegainrxanalogchassisIP_650, voicegainrxdigitalringerIP_650, voicegainrxdigitalheadset, voicevolumepersisthandset) values ('default','contact','299','$estimate_ip_address','$voipprot2','pool.ntp.org','-28800','$loglevelchange','$sipoutboundproxy','$idleimage500','$idleimage600','$idledisplay','$idledisplayip','$missedcalls','$homepage','$modified','$volume','$voicevolumepersisthandsfree','$voicevolumepersistheadset','$upanalogHeadsetOption','$voicegainrxdigitalchassisIP_650','$voicegainrxdigitalchassis','$voicegainrxanalogchassis','$voicegainrxanalogchassisIP_650','$voicegainrxdigitalringerIP_650','$voicegainrxdigitalheadset','$voicevolumepersisthandset');"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null



insecure=no
qualify=yes
canreinvite=no
incominglimit=10
callerid=on
type=friend
host=dynamic


#echo "# database installing setting_sip default"
echo "use $dbname;insert into setting_sip (setting, password, callerid, type, host, context, qualify, port, nat, canreinvite, dtmfmode, allow, insecure, fromuser, incominglimit, callgroup, pickupgroup) values ('default','$random_string','$callerid','$type','$host','from-sip','$qualify','5060','$nat','$canreinvite','$dtmfmode','$allow','$insecure','$fromuser','$incominglimit','','');"|mysql -u$dbuser -p$dbpassword --silent --force -b 2> /dev/null

#echo "#"






