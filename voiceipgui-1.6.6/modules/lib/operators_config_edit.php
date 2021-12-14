<?php 
// Make a MySQL Connection
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
echo "
<div class=\"operator_edit\">
<div class=\"box010\">
<form method=\"POST\" action=\"/voiceip/administration/operators/\" enctype=\"multipart/form-data\">
<input value=\"". $row_extension ['id'] ."\" name=\"id\" type=\"hidden\" >
<input value=\"operator_update\" name=\"operator_update\" type=\"hidden\" >
<input value=\"operator_edit\" name=\"operator_edit\" type=\"hidden\" >
<input value=\"operators\" name=\"page\" type=\"hidden\" >
<input class=\"oname\" value=\"$panel\" name=\"panel\" type=\"text\" ><br /><br />";
$counter=0;
// Get all the data from the "example" table
$result = mysql_query("select id, extension from extension order by extension") 
or die(mysql_error()); 
while($row = mysql_fetch_array( $result )) {
$extension=$row['extension'];
$checkedvar='';
$checkedvar_fin='';
$result_checkvar = mysql_query("select extension from operator where extension='$extension' and panel='$panel'") 
or die(mysql_error()); 
while($row_checkvar = mysql_fetch_array( $result_checkvar )) {
$checkedvar=$row_checkvar['extension'];
//echo "--$checkedvar--";
}
if ($checkedvar==''){
$checkedvar_fin='';
}else{
$checkedvar_fin='CHECKED';
}
$counter=$counter+1;
echo "<input type=\"checkbox\" name=\"operator$counter\" size=\"20\" maxlength=\"50\" value=\"$extension\" $checkedvar_fin >$extension<br />";
}
echo "
</div>
</div>
<div class=\"extension_edit03\">
<div class=\"box010\">
<input class=\"button_update\" type=\"submit\" value=\"update\" >
</form>
</div>
<div class=\"box010\">
<form method=\"POST\" action=\"/voiceip/administration/operators/\" enctype=\"multipart/form-data\">
<input value=\"$panel\" name=\"panel\" type=\"hidden\" >
<input value=\"operators\" name=\"page\" type=\"hidden\" >
<input value=\"operator_delete\" name=\"operator_delete\" type=\"hidden\" >
<input class=\"button_delete\" type=\"submit\" value=\"delete\" >
</form>
</div>
<div class=\"box010\">
<input type=\"checkbox\" name=\"select-all\" id=\"select-all\" />select all
</div>
</div>";
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" /></script>
<script type="text/javascript">
function Populate(){
    vals = $('input[type="checkbox"]:checked').map(function() {
        return this.value;
    }).get().join(',');
    console.log(vals);
    $('.tags').val(vals);
}
$(function () {
       $('#select-all').click(function (event) {
           var selected = this.checked;
           // Iterate each checkbox
           $(':checkbox').each(function () {    this.checked = selected; });
           Populate()
       });
    });
</script>
