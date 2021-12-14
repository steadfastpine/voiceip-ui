<div class="extension_add_bar">
    
    <a class="button4" href="/voiceip/administration/apply/">apply</a> 
    <a class="button1" href="/voiceip/administration/extensions/">extensions</a>    
    <a class="button1" href="/voiceip/administration/settings/polycom/">polycom</a>  
    <a class="button1" href="/voiceip/administration/settings/sip/">sip</a>       
     
</div>


<?php 

if ($extension_bulk_add_import==extension_bulk_add_import) {

    include("/var/lib/voiceipgui/voiceipgui-$versionnumber/modules/lib/bulk_import.php");
    header("Location: /voiceip/administration/extensions/"); 
    exit();

}else{
    ?>
    
    <div class="box110">
        Extensions may be added in csv format with the following column headers:<br /><br />
        <b>macaddress, line, extension, mailbox, label, firstname, lastname, email, did, setting, voicepass, voicemailcfg, sipcfg, phone_type, setting_sip, setting_polycom, setting_spa </b><br /><br />
        <br />
        example:
        <br /><br />
        macaddress,extension<br />
        0004firudy34,5001<br />
        0004968423f6,5002<br /><br />
        <form method="POST" action="/voiceip/administration/bulk/" >
            <input class="button2" type="submit" value="add extensions" ><br>
            <input value="extensions" name="page" type="hidden" >
            <input value="extension_bulk" name="extension_bulk" type="hidden" >
            <input value="extension_bulk_add_import" name="extension_bulk_add_import" type="hidden" >
            <textarea type="text" class="extension_bulk_data" name="extension_bulk_data" cols="100" rows="300" size="15" >
            </textarea>
        </form>
    </div>
    
    <?php
}
?>





