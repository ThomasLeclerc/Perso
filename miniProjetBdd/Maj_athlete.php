<?php
    require_once 'bdd.php';
    bdd_connect();
    $action=$_GET["action"];

    if($action=="1"){
        $nomAthlete=$_POST["nomAthlete"];
        $nomClub=$_POST["nomClub"];

        $req1="Select noClub from CLUB where nomClub='".$nomClub."'";
        $res1=bdd_query($req1);
        $l=mysql_fetch_array($res1);
        $noClub=$l[0];

        $req2="insert into ATHLETE values (null, '".$nomAthlete."', ".$noClub.")";
        $res2 = bdd_query($req2);

        $req3="select noAthlete from ATHLETE where nomAthlete='".$nomAthlete."'";
        $res3=bdd_query($req3);
        $l=mysql_fetch_array($res3);
        foreach($_POST["discipline"] as $disc){
            $request="insert into ESTSPECIALISTE values(".$l[0].", ".$disc.")";
            $result=bdd_query($request);
        }
    }

    else if($action=="2"){
        $id=$_GET["id"];
        $req = "delete from ATHLETE where noAthlete=".$id;
        $res = bdd_query($req);
    }

    else if($action=="3"){
        $id=$_POST["no"];
        $nomAthlete=$_POST["nomAthleteModif"];
        $nomClub=$_POST["nomClubModif"];

        $req1="Select noClub from CLUB where nomClub='".$nomClub."'";
        $res1=bdd_query($req1);
        $l=mysql_fetch_array($res1);
        $noClub=$l[0];

        $req2 = "update ATHLETE set nomAthlete='".$nomAthlete."', noClub='".$noClub."' where noAthlete=".$id;
        $res2 = bdd_query($req2);
        
        $req3="delete from ESTSPECIALISTE where noAthlete=".$id;
        $res3=bdd_query($req3);
        foreach($_POST["discipline2"] as $disc){
            $req4="insert into ESTSPECIALISTE values(".$id.", ".$disc.")";
            $res4=bdd_query($req4);

        }
    }
    print ("<script language = \"JavaScript\">");
    print ("location.href = 'Athlete.php';");
    print ("</script>");

?>

