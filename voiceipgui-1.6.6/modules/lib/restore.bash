#!/bin/bash


#exit

# check if root user
if ! id | grep -q "uid=0(root)" ; then
print "ERROR:  must be root in order to run this script"
exit 1
fi


while getopts p:h: option
do
        case "${option}"
        in
                p) server_port=${OPTARG};;
                h) echo "help";;
                
        esac
done
datevarday=$(date +%Y-%m-%d:%H:%M:%S)

datevar=$(date +%Y-%m-%d:%H:%M:%S)
version=$(basename `pwd`)
ftpuser="PlcmSpIp"
versionnumber=$(echo ${version#*-})
version_dbformat=$(echo $versionnumber|sed 's/-/_/g;s/\./_/g;')
dbname="voiceipgui_db_$version_dbformat"

#echo "--$server_port--"
#echo "--$2--"
#echo "--$3--"
#exit

mkdir /system-restore/ 2>/dev/null


remote_backup_user=$(echo "$2"|cut -f"1" -d"@")




rsync -azvp --progress --delete --rsh="ssh -p$server_port" $2:/home/$remote_backup_user/backups/$3/asterisk :/home/$remote_backup_user/backups/$3/moh :/home/$remote_backup_user/backups/$3/agi-bin :/home/$remote_backup_user/backups/$3/sounds :/home/$remote_backup_user/backups/$3/status :/home/$remote_backup_user/backups/$3/PlcmSpIp/*phone.cfg /restore-system/$3/


mkdir /restore-system/$3/PlcmSpIp/ 2>/dev/null

mv /restore-system/$3/*phone.cfg /restore-system/$3/PlcmSpIp/ 2>/dev/null





cp -rf /etc/asterisk/ /etc/asterisk-$datevarday/


cp -rf /var/lib/asterisk/sounds/ /var/lib/asterisk/sounds-$datevarday/


cp -rf /var/lib/asterisk/moh/ /var/lib/asterisk/moh-$datevarday/





rm -rf /home/PlcmSpIp/*phone.cfg
cp -rf /restore-system/$3/PlcmSpIp/*phone.cfg /home/PlcmSpIp/


rm -rf /var/lib/asterisk/sounds/*
cp -rf /restore-system/$3/sounds/* /var/lib/asterisk/sounds/


rm -rf /var/lib/asterisk/moh/*
cp -rf /restore-system/$3/moh/* /var/lib/asterisk/moh/

rm -f /etc/asterisk/iax.conf
rm -f /etc/asterisk/iax.auto.conf
rm -f /etc/asterisk/sip.auto.conf
rm -f /etc/asterisk/voicemail.conf

cp -rf /restore-system/$3/asterisk/*.auto.conf /etc/asterisk/
cp -rf /restore-system/$3/asterisk/extensions.conf /etc/asterisk/
cp -rf /restore-system/$3/asterisk/features.conf /etc/asterisk/
cp -rf /restore-system/$3/asterisk/iax.conf /etc/asterisk/
cp -rf /restore-system/$3/asterisk/meetme.conf /etc/asterisk/
cp -rf /restore-system/$3/asterisk/musiconhold.conf /etc/asterisk/
cp -rf /restore-system/$3/asterisk/sip.conf /etc/asterisk/
cp -rf /restore-system/$3/asterisk/voicemail.conf /etc/asterisk/
cp -rf /restore-system/$3/asterisk/users.conf /etc/asterisk/




perl -p -i -e "s#\|#,#g" /etc/asterisk/extensions.conf


rootpassword=$(cat /var/lib/voiceipgui/passwd/mysql-root 2>/dev/nul)

echo "use $dbname;delete from extension;"|mysql -uroot -p$rootpassword 
echo "use $dbname;delete from setting_sip;"|mysql -uroot -p$rootpassword
echo "use $dbname;delete from setting_polycom;"|mysql -uroot -p$rootpassword 




/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/install_build_sip.bash /etc/asterisk/sip.conf $version_dbformat
/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/install_build_sip.bash /etc/asterisk/sip.auto.conf $version_dbformat


/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/install_build_iax.bash /etc/asterisk/iax.conf $version_dbformat
/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/install_build_iax.bash /etc/asterisk/iax.auto.conf $version_dbformat

/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/install_build_users.bash /etc/asterisk/users.conf $version_dbformat

/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/install_build_voicemail.bash /etc/asterisk/voicemail.conf $version_dbformat
/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/install_build_polycom.bash /home/PlcmSpIp/ $version_dbformat







echo "# voiceipgui: chown apache /etc/asterisk/cid.auto.conf"
touch /etc/asterisk/cid.auto.conf
chown apache /etc/asterisk/cid.auto.conf

echo "# voiceipgui: chown apache /etc/asterisk/iax.auto.conf"
touch /etc/asterisk/iax.auto.conf
chown apache /etc/asterisk/iax.auto.conf

echo "# voiceipgui: chown apache /etc/asterisk/sip.auto.conf"
touch /etc/asterisk/sip.auto.conf
chown apache /etc/asterisk/sip.auto.conf

echo "# voiceipgui: chown apache /etc/asterisk/voicemail.conf"
chown apache /etc/asterisk/voicemail.conf

echo "# voiceipgui: chmod 777 /home/PlcmSpIp/"
chmod 777 /home/PlcmSpIp/


echo "# voiceipgui: chown apache /home/PlcmSpIp/*phone.cfg"
chown apache /home/PlcmSpIp/*phone.cfg



asterisk -rx "reload" 2> /dev/null



exit














