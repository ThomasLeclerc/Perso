<?php
    require_once("bdd.php");
    bdd_connect();
    $id=$_POST["num"];
    $login=$_POST["login"];
    $mdp=$_POST["mdp"];
    $prenom=$_POST["prenom"];
    $nom=$_POST["nom"];
    $birthDate=$_POST["date_naissance"];
    $taille=$_POST["taille"];
    $poids=$_POST["poids"];
    $tauxGraisse=$_POST["taux_graisse"];
    $tourEpaules=$_POST["tour_epaules"];
    $tourTaille=$_POST["tour_taille"];
    $tourBiceps=$_POST["tour_biceps"];

    $request="UPDATE ABONNE set login=".$login.", mdp=".$mdp.", prenom=".$prenom.",
              nom=".$nom.", date_naissance=".$birthDate.", taille=".$taille.", poids=".$poids.", taux_graisse=".$tauxGraisse.", 
              tour_epaules=".$tourEpaules.", tour_taille=".$tourTaille.", tour_biceps=".$tourBiceps." 
              where num=".$id;
    var_dump($request);
    $res=bdd_query($request);
   
?>
