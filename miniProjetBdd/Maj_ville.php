<?php
    require_once 'bdd.php';
    bdd_connect();
    $action=$_GET["action"];
    
    if($action=="1"){
        $nom=$_POST["nomVille"];
        $req="insert into VILLE values (null, '".$nom."')";
        $res = bdd_query($req);
    }

    else if($action=="2"){
        $id=$_GET["id"];
        $req = "delete from VILLE where noVille=".$id."";
        $res = bdd_query($req);
    }

    else if($action=="3"){
        $id=$_POST["no"];
        $nom=$_POST["nomVilleModif"];
        var_dump($id);
        var_dump($nom);
        $req = "update VILLE set nomVille='".$nom."' where noVille='".$id."'";
        $res = bdd_query($req);
    }
    print ("<script language = \"JavaScript\">");
    print ("location.href = 'Ville.php';");
    print ("</script>");

?>
