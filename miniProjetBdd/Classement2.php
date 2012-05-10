
<?php
    require_once("header.php");
    require_once("bdd.php");

    print_header("Classements" , "Style.css", "Script.js");
?>
<br/>
<br/>

<div id="mainContainer">
<?php
    bdd_connect();
    $noCompet=$_GET["noCompet"];

    //onrécupère le nom de la compétition
    $req="select nomCompet from COMPETITION where noCompet=".$noCompet;
    $res=bdd_query($req);
    $nomCompet=mysql_fetch_array($res);


    
    echo "<br/><h3>".$nomCompet[0]." - classements : </h3>";


    //affichage des résultats dans un tableau
    echo"
        <table id=\"tableau\" border>\n
            <tr>\n
               <td><b>Discipline</b></td> <td><b>Athlete</b></td><td><b>Classement</b></td>\n
             </tr>";

    //on sélectionne tous les classement pour cette compétition
    $req="Select Distinct noDiscipline from CLASSEMENT where noCompet=".$noCompet;
    $res=bdd_query($req);
    
    while($l=mysql_fetch_array($res)){
        //on determine la hauteur de la cellule discipline
        $request="select COUNT(noAthlete) from CLASSEMENT where noCompet=".$noCompet." and noDiscipline=".$l[0];
        $result=bdd_query($request);
        $nbr=mysql_fetch_array($result);

        //on détermine le libellé de la discipline
        $request2="select libelleDiscipline from DISCIPLINE where noDiscipline=".$l[0];
        $result2=bdd_query($request2);
        $libelleDiscipline=mysql_fetch_array($result2);



        //affichage de la première cellule et de la 1ère ligne
        //on doit le faire hors de la boucle pour le rowspan
        $req2="select * from CLASSEMENT where noDiscipline=".$l[0]." and noCompet=".$noCompet." ORDER BY classement";
        $res2=bdd_query($req2);
        $ligne=mysql_fetch_array($res2);
            //on détermine le nom de l'athlete
        $request3="select nomAthlete from ATHLETE where noAthlete=".$ligne[0];
        $result3=bdd_query($request3);
        $nomAthlete=mysql_fetch_array($result3);
        echo"<tr>\n";
        echo "<th rowspan=".$nbr[0]."> ".$libelleDiscipline[0]." </th>\n";
        echo "<td>".$nomAthlete[0]."</td><td>".$ligne[3]."</td>\n";
        echo "<td>
             <input type=\"button\" value=\"modifier\" onClick=\"deroule2(200, 1);
             remplir_champ_modif('AthleteModif', ".$ligne[0].");
             remplir_champ_modif('CompetitionModif', '".$nomCompet[0]."');
             remplir_champ_modif('DisciplineModif', '".$ligne[2]."');
             remplir_champ_modif('classementModif', '".$ligne[3]."');
             remplir_champ_modif('AthleteModifOld', ".$ligne[0].");
             remplir_champ_modif('CompetModifOld', '".$ligne[1]."');
             remplir_champ_modif('DisciplineModifOld', '".$ligne[2]."');
             remplir_champ_modif('classementModifOld', '".$ligne[3]."');";
        
        echo "\">
             <br/>
             <input type=\"button\" value=\"supprimer\"
             onClick=\"javascript:if(confirm('confirmez-vous la suppression ?'))document.location.href='Maj_classement.php?action=2&noCompet=".$noCompet."&noAthlete=".$ligne[0]."&noDiscipline=".$ligne[2]."&classement=".$ligne[3]."'\" ></td></tr>\n";


        //on affiche les athletes et le classement
        while($ligne=mysql_fetch_array($res2)){
            //on détermine le nom de l'athlete
            $request3="select nomAthlete from ATHLETE where noAthlete=".$ligne[0];
            $result3=bdd_query($request3);
            $nomAthlete=mysql_fetch_array($result3);
            echo "<tr><td>".$nomAthlete[0]."</td><td>".$ligne[3]."</td>\n";

             echo "<td>
             <input type=\"button\" value=\"modifier\" onClick=\"deroule2(200, 1);
             remplir_champ_modif('AthleteModif', ".$ligne[0].");
             remplir_champ_modif('CompetitionModif', '".$nomCompet[0]."');
             remplir_champ_modif('DisciplineModif', '".$ligne[2]."');
             remplir_champ_modif('classementModif', '".$ligne[3]."');
             remplir_champ_modif('AthleteModifOld', ".$ligne[0].");
             remplir_champ_modif('CompetModifOld', '".$ligne[1]."');
             remplir_champ_modif('DisciplineModifOld', '".$ligne[2]."');
             remplir_champ_modif('classementModifOld', '".$ligne[3]."');";
             
             echo "\">
             <br/>
             <input type=\"button\" value=\"supprimer\"
             onClick=\"javascript:if(confirm('confirmez-vous la suppression ?'))document.location.href='Maj_classement.php?action=2&noCompet=".$noCompet."&noAthlete=".$ligne[0]."&noDiscipline=".$ligne[2]."&classement=".$ligne[3]."'\" ></td></tr>\n";
        }    
    }
    echo "</table>"
    ?>


    <!-- formulaire d'ajout d'un competition-->
    <div id="form_ajout">
        <input type="button" onClick="deroule(200, 1)" value="Ajouter un classement"><br/>
        <?php
            echo "<form method=\"POST\" action=\"Maj_classement.php?action=1&noCompet=".$noCompet."\" onSubmit=\"return confirm('confirmez-vous l\'ajout ?')\">";
        ?>
            <table>
                  
                   <!--liste des compétitions pour ajout -->
                   <tr>
                       <?php
                            $requete="select nomCompet from COMPETITION where noCompet=".$noCompet;
                            $resultat=bdd_query($requete);
                            $nomCompet=mysql_fetch_array($resultat);
                            echo "<td><label for=\"Competition\">Competition : </label></td>
                                    <td><input type=\"text\" name=\"Competition\" id=\"Competition\" value=\"".$nomCompet[0]."\" readonly=\"readonly\">";
                         

                       ?>
                       </td>
                       <td id="error_Competition"></td>
                   </tr>
                   
                   <!--liste des athletes pour ajout -->
                   <tr>
                       <?php
                            $resultat=bdd_query("Select * from ATHLETE");
                            echo "<td><label for=\"Athlete\">Athlete : </label></td>
                                    <td><select name=\"Athlete\" id=\"Athlete\">
                                        <option value=0>Séletionner un athlète</option>";
                            while($ligne=mysql_fetch_array($resultat)){
                                echo "<option value=\"".$ligne[0]."\">".$ligne[1]."</option>";
                            }

                       ?>
                       </select></td>
                       <td id="error_Athlete"></td>
                   </tr>

                   <!--liste des discipline pour ajout -->
                   <tr>
                       <?php
                            $resultat=bdd_query("Select * from DISCIPLINE");
                            echo "<td><label for=\"Discipline\">Discipline : </label></td>
                                    <td><select name=\"Discipline\" id=\"Discipline\">
                                        <option value=0>Séletionner une discipline</option>";
                            while($ligne=mysql_fetch_array($resultat)){
                                echo "<option value=\"".$ligne[0]."\">".$ligne[1]."</option>";
                            }

                       ?>
                       </select></td>
                       <td id="error_Discipline"></td>
                   </tr>



                   <tr>
                   <td><label for="classement">classement : </label></td>
                   <td><input type="text" name="classement" id="classement" onKeyUp="check_field('classement')"></td>
                   <td id="error_classement"></td>
                   </tr>

                   <tr>
                       <td></td>
                       <td><input type="submit" value="Ajouter" onclick="return (check_select('Athlete')&&check_select('Discipline')&&check_field('classement'))">
                           <input type="reset" value="Annuler" onClick="deroule(28,2); field_ok('Competition');field_ok('Athlete'); field_ok('classement'); field_ok('Discipline')"> </td>
                   </tr>
               </table>

        </form>
    </div><br/><br/>


    <!-- formulaire de modification d'un competition-->
    <div id="form_modif">

        modifier la competition
        <?php
            echo "<form method=\"POST\" action=\"Maj_classement.php?action=3&noCompet=".$noCompet."\" onSubmit=\"return confirm('confirmez-vous la modification ?')\">";
        ?>
            <table>

                   <!--liste des compétitions pour modif -->
                   <tr> 
                       <input type="text" name="CompetModifOld" id="CompetModifOld" class="hidden_fields" readonly>
                       <input type="text" name="AthleteModifOld" id="AthleteModifOld" class="hidden_fields" readonly>
                       <input type="text" name="DisciplineModifOld" id="DisciplineModifOld" class="hidden_fields" readonly>
                       <input type="text" name="classementModifOld" id="classementModifOld" class="hidden_fields" readonly>
                       <?php
                            $requete="select nomCompet from COMPETITION where noCompet=".$noCompet;
                            $resultat=bdd_query($requete);
                            $nomCompet=mysql_fetch_array($resultat);
                            echo "<td><label for=\"CompetitionModif\">Competition : </label></td>
                                    <td><input type=\"text\" name=\"CompetitionModif\" id=\"CompetitionModif\" value=\"".$nomCompet[0]."\" readonly=\"readonly\">";


                       ?>
                       </td>
                       <td id="error_CompetitionModif"></td>
                   </tr>

                   <!--liste des athletes pour modif -->
                   <tr>
                       <?php
                            $resultat=bdd_query("Select * from ATHLETE");
                            echo "<td><label for=\"AthleteModif\">Athlete : </label></td>
                                    <td><select name=\"AthleteModif\" id=\"AthleteModif\">
                                    <option value=\"0\"></option>";
                            while($ligne=mysql_fetch_array($resultat)){
                                echo "<option value=\"".$ligne[0]."\">".$ligne[1]."</option>";
                            }

                       ?>
                       </select></td>
                       <td id="error_AthleteModif"></td>
                   </tr>

                   <!--liste des discipline pour modif -->
                   <tr>
                       <?php
                            $resultat=bdd_query("Select * from DISCIPLINE");
                            echo "<td><label for=\"DisciplineModif\">Discipline : </label></td>
                                    <td><select name=\"DisciplineModif\" id=\"DisciplineModif\">
                                    <option value=\"0\"></option>";
                            while($ligne=mysql_fetch_array($resultat)){
                                echo "<option value=\"".$ligne[0]."\">".$ligne[1]."</option>";
                            }

                       ?>
                       </select></td>
                       <td id="error_DisciplineModif"></td>
                   </tr>



                   <tr>
                   <td><label for="classementModif">classement : </label></td>
                   <td><input type="text" name="classementModif" id="classementModif" onKeyUp="check_field('classementModif')"></td>
                   <td id="error_classementModif"></td>
                   </tr>

                   <tr>
                       <td></td>
                       <td><input type="submit" value="Modifier" onclick="return (check_select('AthleteModif')&&check_select('DisciplineModif')&&check_field('classementModif'))">
                           <input type="reset" value="Annuler" onClick="deroule2(0,2)"> </td>
                   </tr>
               </table>



        </form>
    </div><br/>
</div><br/>

</body>
</html>



