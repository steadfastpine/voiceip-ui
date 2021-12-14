<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>VoiceIP GUI</title>
    <link href="/voiceip/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="/voiceip/graphics/favicon.ico" />
</head>
<body>
    <div class="header">
        <div class="logo_box">
            <a href="http://www.voiceipsolutions.com/" title="go to voiceipsolutions.com">
            <div class="logo">
            </div>
            </a>
        </div>
        <div class="version">
<?php 
if ($logged_in==yes){
    ?>
    <b>logged in as <?php echo $user_name;?> - <a href="/logout/">logout</a></b> - voiceip gui version - <?php echo $versionnumber;?> - <a href="/voiceip/about/">about</a>
    <?php 
} 
?>

</div>
<h1>
 
 <?php 
 if (! empty($term2)){
    echo ucfirst($term2);
 }

 if ( (! empty($term3)) & ($term2 != "statistics") ){
    echo ": " . ucwords(str_replace("-", " ", $term3));
 }

 if ( (! empty($term4)) & ($term2 != "statistics") ) {
    echo ": " . ucwords(str_replace("-", " ", $term4));
 }

?>
 
</h1>

</div>
<div class="header_bottom">
    <div class="header_box_01">
    </div>
    <div class="header_box_02">
    </div>
</div>



