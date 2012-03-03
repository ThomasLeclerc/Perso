<?php
    require_once("header.php");
    require_once("bdd.php");
    print_header("Ville", "Style.css", "Script.js");

?>
<br/>
<br/>

<div id="mainContainer">
    <br/><h3>Table VILLE</h3>
    <?php
    bdd_connect();
    $req="Select * from VILLE";
    $res=bdd_query($req);
    echo"<div id=\"tableau\">\n
        <table id=\"table\">\n
            <tr>\n
                <td><b>Identifiant</b></td><td class=\"nomVille\"><b>Nom</b></td>\n
             </tr>";

    while($l=mysql_fetch_array($res)){
        echo"<tr>\n
                <td>".$l[0]."</td><td class=\"nomVille\">".$l[1]."</td>
                <td><a href=\"javascript:void(0)\" onClick=\"deroule2(100, 1, '".$l[1]."', '".$l[0]."')\"><img src=\"img/Edit.png\" title=\"modifier\"></a>

                <a href=\"javascript:if(confirm('confirmez-vous la suppression ?'))document.location.href='Maj_ville.php?action=2&id=".$l[0]."'\" ><img src=\"img/remove.png\" title=\"supprimer\"></a></td>\n";

    }
    echo "</table></div>"
    ?>
    
    <div id="form_ajout">
        <input type="button" onClick="deroule(100, 1)" value="Ajouter une ville"><br/>
        <form method="POST" action="Maj_ville.php?action=1" onSubmit="return confirm('confirmez-vous l\'ajout ?')">
               <table>
                    <tr>
                   <td><label for="nomVille">Nom Ville : </label></td><td><input type="text" name="nomVille" id="nomVille" onKeyUp="check_field_nom_ville('nomVille')"></td>
                   <td id="error_nomVille"></td>
                   </tr>
                   <tr>
                       <td></td>
                       <td><input type="submit" value="Ajouter" onclick="return check_field_nom_ville('nomVille')">
                           <input type="reset" value="Annuler" onClick="deroule(28,2); field_ok('nomVille')"> </td>
                   </tr>
               </table>
               
        </form>
    </div><br/><br/>

    <div id="form_modif">
        <br/>
        modifier la ville
        <form method="POST" action="Maj_ville.php?action=3" onSubmit="return confirm('confirmez-vous la modification ?')">
               <table>
                   <tr>
                   <td><input type="text" name="no" id="no" readonly="readonly"></td><td><input type="text" name="nomVilleModif" id="nomVilleModif" onKeyUp="check_field_nom_ville('nomVilleModif')"></td>
                   <td id="error_nomVilleModif"></td>
                   </tr>
                   <tr>
                       <td></td>
                       <td><input type="submit" value="Modifier" onClick="return check_field_nom_ville('nomVilleModif')">
                         <input type="reset" value="Annuler" onClick="deroule2(0,2); field_ok('nomVilleModif')"></td>
                   </tr>
               </table>
            
               
        </form>
    </div>
</div><br/>

</body>
</html>