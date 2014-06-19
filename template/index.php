<?php

/* KUDUNDA 0.1 */
/* template/index.php */

//class index {

	//function short_login() {

$html = <<< EOH
<form name="login" method="post" action="../login.php?act=verify">
Username:&nbsp;<input name="username" type="text" id="username" size="15" />&nbsp;&nbsp;
Password:&nbsp;<input name="password" type="text" id="password" size="15" />
&nbsp;<input type="submit" name="Submit" value="Login" />		
</form>
EOH;

	print($html);

//	}
//}


//$index->short_login();
?>