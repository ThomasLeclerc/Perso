<?php
	require_once("bdd.php");
	bdd_connect();
	$req="Select * from ABONNE";
	$res=bdd_query($req);
	echo "<option value=\"0\">Sélectionner un abonné</option>";
	while($l=mysql_fetch_array($res)){
		echo"<option value=\"".$l[0]."\">".$l[3]." ".$l[4]."</option>";
	}
?>
