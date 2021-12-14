

 __      __   _          _____ _____    _    _ _____ 
 \ \    / /  (_)        |_   _|  __ \  | |  | |_   _|
  \ \  / /__  _  ___ ___  | | | |__) | | |  | | | |  
   \ \/ / _ \| |/ __/ _ \ | | |  ___/  | |  | | | |  
    \  / (_) | | (_|  __/_| |_| |      | |__| |_| |_ 
     \/ \___/|_|\___\___|_____|_|       \____/|_____|



VoiceIP User Interface



# Contact: https://www.linkedin.com/in/steadfastpine/

# Release Date: 2019-06-07
# Version: 1.6.6



Images

	Bulk add a list of extensions
	https://github.com/steadfastpine/voiceip-ui/blob/master/voiceip-ui-bulk-add.jpg

	Edit an extension
	https://github.com/steadfastpine/voiceip-ui/blob/master/voiceip-ui-edit-extension.jpg

	Extensions list
	https://github.com/steadfastpine/voiceip-ui/blob/master/voiceip-ui-extensions.jpg

	Import configuration from existing system files
	https://github.com/steadfastpine/voiceip-ui/blob/master/voiceip-ui-import.jpg

	Log in to the user interface
	https://github.com/steadfastpine/voiceip-ui/blob/master/voiceip-ui-login.jpg

	Options
	https://github.com/steadfastpine/voiceip-ui/blob/master/voiceip-ui-options.jpg



Description

	A graphic user interface used to configure asterisk sip extensions and polycom telephones.



Prerequisites

	Bash Shell

	Operating Systems

		Linux

			Centos
			Redhat
			Fedora

	PHP



Installation

	Place the voiceipgui-x.x folder into /usr/src/

		example:

			/usr/src/voiceipgui-x.x/


	Browse to the folder

			# cd /usr/src/voiceipgui-x.x/


	Launch configuration script

		# ./configure



Include Files

	* written to each time "apply changes" is clicked

	cid.auto.conf
	iax.auto.conf
	sip.auto.conf
	voicemail.auto.conf



Libraries

	Install location: 

	/var/lib/voiceipgui/


	New versions are installed in the format:
	/var/lib/voiceipgui/voiceipgui-x.x/

	Each older version is left in place for future referece.



Passwords

	Each time the installation "./configure" is run, new passwords are generated in:

	/root/passwd/



Mysql root password reset

	Normal behavior is not reset the mysql root password, but it will forecably reset it when not found in /root/passwd/

	A new password will be generated in:

	/root/passwd/mysql-root


License 

	This program is licensed under the GPL License, view the LICENSE.md file for more information.






