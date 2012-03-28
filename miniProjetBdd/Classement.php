
<?php
    require_once("header.php");
    require_once("bdd.php");
    print_header("Classement", "Style.css", "Script.js");
?>
<br/>
<br/>

<div id="mainContainer">
    <br/><h3>Table CLASSEMENT</h3>
    <table id="tab">
    <?php
    bdd_connect();
    $req="Select * from COMPETITION";
    $res=bdd_query($req);
    echo "<tr><td><label for=\"compet\">Compétition : </label></td><td><select name=\"compet\" id=\"compet\">";
    echo "<option>Sélectionner une compétition</option>";
    while($l=mysql_fetch_array($res)){
        echo "<option value=\"".$l[0]."\">".$l[1]."</option>";
    }
    echo "</select></td></tr>";


?>
    <tr><td></td><td><input type="button" name="ok" value="afficher le classement" onclick="redirection_classement()"></td></tr></table>
    <br/>
</div>
</body>
</html>