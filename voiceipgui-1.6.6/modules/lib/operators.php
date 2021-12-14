<div class="options">

<?php
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
// Get all the data from the "example" table
$result = mysql_query("select distinct panel from operator order by panel asc") or die(mysql_error());  

while($row = mysql_fetch_array( $result )) {
$panel=$row['panel'];
    ?>

    <a href="/voiceip/operators/panel/?page=operator&context=<?php echo $panel; ?>">
        <img src="/voiceip/graphics/operator.png">
        <div class="options_i"><div class="options_header"><?php echo $panel; ?></div></div>
    </a> 

    <?php

} 
?>

</div>


