<?php
    require_once 'bdd.php';
    bdd_connect();
    $action=$_GET["action"];

    if($action=="1"){
        $nomCompetition=$_POST["nomCompetition"];
        $date=$_POST["date"];
        $nomClub=$_POST["nomClub"];

        $req1="Select noClub from CLUB where nomClub='".$nomClub."'";
        $res1=bdd_query($req1);
        $l=mysql_fetch_array($res1);
        $noClub=$l[0];

        $req2="insert into COMPETITION values (null, '".$nomCompetition."', '".$date."' ,".$noClub.")";
        $res2 = bdd_query($req2);

    }

    else if($action=="2"){
        $id=$_GET["id"];
        $req = "delete from COMPETITION where noCompet=".$id;
        $res = bdd_query($req);
    }

    else if($action=="3"){
        $id=$_POST["no"];
        $nomCompetition=$_POST["nomCompetitionModif"];
        $dateModif=$_POST["dateModif"];
        $nomClub=$_POST["nomClubModif"];
        var_dump($id);
        var_dump($nomCompetition);
        var_dump($dateModif);
        
        $req1="Select noClub from CLUB where nomClub='".$nomClub."'";
        $res1=bdd_query($req1);
        $l=mysql_fetch_array($res1);
        $noClub=$l[0];
        var_dump($noClub);
        $req2 = "update COMPETITION set nomCompet='".$nomCompetition."', dateCompet='".$dateModif."', noClub='".$noClub."' where noCompet='".$id."'";
        $res2 = bdd_query($req2);

    }
    print ("<script language = \"JavaScript\">");
    print ("location.href = 'Competition.php';");
    print ("</script>");

?>

