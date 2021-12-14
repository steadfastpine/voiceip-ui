<div class="sidebar_outer">

<?php
if ($logged_in=="yes") {
    ?>
    
    <div class="sidebar_main">
        <a href="/">Home</a>
        <a href="/voiceip/administration/">Administration</a>
        <a href="/voiceip/directory/">Directory</a>
        <a href="/voiceip/operators/">Operator Panels</a>        
        <a href="/voiceip/statistics/">Statistics</a>        
    </div>


    <?php
    if ($term2=="administration") {
    ?>

    <div class="sidebar_admin">
        <a href="/voiceip/administration/backups/">Backups</a>        
        <a href="/voiceip/administration/build/">Build</a>        
        <a href="/voiceip/administration/bulk/">Bulk Add</a>    
        <a href="/voiceip/administration/extensions/">Extensions</a>    
        <a href="/voiceip/administration/operators/">Operator Panels</a>    
        <a href="/voiceip/administration/settings/polycom/">Polycom</a> 
        <a href="/voiceip/administration/settings/sip/">SIP</a> 
        <a href="/voiceip/administration/statistics/">Statistics</a>            
        <a href="/voiceip/administration/users/">Users</a>                   
    </div>

    <div class="sidebar_commands">
    
        <a href="/voiceip/administration/commands/core-show-channels/">core show channels</a>  
        <a href="/voiceip/administration/commands/dahdi-show-channels/">dahdi show channels</a>     
        <a href="/voiceip/administration/commands/iax2-show-peers/">iax2 show peers</a>     
        <a href="/voiceip/administration/commands/iax2-show-registry/">iax2 show registry</a>    
        <a href="/voiceip/administration/commands/sip-show-peers/">sip show peers</a> 
        <a href="/voiceip/administration/commands/sip-show-registry/">sip show registry</a>  

    </div>
    
<?php
    }
    if ($term2=="statistics") {
    ?>
    
    <div class="sidebar_admin">
        <?php if ( file_exists("/usr/local/queuemetrics")) { ?>
        <a href="http://<?php echo $_SERVER['HTTP_HOST'] ;?>:8080/queuemetrics/">
            Quemetrics
        </a>         
        <?php } ?>

        <a href="/voiceip/statistics/?s=1&t=&order=calldate&sens=DESC&current_page=0">
            Call Records
        </a>

        <a href="/voiceip/statistics/?s=4&t=&order=calldate&sens=DESC&current_page=0">
            Calls Per Hour
        </a>
                 
        <a href="/voiceip/statistics/?s=2&t=&order=calldate&sens=DESC&current_page=0">
            Minutes Per Day
        </a>         

        <a href="/voiceip/statistics/?s=3&t=&order=calldate&sens=DESC&current_page=0">
            Minutes Per Month
        </a>   
    </div>

    <?php
    }
}

?>

</div>

<div class="content">
