<div class="options">

    <a href="/voiceip/administration/">
        <img src="/voiceip/graphics/administration.png">
        <div class="options_i"><div class="options_header">Administration</div></div>
        <div class="options_i2">Configure the PBX telephone system.</div>
    </a>    
    <a href="/voiceip/operators/">
        <img src="/voiceip/graphics/operator.png">
        <div class="options_i"><div class="options_header">Operator Panels</div></div>
        <div class="options_i2">Phones are displayed as drag and drop icons. Panels may be bookmarked with Ctrl + D</div>
    </a>    
    <a href="/voiceip/statistics/">
        <img src="/voiceip/graphics/statistics.png">
        <div class="options_i"><div class="options_header">Statistics</div></div>
        <div class="options_i2">Metrics for billing, network management, and monitoring the volume of phone usage.</div>
    </a> 

</div>
<div class="options">

    <a href="/voiceip/administration/extensions/">
        <img src="/voiceip/graphics/extensions.png">
        <div class="options_i"><div class="options_header">Extensions</div></div>
        <div class="options_i2">Settings for configuring and managing phone extensions.</div>
    </a>    
    <a href="/voiceip/administration/operators/">
        <img src="/voiceip/graphics/settings-operator.png">
        <div class="options_i"><div class="options_header">Operator Config</div></div>
        <div class="options_i2">Settings for configuring web operator panels.</div>
    </a>    
    <a href="/voiceip/administration/settings/sip/">
        <img src="/voiceip/graphics/settings-sip.png">
        <div class="options_i"><div class="options_header">SIP</div></div>
        <div class="options_i2">Profiles for different arrangments of sip settings.</div>
    </a> 
    <a href="/voiceip/administration/settings/polycom/">
        <img src="/voiceip/graphics/settings-polycom.png">
        <div class="options_i"><div class="options_header">Polycom</div></div>
        <div class="options_i2">Setting profiles specific to Polycom model telephones.</div>
    </a>         
</div>

<div class="options">
    <?php if ( file_exists("/usr/local/queuemetrics")) { ?>
        <a href="http://<?php echo $_SERVER['HTTP_HOST'] ;?>:8080/queuemetrics/">
            <img src="/voiceip/graphics/queuemetrics.png">
            <div class="options_i"><div class="options_header">Quemetrics</div></div>
            <div class="options_i2">Queue monitoring and metric software. View the activity of customer service agents in realtime.</div>
        </a>         

    <?php } ?>

    <a href="/voiceip/statistics/?s=1&t=&order=calldate&sens=DESC&current_page=0">
        <img src="/voiceip/graphics/call-records.png">
        <div class="options_i"><div class="options_header">Call Records</div></div>
        <div class="options_i2">Data Table: search call records and details, filterable by call metrics.</div>
    </a>

    <a href="/voiceip/statistics/?s=4&t=&order=calldate&sens=DESC&current_page=0">
        <img src="/voiceip/graphics/calls-per-hour.png">
        <div class="options_i"><div class="options_header">Calls Per Hour</div></div>
        <div class="options_i2">Line Graph: compare the hourly call loads of different days, filterable by call metrics.</div>
    </a>
             
    <a href="/voiceip/statistics/?s=2&t=&order=calldate&sens=DESC&current_page=0">
        <img src="/voiceip/graphics/minutes-per-day.png">
        <div class="options_i"><div class="options_header">Minutes Per Day</div></div>
        <div class="options_i2">Bar Graph: displays the number of calls per hour, filterable by call metrics.</div>
    </a>         

    <a href="/voiceip/statistics/?s=3&t=&order=calldate&sens=DESC&current_page=0">
        <img src="/voiceip/graphics/monthly-minutes.png">
        <div class="options_i"><div class="options_header">Minutes Per Month</div></div>
        <div class="options_i2">Pie Chart: displays the number of minutes per month, filterable by call metrics.</div>
    </a>   
</div>

