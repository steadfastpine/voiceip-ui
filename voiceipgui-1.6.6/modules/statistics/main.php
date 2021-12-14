<table class="operators" border="0" cellspacing="0">
<tr><th>Metrics for billing, network management, and monitoring the volume of phone usage.</th></tr>
<tr></tr>
<?php if ( file_exists("/usr/local/queuemetrics")) { ?>
<tr class="operator_row">
<td>
<form method="POST" action="http://<?php echo $_SERVER['HTTP_HOST'] ;?>:8080/queuemetrics/" enctype="multipart/form-data">
<input class="button_operator" type="image" src="/voiceip/graphics/queuemetrics.png" >
<input value="Queuemetrics" name="page" type="hidden" >
</form>
<form method="POST" action="http://<?php echo $_SERVER['HTTP_HOST'] ;?>:8080/queuemetrics/" enctype="multipart/form-data">
<input class="button_text" type="submit" value="Queuemetrics" >
<input value="Queuemetrics" name="page" type="hidden" >
</form>
<p>Queue monitoring and metric software. View the activity of customer service agents.</p>
</td>
</tr>
<?php } ?>
<tr class="operator_row">
<td>
<form method="POST" action="/voiceip/statistics/" >
<input type="hidden" name="s" value="1" />
<input type="hidden" name="page" value="Call Records" />
<input type="hidden" name="current_page" value="0" />
<input type="hidden" name="posted" value="1" />
<input type="hidden" name="fromstatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="fromstatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="fromstatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="tostatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="Period" value="Month" />
<input type="hidden" name="page" value="Call Records" />
<input class="button_operator" type="image" src="/voiceip/graphics/call-records.png" >
</form>
<form method="POST" action="/voiceip/statistics/" >
<input type="hidden" name="s" value="1" />
<input type="hidden" name="page" value="Call Records" />
<input type="hidden" name="current_page" value="0" />
<input type="hidden" name="posted" value="1" />
<input type="hidden" name="fromstatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="fromstatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="fromstatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="tostatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="Period" value="Month" />
<input type="hidden" name="page" value="Call Records" />
<input class="button_text" type="submit" value="Call Records" >
</form>
<p>Data Table: search call records and details, filterable by call metrics.</p>
</td>
</tr>
<tr class="operator_row">
<td>
<form method="POST" action="/voiceip/statistics/?s=4&t=&order=calldate&sens=DESC&current_page=0" enctype="multipart/form-data">
<input class="button_operator" type="image" src="/voiceip/graphics/calls-per-hour.png" >
<input type="hidden" name="current_page" value="0" />
<input type="hidden" name="posted" value="1" />
<input type="hidden" name="fromstatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="fromstatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="fromstatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="tostatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="Period" value="Month" />
<input value="Calls Per Hour" name="page" type="hidden" >
</form>
<form method="POST" action="/voiceip/statistics/?s=4&t=&order=calldate&sens=DESC&current_page=0" enctype="multipart/form-data">
<input class="button_text" type="submit" value="Calls Per Hour" >
<input type="hidden" name="current_page" value="0" />
<input type="hidden" name="posted" value="1" />
<input type="hidden" name="fromstatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="fromstatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="fromstatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="tostatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="Period" value="Month" />
<input value="Calls Per Hour" name="page" type="hidden" >
</form>
<p>Line Graph: compare the hourly call loads of different days, filterable by call metrics.</p></td>
</tr>
<tr class="operator_row">
<td>
<form method="POST" action="/voiceip/statistics/?s=2&t=&order=calldate&sens=DESC&current_page=0" enctype="multipart/form-data">
<input class="button_operator" type="image" src="/voiceip/graphics/minutes-per-day.png" >
<input type="hidden" name="current_page" value="0" />
<input type="hidden" name="posted" value="1" />
<input type="hidden" name="fromstatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="fromstatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="fromstatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="tostatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="Period" value="Month" />
<input value="Minutes Per Day" name="page" type="hidden" >
</form>
<form method="POST" action="/voiceip/statistics/?s=2&t=&order=calldate&sens=DESC&current_page=0" enctype="multipart/form-data">
<input class="button_text" type="submit" value="Minutes Per Day" >
<input type="hidden" name="current_page" value="0" />
<input type="hidden" name="posted" value="1" />
<input type="hidden" name="fromstatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="fromstatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="fromstatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="tostatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="Period" value="Month" />
<input value="Minutes Per Day" name="page" type="hidden" >
</form>
<p>Bar Graph: displays the number of calls per hour, filterable by call metrics.</p></td>
</tr>
<tr class="operator_row">
<td>
<form method="POST" action="/voiceip/statistics/?s=3&t=&order=calldate&sens=DESC&current_page=0" enctype="multipart/form-data">
<input class="button_operator" type="image" src="/voiceip/graphics/monthly-minutes.png" >
<input type="hidden" name="current_page" value="0" />
<input type="hidden" name="posted" value="1" />
<input type="hidden" name="fromstatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="fromstatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="fromstatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="tostatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="Period" value="Month" />
<input value="Minutes Per Month" name="page" type="hidden" >
</form>
<form method="POST" action="/voiceip/statistics/?s=3&t=&order=calldate&sens=DESC&current_page=0" enctype="multipart/form-data">
<input class="button_text" type="submit" value="Minutes Per Month" >
<input type="hidden" name="current_page" value="0" />
<input type="hidden" name="posted" value="1" />
<input type="hidden" name="fromstatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsmonth" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="fromstatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="fromstatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="tostatsday_sday" value="<?php echo date('d');?>" />
<input type="hidden" name="tostatsmonth_sday" value="<?php echo date('Y-m');?>" />
<input type="hidden" name="Period" value="Month" />
<input value="Minutes Per Month" name="page" type="hidden" >
</form>
<p>Pie Chart: displays the number of minutes per month, filterable by call metrics.</p>
</tr>
</table>
