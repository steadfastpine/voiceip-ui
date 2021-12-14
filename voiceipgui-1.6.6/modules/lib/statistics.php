
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



