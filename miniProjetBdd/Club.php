
<?php
    require_once("header.php");
    require_once("bdd.php");
    print_header("Club", "Style.css", "Script.js");
?>
<br/>
<br/>

<div id="mainContainer">
    <br/><h3>Table CLUB</h3>
    <?php
    bdd_connect();
    $req="Select * from CLUB";
    $res=bdd_query($req);
    echo"<div id=\"tableau\">\n
        <table id=\"table\">\n
            <tr>\n
                <td><b>Identifiant</b></td><td class=\"nomClub\"><b>Nom</b></td><td><b>Ville</b></td>\n
             </tr>";

    while($l=mysql_fetch_array($res)){
        echo"<tr>\n
                <td>".$l[0]."</td><td class=\"nomVille\">".$l[1]."</td>";
                $req2="select nomVille from VILLE v, CLUB c where c.noVille=".$l[2]." and v.noVille=c.noVille";
                $res2=bdd_query($req2);
                $ligne=mysql_fetch_array($res2);
                echo"<td>".$ligne[0]."</td>
                    <td><a href=\"javascript:void(0)\" 
                    onClick=\"deroule2(150, 1); remplir_champ_modif('no', ".$l[0].");remplir_champ_modif('nomClubModif', '".$l[1]."');
                    remplir_champ_modif('nomVilleModif', '".$ligne[0]."')\">
                    <img src=\"img/Edit.png\" title=\"modifier\"></a>

                    <a href=\"javascript:if(confirm('confirmez-vous la suppression ?'))document.location.href='Maj_club.php?action=2&id=".$l[0]."'\" ><img src=\"img/remove.png\" title=\"supprimer\"></a></td>\n";

    }
    echo "</table></div>"
    ?>

    <div id="form_ajout">
        <input type="button" onClick="deroule(150, 1)" value="Ajouter un club"><br/>
        <form method="POST" action="Maj_club.php?action=1" onSubmit="return confirm('confirmez-vous l\'ajout ?')">
               <table>
                   <tr>
                       <td><label for="nomClub">Nom : </label></td><td><input type="text" name="nomClub" id="nomClub" onkeyup="check_field('nomClub')"></td>
                       <td id="error_nomClub"></td>
                   </tr>
                   <tr>
                   <td><label for="nomVille">Ville : </label></td><td><select  name="nomVille" id="nomVille" >
                           <option selected="selected">sélectionner une ville</option>
                           <?php
                           $request="select nomVille from VILLE";
                           $resultat=bdd_query($request);
                           while($ligne=mysql_fetch_array($resultat)){
                               echo "<option value=\"".$ligne[0]."\">".$ligne[0]."</option>\n";
                           }

                           ?>

                       </select></td>
                   <td id="error_nomVille"></td>
                   </tr>
                   <tr>
                       <td></td>
                       <td><input type="submit" value="Ajouter" onclick="return check_two_fields('nomClub', 'nomVille')">
                           <input type="reset" value="Annuler" onClick="deroule(28,2); field_ok('nomVille'); field_ok('nomClub')"> </td>
                   </tr>
               </table>

        </form>
    </div><br/><br/>

    <div id="form_modif">
        <br/>
        modifier le club
        <form method="POST" action="Maj_club.php?action=3" onSubmit="return confirm('confirmez-vous la modification ?')">
               <table>
                   <tr>
                   <td><input type="text" name="no" id="no" readonly="readonly"></td><td><input type="text" name="nomClubModif" id="nomClubModif" onKeyUp="check_field('nomClubModif')"></td>
                   <td id="error_nomClubModif"></td>
                   </tr>

                   <tr>
                       <td></td><td><select name="nomVilleModif" id="nomVilleModif">
                               <option></option>
                           <?php
                           $request="select nomVille from VILLE";
                           $resultat=bdd_query($request);
                           while($ligne=mysql_fetch_array($resultat)){
                               echo "<option value=\"".$ligne[0]."\">".$ligne[0]."</option>\n";
                           }

                           ?>
                           </select></td>
                       <td id="error_nomVilleModif"></td>
                   </tr>

                   <tr>
                       <td></td>
                       <td><input type="submit" value="Modifier" onClick="return check_field('nomClubModif')">
                         <input type="reset" value="Annuler" onClick="deroule2(0,2); field_ok('nomClubModif'); field_ok('nomVilleModif')"></td>
                   </tr>
               </table>


        </form>
    </div>
</div><br/>

</body>
</html>


