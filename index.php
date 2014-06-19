<?php
include('./header.php');
/* KUDUNDA 0.1 */
/* index.php */

class index {


	
	function mainpage() {
	global $html;
	
$html .= <<< EOH
<p id="index_steps"><img src="./images/index-step1.png" />&nbsp;&nbsp;<img src="./images/index-step2.png" />&nbsp;&nbsp;<img src="./images/index-step3.png" /></p>
EOH;
	}




	function logo() {
	global $html;

$html .= <<< EOH
<img style="margin:auto; text-align:center; display:block;" src="./images/logo.png" /><br />
<img style="margin:auto; text-align:center; display:block;" src="./images/sub-logo.png" /><br /><br />
EOH;


	}
}

index::logo();
index::mainpage();

include('./footer.php');
?>