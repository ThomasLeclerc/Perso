
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
    echo"
        <table id=\"table\">\n
            <tr>\n
                <td><b>Identifiant</b></td><td><b>Nom</b></td><td><b>Club</b></td><td><b>Spécialités</b></td>\n
             </tr>";

    while($l=mysql_fetch_array($res)){
        echo"<tr>\n
                <td>".$l[0]."</td><td>".$l[1]."</td>";

                //obtention du nom du club
                $req2="select nomClub from CLUB c where c.noClub=".$l[2];
                $res2=bdd_query($req2);
                $ligne=mysql_fetch_array($res2);
                echo"<td>".$ligne[0]."</td>";

                //obtention des spécialités
                $req3="select d.libelleDiscipline from DISCIPLINE d, ESTSPECIALISTE e where
                        e.noAthlete='".$l[0]."' and e.noDiscipline=d.noDiscipline";
                $res3=bdd_query($req3);
                echo "<td class=\"specialite\"> <ul>";
                while($ligne2=mysql_fetch_array($res3)){
                    echo "<li>".$ligne2[0]."</li>";
                }
                echo "</ul></td>";

                //récupération des id des spécialités dans $discipline_id[]
                //pour pré-cocher dans le formulaire de modification
                $req4="select d.noDiscipline from DISCIPLINE d, ESTSPECIALISTE e where
                        e.noAthlete='".$l[0]."' and e.noDiscipline=d.noDiscipline";
                $res4=bdd_query($req4);
                $discipline_id=array();
                
                while($ligne3=mysql_fetch_array($res4)){
                    $discipline_id[]=$ligne3[0];
                    
                }
                echo "<td>
                    <input type=\"button\" value=\"modifier\" onClick=\"deroule2(350, 1); remplir_champ_modif('no', ".$l[0].");remplir_champ_modif('nomAthleteModif', '".$l[1]."');
                    remplir_champ_modif('nomClubModif', '".$ligne[0]."');";
                    for($i=0; $i<sizeof($discipline_id); $i++){
                        echo"select_checkbox('".$discipline_id[$i]."');";
                    }
                    echo "\">
                    <br/>
                    <input type=\"button\" value=\"supprimer\" onClick=\"javascript:if(confirm('confirmez-vous la suppression ?'))document.location.href='Maj_athlete.php?action=2&id=".$l[0]."'\" ></td>\n";

    }
    echo "</table>"
    ?>


    <!-- formulaire d'ajout d'un athlete-->
    <div id="form_ajout">
        <input type="button" onClick="deroule(350, 1)" value="Ajouter un athlete"><br/>
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
                   <tr class="list_disc">
                       <?php
                       echo "<td>Spécialité(s) : </td><td>";
                       $req="select * from DISCIPLINE";
                       $res=bdd_query($req);
                       
                       while($l=mysql_fetch_array($res)){
                           echo "<input type=\"checkbox\" name=\"discipline[]\" value=\"".$l[0]."\">".$l[1]."<br/>";
                           
                       }

                       ?>
                       </td></tr>
                   <tr>
                       <td></td>
                       <td><input type="submit" value="Ajouter" onclick="return check_two_fields('nomAthlete', 'nomClub')">
                           <input type="reset" value="Annuler" onClick="deroule(28,2); field_ok('nomClub'); field_ok('nomAthlete')"> </td>
                   </tr>
               </table>

        </form>
    </div><br/><br/>


    <!-- formulaire de modification d'un athlete-->
    <div id="form_modif">

        modifier l'athlete
        <form method="POST" action="Maj_athlete.php?action=3" onSubmit="return confirm('confirmez-vous la modification ?')">
               <table>
                   <tr>
                   <td><input type="text" name="no" id="no" readonly="readonly"></td><td><input type="text" name="nomAthleteModif" id="nomAthleteModif" onKeyUp="check_field('nomAthleteModif')"></td>
                   <td id="error_nomAthleteModif"></td>
                   </tr>

                   <tr>
                       <td>Club : </td><td><select name="nomClubModif" id="nomClubModif">
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
                   <tr class="list_disc">
                       <?php
                       echo "<td>Spécialité(s) : </td><td>";
                       $req="select * from DISCIPLINE";
                       $res=bdd_query($req);

                       while($l=mysql_fetch_array($res)){
                           echo "<input type=\"checkbox\" name=\"discipline2[]\" value=\"".$l[0]."\" id=\"".$l[0]."\">".$l[1]."<br/>";

                       }

                       ?>
                       </td></tr>
                   <tr>
                       <td></td>
                       <td><input type="submit" value="Modifier" onClick="return check_field('nomAthleteModif')">
                         <input type="reset" value="Annuler" onClick="deroule2(0,2); field_ok('nomAthleteModif'); field_ok('nomClubModif')"></td>
                   </tr>
               </table>


        </form>
    </div><br/>
</div><br/>

</body>
</html>


