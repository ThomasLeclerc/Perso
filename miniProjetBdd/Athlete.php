
<?php
    require_once("header.php");
    require_once("bdd.php");
    print_header("Athlete", "Style.css", "Script.js");
?>
<br/>
<br/>

<div id="mainContainer">
    <br/><h3>Table ATHLETE</h3>
    <?php
    bdd_connect();
    $req="Select * from ATHLETE";
    $res=bdd_query($req);
    echo"<div id=\"tableau\">\n
        <table id=\"table\">\n
            <tr>\n
                <td><b>Identifiant</b></td><td class=\"nomAthlete\"><b>Nom</b></td><td><b>Club</b></td>\n
             </tr>";

    while($l=mysql_fetch_array($res)){
        echo"<tr>\n
                <td>".$l[0]."</td><td class=\"nomClub\">".$l[1]."</td>";
                $req2="select nomClub from CLUB c where c.noClub=".$l[2];
                $res2=bdd_query($req2);
                $ligne=mysql_fetch_array($res2);
                echo"<td>".$ligne[0]."</td>
                    <td><a href=\"javascript:void(0)\"
                    onClick=\"deroule2(150, 1); remplir_champ_modif('no', ".$l[0].");remplir_champ_modif('nomAthleteModif', '".$l[1]."');
                    remplir_champ_modif('nomClubModif', '".$ligne[0]."')\">
                    <img src=\"img/Edit.png\" title=\"modifier\"></a>

                    <a href=\"javascript:if(confirm('confirmez-vous la suppression ?'))document.location.href='Maj_athlete.php?action=2&id=".$l[0]."'\" ><img src=\"img/remove.png\" title=\"supprimer\"></a></td>\n";

    }
    echo "</table></div>"
    ?>

    <div id="form_ajout">
        <input type="button" onClick="deroule(150, 1)" value="Ajouter un athlete"><br/>
        <form method="POST" action="Maj_athlete.php?action=1" onSubmit="return confirm('confirmez-vous l\'ajout ?')">
               <table>
                   <tr>
                       <td><label for="nomClub">Nom : </label></td><td><input type="text" name="nomAthlete" id="nomAthlete" onkeyup="check_field('nomAthlete')"></td>
                       <td id="error_nomAthlete"></td>
                   </tr>
                   <tr>
                   <td><label for="nomClub">Club : </label></td><td><select  name="nomClub" id="nomClub" >
                           <option selected="selected">sélectionner une Club</option>
                           <?php
                           $request="select nomClub from CLUB";
                           $resultat=bdd_query($request);
                           while($ligne=mysql_fetch_array($resultat)){
                               echo "<option value=\"".$ligne[0]."\">".$ligne[0]."</option>\n";
                           }

                           ?>

                       </select></td>
                   <td id="error_nomClub"></td>
                   </tr>
                   <tr>
                       <td></td>
                       <td><input type="submit" value="Ajouter" onclick="return check_two_fields('nomAthlete', 'nomClub')">
                           <input type="reset" value="Annuler" onClick="deroule(28,2); field_ok('nomClub'); field_ok('nomAthlete')"> </td>
                   </tr>
               </table>

        </form>
    </div><br/><br/>

    <div id="form_modif">
        <br/>
        modifier le Athlete
        <form method="POST" action="Maj_athlete.php?action=3" onSubmit="return confirm('confirmez-vous la modification ?')">
               <table>
                   <tr>
                   <td><input type="text" name="no" id="no" readonly="readonly"></td><td><input type="text" name="nomAthleteModif" id="nomAthleteModif" onKeyUp="check_field('nomAthleteModif')"></td>
                   <td id="error_nomAthleteModif"></td>
                   </tr>

                   <tr>
                       <td></td><td><select name="nomClubModif" id="nomClubModif">
                               <option></option>
                           <?php
                           $request="select nomClub from CLUB";
                           $resultat=bdd_query($request);
                           while($ligne=mysql_fetch_array($resultat)){
                               echo "<option value=\"".$ligne[0]."\">".$ligne[0]."</option>\n";
                           }

                           ?>
                           </select></td>
                       <td id="error_nomClubModif"></td>
                   </tr>

                   <tr>
                       <td></td>
                       <td><input type="submit" value="Modifier" onClick="return check_field('nomAthleteModif')">
                         <input type="reset" value="Annuler" onClick="deroule2(0,2); field_ok('nomAthleteModif'); field_ok('nomClubModif')"></td>
                   </tr>
               </table>


        </form>
    </div>
</div><br/>

</body>
</html>


