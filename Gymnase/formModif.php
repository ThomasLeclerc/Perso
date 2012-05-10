<?php
    require_once("bdd.php");
    bdd_connect();
    $id=$_GET["id"];
    $res=bdd_query("select * from ABONNE where num=".$id);
    $l=mysql_fetch_array($res);
    echo "<form>
            <input type=\"submit\" value=\"sauvegarder\" onClick=\"sauvegarder(".$l[0].")\">
            <input type=\"button\" value=\"annuler\" onClick=\"showHint(".$l[0].")\"><br/>
		<table id=\"info_abonne\">
                <tr> 	<td class=\"libelle\">identifiant : </td><td><input type=\"text\" id=\"num\" value=\"".$l[0]."\"></td>  </tr>
		<tr> 	<td class=\"libelle\">login : </td><td><input type=\"text\" id=\"login\" value=\"".$l[1]."\"></td>  </tr>
		<tr>	<td class=\"libelle\">mot de passe: </td><td><input type=\"text\" id=\"mdp\" value=\"".$l[2]."\"></td> </tr>
		<tr>	<td class=\"libelle\">prenom : </td><td><input type=\"text\" id=\"prenom\" value=\"".$l[3]."\"></td> </tr>
		<tr>	<td class=\"libelle\">nom : </td><td><input type=\"text\" id=\"nom\" value=\"".$l[4]."\"></td> </tr>
		<tr>	<td class=\"libelle\">date de naissance : </td><td><input id=\"date_naissance\" type=\"text\" value=\"".$l[5]."\"></td> </tr>
		<tr>	<td class=\"libelle\">taille : </td><td><input type=\"text\" id=\"taille\" value=\"".$l[6]."\"></td> </tr>
		<tr>	<td class=\"libelle\">poids : </td><td><input type=\"text\" id=\"poids\" value=\"".$l[7]."\"></td> </tr>
		<tr>	<td class=\"libelle\">taux graisse : </td><td><input type=\"text\" id=\"taux_graisse\" value=\"".$l[8]."\"></td> </tr>
		<tr>	<td class=\"libelle\">tour epaules : </td><td><input type=\"text\" id=\"tour_epaules\" value=\"".$l[9]."\"></td> </tr>
		<tr>	<td class=\"libelle\">tour de la taille : </td><td><input type=\"text\" id=\"tour_taille\" value=\"".$l[10]."\"></td> </tr>
		<tr>	<td class=\"libelle\">tour biceps : </td><td><input type=\"text\" id=\"tour_biceps\" value=\"".$l[11]."\"></td> </tr>
		<tr>	<td class=\"libelle\">Photo : </td><td><img src=\"".$l[12]."\" height=\"40%\" width=\"40%\"></td> </tr>
		</table>

            </form>";
?>
