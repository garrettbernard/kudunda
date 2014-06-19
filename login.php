<?php
@session_start();
/* /* KUDUNDA 0.1 */
/* login.php */


class login {

	function verify_login() {
		global $db;
		global $html;
		global $url;
		
		require("./connect_db.php");
		$password = @$_POST['password'];
		$username = $_POST['username'];
	
	
		$sql    = "SELECT id,username,password FROM profile WHERE username = '" . $username . "'";
		$this->name_result = mysql_query($sql, $link);
			if (!$this->name_result) {
			echo "Datenbank Fehler! Koennten nicht die Datenbank zu bezweifeln!";
			echo 'MySQL Fehler: ' . mysql_error();
			exit;
		}
	
		$row = mysql_fetch_assoc($this->name_result);
	
		$id = $row['id'];
	
		if ($row['password'] == $password AND $row['username'] == $username) {
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $id;
			header('Location: ' . $url . '/kudunda/home.php');
			exit;
		} else {
			print("Incorrect password.");
		}
	}
	
	function logout() {
		global $html;
		$_SESSION = array();
		//if (isset($_COOKIE[session_name()])) {
		//	    setcookie(session_name(), '', time()-42000, '/');
		//}
		session_destroy();
		
			header('Location: ' . $url . '/kudunda/index.php');
			exit;
	}
}

$login = new login();
switch (@$_GET['act']) {
    case 'verify':
        $login->verify_login();
        break;
    case 'logoff':
		$login->logout();
		break;
	case 'register':
		$login->register_form();
		break;
	case 'verify_reg':
		$login->verify_reg();
		break;
    default:
        $login->loginform();
        break;
   }