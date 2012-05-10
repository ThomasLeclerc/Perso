<?php
    require_once("header.php");
    require_once("bdd.php");
    print_header("Discipline", "Style.css", "Script.js");

?>
<br/>
<br/>

<div id="mainContainer">
    <br/><h3>Table DISCIPLINE</h3>
    <?php
    bdd_connect();
    $req="Select * from DISCIPLINE";
    $res=bdd_query($req);
    echo"
        <table id=\"tableau\">\n
            <tr>\n
                <td><b>ID</b></td><td class=\"libelleDiscipline\"><b>Libelle</b></td>\n
             </tr>";

    while($l=mysql_fetch_array($res)){
        echo"<tr>\n
                <td>".$l[0]."</td><td class=\"libelleDiscipline\">".$l[1]."</td>
                <td><input type=\"button\" value=\"modifier\" onClick=\"deroule2(100, 1, '".$l[1]."', '".$l[0]."');remplir_champ_modif('no', ".$l[0].");remplir_champ_modif('libelleDisciplineModif', '".$l[1]."')\">
                <br/><input type=\"button\" value=\"supprimer\" onClick=\"if(confirm('confirmez-vous la suppression ?'))document.location.href='Maj_discipline.php?action=2&id=".$l[0]."'\"></td></tr>\n";

    }
    echo "</table>"
    ?>

    <div id="form_ajout">
        <input type="button" onClick="deroule(100, 1)" value="Ajouter une discipline"><br/>
        <form method="POST" action="Maj_discipline.php?action=1" onSubmit="return confirm('confirmez-vous l\'ajout ?')">
               <table>
                    <tr>
                   <td><label for="libelleDiscipline">Libellé : </label></td><td><input type="text" name="libelleDiscipline" id="libelleDiscipline" onKeyUp="check_field('libelleDiscipline')"></td>
                   <td id="error_libelleDiscipline"></td>
                   </tr>
                   <tr>
                       <td></td>
                       <td><input type="submit" value="Ajouter" onclick="return check_field('libelleDiscipline')">
                           <input type="reset" value="Annuler" onClick="deroule(28,2); field_ok('libelleDiscipline')"> </td>
                   </tr>
               </table>

        </form>
    </div><br/><br/>

    <div id="form_modif">
        <br/>
        modifier la discipline
        <form method="POST" action="Maj_discipline.php?action=3" onSubmit="return confirm('confirmez-vous la modification ?')">
               <table>
                   <tr>
                   <td><input type="text" name="no" id="no" readonly="readonly">
                       <label for="libelleDisciplineModif">Libellé : </label></td>
                   <td><input type="text" name="libelleDisciplineModif" id="libelleDisciplineModif" onKeyUp="check_field('libelleDisciplineModif')"></td>
                   <td id="error_libelleDisciplineModif"></td>
                   </tr>
                   <tr>
                       <td></td>
                       <td><input type="submit" value="Modifier" onClick="return check_field('libelleDisciplineModif')">
                         <input type="reset" value="Annuler" onClick="deroule2(0,2); field_ok('libelleDisciplineModif')"></td>
                   </tr>
               </table>


        </form>
    </div><br/>
</div><br/>

</body>
</html>