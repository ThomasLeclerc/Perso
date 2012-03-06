<?php
    require_once 'bdd.php';
    bdd_connect();
    $action=$_GET["action"];

    if($action=="1"){
        $nom=$_POST["libelleDiscipline"];
        $req="insert into DISCIPLINE values (null, '".$nom."')";
        $res = bdd_query($req);
    }

    else if($action=="2"){
        $id=$_GET["id"];
        $req = "delete from DISCIPLINE where noDiscipline=".$id."";
        $res = bdd_query($req);
    }

    else if($action=="3"){
        $id=$_POST["no"];
        $nom=$_POST["libelleDisciplineModif"];
        var_dump($id);
        var_dump($nom);
        $req = "update DISCIPLINE set libelleDiscipline='".$nom."' where noDiscipline='".$id."'";
        $res = bdd_query($req);
    }
    print ("<script language = \"JavaScript\">");
    print ("location.href = 'Discipline.php';");
    print ("</script>");

?>
