<?php
include('./header.php');
/* KUDUNDA 0.1 */
/* home.php */

class home {

	function user_info_sql() {
		global $link, $user_info;
		
		
		$sql    = "SELECT * FROM profile WHERE id = " . $_SESSION['id'] . "";
		$result = mysql_query($sql, $link);

		if (!$result) {
			echo "Datenbank Fehler! Koennten nicht die Datenbank zu bezweifeln!";
			echo 'MySQL Fehler: ' . mysql_error();
			exit;
		}
		
		$user_info = mysql_fetch_array($result);
		
	}

	function recent_pictures_sql() {
		global $link, $recent;
		
		
		$sql    = "SELECT * FROM pictures WHERE uploader_id = " . $_SESSION['id'] . " ORDER BY id DESC LIMIT 10";
		$result = mysql_query($sql, $link);

		if (!$result) {
			echo "Datenbank Fehler! Koennten nicht die Datenbank zu bezweifeln!";
			echo 'MySQL Fehler: ' . mysql_error();
			exit;
		}
		
		if (mysql_fetch_array($result) == NULL) {
		$recent .= "<div class='recent_pictures'>You have yet to upload any pictures from events you have attended!</div>";
		} else {	
		$recent .= "<div id='recently_uploaded_box'>";
		while($recent_pictures = mysql_fetch_array($result)){
		// $recent .= "<div class='recent_pictures'>";
		$recent .= "<img class='recent_pictures' src='./pictures/" . $recent_pictures['filename'] . "' />";
		// $recent .= "</div>";
		}
		$recent .= "</div>";
		}
	}
}

home::user_info_sql();
home::recent_pictures_sql();

$html .= <<< EOH
<div id='column1'>
	<div id='about_me-block'>
		<img src="./ %USER_PROFILE_PICTURE% " />
		<p>{$user_info['firstname']} {$user_info['lastname']} (ID#: {$user_info['id']})<br />
		{$user_info['location']}<br />
		Account: {$user_info['account_type']}</p>
	</div>
	<div id='links-to-my-pictures'><p>
		%EVENTS_IVE_UPLOADED_TO%<br />
		%EVENTS_IVE_CREATED%<br />
		%PICTURES_IVE_UPLOADED%<br />
	</p>
	<p>
		Upcoming Events for My Location:<br />(%CHANGE_LOCATION%)<br/>
			<div id='upcoming-events-my-location'>%LIST_OF_EVENTS%</div>
	</p>
	</div>
</div>

<div id='column2'>
	<p id='create-bar'><a href='./upload.php'>Upload New Pictures</a> | %CREATE_EVENT%</p>
	<br />
		$recent
</div>

EOH;

include('./footer.php');
?>