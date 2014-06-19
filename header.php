<?php
session_start();
@setcookie("userid", $_SESSION['id'], time() + 3600);
/* KUDUNDA 0.1 */
/* header.php */

require("./connect_db.php");
$url = "http://localhost";

class header {

	function head() {
	global $html;
	
$html .= <<< EOH
<link rel="stylesheet" href="./main.css" />
EOH;
	}


	function logged_in_menu() {
	global $html, $userid;
	
$html .= <<< EOH
<p id='main_menu'><img src="./images/logo_mini.png" />[ <a href='./index.php'>index</a> :: <a href='./home.php'>Home</a> :: <a href='./login.php?act=logoff'>Logoff</a> :: <a href='./profile.php'>My Profile</a> :: <a href='./search.php'>Advanced Search</a> :: <a href='./upload.php'>Upload Pictures</a> ]</p>
EOH;

$userid = $_SESSION['id'];
	}
	
	function logged_off_menu() {
	global $html;

$html .= <<< EOH
<form name="login" method="post" action="./login.php?act=verify">
<p id='main_menu'><span style="float:left; margin-left:20px;">[ <a href='./home.php'>Home</a> :: <a href='./search.php'>Advanced Search</a> :: <a href='./register.php'>Register</a> ]</span>
<span stype="float:right;">Username:&nbsp;<input name="username" type="text" id="username" size="15" />&nbsp;&nbsp;
Password:&nbsp;<input name="password" type="password" id="password" size="15" />
&nbsp;<input type="image" src="./images/login.png" alt="Login" /></span>
</p>
</form>
EOH;


	}
	
}
header::head();
if (@$_SESSION['id'] != '') {
header::logged_in_menu();
} else {
header::logged_off_menu();
}

?>