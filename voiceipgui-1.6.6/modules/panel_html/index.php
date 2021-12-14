<?php
$context=$_GET['context'];
?>
<object>
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="operator_panel.swf" />
<param name="quality" value="high" />
<param name="FlashVars" value="context=<?php echo $context;?>" />
<param name="bgcolor" value="#ffffff" />
<param name="scale" value="exactfit" />
<embed src="operator_panel.swf" quality="high" scale="exactfit" bgcolor="#ffffff" width="100%" height="100%" align="center" allowScriptAccess="sameDomain" 
FlashVars="context=<?php echo $context;?>"
type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
