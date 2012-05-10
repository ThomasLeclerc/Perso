<?php
    require_once 'bdd.php';
    bdd_connect();
    $action=$_GET["action"];
    $noCompet=$_GET["noCompet"];

    if($action=="1"){
        $noAthlete=$_POST["Athlete"];
        $noDiscipline=$_POST["Discipline"];
        $classement=$_POST["classement"];

        $req="insert into CLASSEMENT values (".$noAthlete.", ".$noCompet.", ".$noDiscipline." ,".$classement.")";
        $res = bdd_query($req);

    }

    else if($action=="2"){
        $noAthlete=$_GET["noAthlete"];
        $noDiscipline=$_GET["noDiscipline"];
        $classement=$_GET["classement"];
        $req = "delete from CLASSEMENT where noAthlete=".$noAthlete."
                and noCompet=".$noCompet."
                and noDiscipline=".$noDiscipline."
                and classement=".$classement;
        var_dump($req);
        $res = bdd_query($req);
    }

    else if($action=="3"){
        $noAthlete=$_POST["AthleteModif"];
        $noDiscipline=$_POST["DisciplineModif"];
        $classement=$_POST["classementModif"];

        $noAthleteOld=$_POST["AthleteModifOld"];
        $noDisciplineOld=$_POST["DisciplineModifOld"];
        $classementOld=$_POST["classementModifOld"];
        var_dump($noAthleteOld);
        var_dump($noDisciplineOld);
        var_dump($classementOld);
        $req = "update CLASSEMENT set noCompet='".$noCompet."', noAthlete='".$noAthlete."', noDiscipline='".$noDiscipline."', classement='".$classement."'
            where noCompet='".$noCompet."' and noAthlete='".$noAthleteOld."' and noDiscipline='".$noDisciplineOld."' and classement='".$classementOld."'";
        var_dump($req);
        $res = bdd_query($req);

    }
    print ("<script language = \"JavaScript\">");
    print ("location.href = 'Classement2.php?noCompet=".$noCompet."';");
    print ("</script>");

?>

