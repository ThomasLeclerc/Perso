
<?php
    require_once("header.php");
    require_once("bdd.php");
    print_header("Competition", "Style.css", "Script.js");
?>
<br/>
<br/>

<div id="mainContainer">
    <br/><h3>Table COMPETITION</h3>
    <?php
    bdd_connect();
    $req="Select * from COMPETITION";
    $res=bdd_query($req);
    echo"
        <table id=\"tableau\">\n
            <tr>\n
                <td><b>ID</b></td><td><b>Nom</b></td><td><b>Date</b></td><td><b>Club</b></td>\n
             </tr>";

    while($l=mysql_fetch_array($res)){
        echo"<tr>\n
                <td>".$l[0]."</td><td>".$l[1]."</td><td>".$l[2]."</td>";

                //obtention du nom du club
                $req2="select nomClub from CLUB c where c.noClub=".$l[3];
                $res2=bdd_query($req2);
                $ligne=mysql_fetch_array($res2);
                echo"<td>".$ligne[0]."</td>";


                
                echo "<td>
                    <input type=\"button\" value=\"modifier\" onClick=\"deroule2(150, 1); remplir_champ_modif('no', ".$l[0].");remplir_champ_modif('nomCompetitionModif', '".$l[1]."');remplir_champ_modif('dateModif', '".$l[2]."');
                    remplir_champ_modif('nomClubModif', '".$ligne[0]."');";
                    for($i=0; $i<sizeof($discipline_id); $i++){
                        echo"select_checkbox('".$discipline_id[$i]."');";
                    }
                    echo "\">
                    <br/>
                    <input type=\"button\" value=\"supprimer\" onClick=\"javascript:if(confirm('confirmez-vous la suppression ?'))document.location.href='Maj_competition.php?action=2&id=".$l[0]."'\" ></td>\n";

    }
    echo "</table>"
    ?>


    <!-- formulaire d'ajout d'un competition-->
    <div id="form_ajout">
        <input type="button" onClick="deroule(150, 1)" value="Ajouter un competition"><br/>
        <form method="POST" action="Maj_competition.php?action=1" onSubmit="return confirm('confirmez-vous l\'ajout ?')">
               <table>
                   <tr>
                       <td><label for="nomCompetition">Nom : </label></td>
                       <td><input type="text" name="nomCompetition" id="nomCompetition" onkeyup="check_field('nomCompetition')"></td>
                       <td id="error_nomCompetition"></td>
                   </tr>

                   <tr>
                       <td><label for="date">Date : </label></td><td><input type="text" name="date" id="date" onkeyup="check_field('date')"></td>
                       <td id="error_date"></td>
                   </tr>
                   
                   <tr>
                   <td><label for="nomClub">Club : </label></td><td><select  name="nomClub" id="nomClub" >
                           <option selected="selected" value="0">sélectionner une Club</option>
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
                       <td><input type="submit" value="Ajouter" onclick="return (check_two_fields('nomCompetition', 'date')&&check_select('nomClub'))">
                           <input type="reset" value="Annuler" onClick="deroule(28,2); field_ok('nomCompetition');field_ok('date');field_ok('nomClubModif') "> </td>
                   </tr>
               </table>

        </form>
    </div><br/><br/>


    <!-- formulaire de modification d'un competition-->
    <div id="form_modif">

        modifier la competition
        <form method="POST" action="Maj_competition.php?action=3" onSubmit="return confirm('confirmez-vous la modification ?')">
               <table>
                   <tr>
                   <td><input type="text" name="no" id="no" readonly="readonly">
                   <label for="nomCompetitionModif">Nom : </label></td>
                   <td><input type="text" name="nomCompetitionModif" id="nomCompetitionModif" onKeyUp="check_field('nomCompetitionModif')"></td>
                   <td id="error_nomCompetitionModif"></td>
                   </tr>
                    
                   <tr>
                       <td><label for="dateModif">Date : </label></td><td><input type="text" name="dateModif" id="dateModif" onkeyup="check_field('dateModif')"></td>
                       <td id="error_dateModif"></td>
                   </tr>
                   
                   <tr>
                       <td><label for="nomClubModif">Nom : </label></td><td><select name="nomClubModif" id="nomClubModif">
                               <option value="0"></option>
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
                       <td><input type="submit" value="Modifier" onClick="return (check_two_fields('nomCompetitionModif', 'dateModif')&&check_select('nomClubModif'))">
                         <input type="reset" value="Annuler" onClick="deroule2(0,2); field_ok('nomCompetitionModif'); field_ok('dateModif');field_ok('nomClubModif')"></td>
                   </tr>
               </table>


        </form>
    </div><br/>
</div><br/>

</body>
</html>



