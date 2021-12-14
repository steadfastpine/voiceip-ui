<div class="extension_add_bar">
    
    <a class="button1" href="/voiceip/administration/apply/">apply</a> 
    <a class="button1" href="/voiceip/administration/extensions/">extensions</a>    
    <a class="button1" href="/voiceip/administration/settings/polycom/">polycom</a>  
    <a class="button1" href="/voiceip/administration/settings/sip/">sip</a>       
        
    
</div>

<div class="extension_edit">

    <div class="build_nav">

        <form method="post" action="/voiceip/administration/build/" >
            <input type="text" name="build_sip_path" value="/etc/asterisk/sip.conf" />
            <input type="submit" value="sip.conf">
        </form>

        <form method="post" action="/voiceip/administration/build/" >
            <input type="text" name="build_sip_path" value="/etc/asterisk/sip.auto.conf" />
            <input type="submit" value="sip.auto.conf">
        </form>

        <form method="post" action="/voiceip/administration/build/" >
            <input type="text" name="build_iax_path" value="/etc/asterisk/iax.conf" />
            <input type="submit" value="iax.conf">
        </form>

        <form method="post" action="/voiceip/administration/build/" >
            <input type="text" name="build_iax_path" value="/etc/asterisk/iax.auto.conf" />
            <input type="submit" value="iax.auto.conf">
        </form>

        <form method="post" action="/voiceip/administration/build/" >
            <input type="text" name="build_voicemail_path" value="/etc/asterisk/voicemail.conf" />
            <input type="submit" value="voicemail.conf">
        </form>

        <form method="post" action="/voiceip/administration/build/" >
            <input type="text" name="build_users_path" value="/etc/asterisk/users.conf" />
            <input type="submit" value="users.conf">
        </form>


        <form method="post" action="/voiceip/administration/build/" >
            <input type="text" name="build_polycom_path" value="/home/PlcmSpIp/" />
            <input type="submit" value="*phone.cfg">
        </form>
    </div>
</div>
<div class="diag_box_build">
<textarea>

<?php 


if (!empty($build_sip_path)){
    system("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/install_build_sip.bash $build_sip_path $versionnumber_formatted");
}


if (!empty($build_iax_path)){
    system("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/install_build_iax.bash $build_iax_path $versionnumber_formatted");
}


if (!empty($build_voicemail_path)){
    system("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/install_build_voicemail.bash $build_voicemail_path $versionnumber_formatted");
}


if (!empty($build_polycom_path)){
    system("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/install_build_polycom.bash $build_polycom_path $versionnumber_formatted");
}


if (!empty($build_users_path)){
    system("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/install_build_users.bash $build_users_path $versionnumber_formatted");
}

?>


</textarea>
</div>







