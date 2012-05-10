<?php
	require_once("bdd.php");
	bdd_connect();
	$num=$_GET["num"];
	$res=bdd_query("select * from ABONNE where num=".$num);
	$l=mysql_fetch_array($res);
	echo "<input type=\"button\" value=\"modifier\" onClick=\"form_modif(".$l[0].")\"><br/>
		<table id=\"info_abonne\">
		<tr> 	<td class=\"libelle\">login : </td><td>".$l[1]."</td>  </tr>
		<tr>	<td class=\"libelle\">mot de passe: </td><td>".$l[2]."</td> </tr>
		<tr>	<td class=\"libelle\">prenom : </td><td>".$l[3]."</td> </tr>
		<tr>	<td class=\"libelle\">nom : </td><td>".$l[4]."</td> </tr>
		<tr>	<td class=\"libelle\">date de naissance : </td><td>".$l[5]."</td> </tr>
		<tr>	<td class=\"libelle\">taille : </td><td>".$l[6]."</td> </tr>
		<tr>	<td class=\"libelle\">poids : </td><td>".$l[7]."</td> </tr>
		<tr>	<td class=\"libelle\">taux graisse : </td><td>".$l[8]."</td> </tr>
		<tr>	<td class=\"libelle\">tour epaules : </td><td>".$l[9]."</td> </tr>
		<tr>	<td class=\"libelle\">tour de la taille : </td><td>".$l[10]."</td> </tr>
		<tr>	<td class=\"libelle\">tour biceps : </td><td>".$l[11]."</td> </tr>
		<tr>	<td class=\"libelle\">Photo : </td><td><img src=\"".$l[12]."\" height=\"40%\" width=\"40%\"></td> </tr>
		</table>";	

?>
