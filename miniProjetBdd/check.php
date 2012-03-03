<?php
function check_mail($mail) {
/*
	Verification d'addresses email
*/
	if(filter_var($mail, FILTER_VALIDATE_EMAIL))
		return true;
	else
		return false;
}

/*
	Fonction vérif date pour le format "JJ-MM-AAAA"
*/
	function check_date($date) {
		$Date_s = preg_split("/[\s-]+/",$date);
		try {
			if(checkdate($Date_s[1],$Date_s[0],$Date_s[2])){
				return true;
			}
			else
				return false;
		} catch (Exception $e) {
			return false;
		}
	}

function check_log_user($page)
{
    global $droit;
    global $login;
	if(!isset($_SESSION["login"]))
	{
		echo "veuillez vous identifier pour accéder à cette page<br/>";
		echo "<a href=\"login.php?page=".$page."\">Identification</a>";
		exit();
	}
	else
	{
		$login=$_SESSION["login"];
		$droit=$_SESSION["droit"];
	}

}

?>
