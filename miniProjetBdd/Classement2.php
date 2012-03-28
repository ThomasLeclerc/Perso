
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
    $req="select * from COMPETITION where noCompet=".$noCompet;
    $res=bdd_query($req);
    $l=mysql_fetch_array($res);


    
    echo "<br/><h3>".$l[1]." - classements : </h3>";


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
        $req2="select * from CLASSEMENT where noDiscipline=".$l[0]." and noCompet=".$noCompet;
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
             <input type=\"button\" value=\"modifier\" onClick=\"deroule2(150, 1);
             remplir_champ_modif('no', ".$l[0].");
             remplir_champ_modif('nomCompetitionModif', '".$l[1]."');
             remplir_champ_modif('dateModif', '".$l[2]."');
             remplir_champ_modif('nomClubModif', '".$ligne[0]."');";
        for($i=0; $i<sizeof($discipline_id); $i++){
            echo"select_checkbox('".$discipline_id[$i]."');";
        }
        echo "\">
             <br/>
             <input type=\"button\" value=\"supprimer\" onClick=\"javascript:if(confirm('confirmez-vous la suppression ?'))document.location.href='Maj_competition.php?action=2&id=".$l[0]."'\" ></td></tr>\n";


        //on affiche les athletes et le classement
        while($ligne=mysql_fetch_array($res2)){
            //on détermine le nom de l'athlete
            $request3="select nomAthlete from ATHLETE where noAthlete=".$ligne[0];
            $result3=bdd_query($request3);
            $nomAthlete=mysql_fetch_array($result3);
            echo "<tr><td>".$nomAthlete[0]."</td><td>".$ligne[3]."</td>\n";

             echo "<td>
             <input type=\"button\" value=\"modifier\" onClick=\"deroule2(150, 1);
             remplir_champ_modif('no', ".$l[0].");
             remplir_champ_modif('nomCompetitionModif', '".$l[1]."');
             remplir_champ_modif('dateModif', '".$l[2]."');
             remplir_champ_modif('nomClubModif', '".$ligne[0]."');";
             for($i=0; $i<sizeof($discipline_id); $i++){
                 echo"select_checkbox('".$discipline_id[$i]."');";
             }
             echo "\">
             <br/>
             <input type=\"button\" value=\"supprimer\" onClick=\"javascript:if(confirm('confirmez-vous la suppression ?'))document.location.href='Maj_competition.php?action=2&id=".$l[0]."'\" ></td></tr>\n";
        }    
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
                       <td><input type="submit" value="Ajouter" onclick="return check_two_fields('nomCompetition', 'date')">
                           <input type="reset" value="Annuler" onClick="deroule(28,2); field_ok('nomCompetition');field_ok('date') "> </td>
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
                       <td><input type="submit" value="Modifier" onClick="return check_field('nomCompetitionModif');check_field('dateModif')">
                         <input type="reset" value="Annuler" onClick="deroule2(0,2); field_ok('nomCompetitionModif'); field_ok('dateModif')"></td>
                   </tr>
               </table>


        </form>
    </div><br/>
</div><br/>

</body>
</html>



