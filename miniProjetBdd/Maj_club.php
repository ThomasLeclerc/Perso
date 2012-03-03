<?php
    require_once 'bdd.php';
    bdd_connect();
    $action=$_GET["action"];

    if($action=="1"){
        $nomClub=$_POST["nomClub"];
        $nomVille=$_POST["nomVille"];

        $req1="Select noVille from VILLE where nomVille='".$nomVille."'";
        $res1=bdd_query($req1);
        $l=mysql_fetch_array($res1);
        $noVille=$l[0];

        $req2="insert into CLUB values (null, '".$nomClub."', ".$noVille.")";
        $res2 = bdd_query($req2);
    }

    else if($action=="2"){
        $id=$_GET["id"];
        $req = "delete from CLUB where noClub=".$id;
        $res = bdd_query($req);
    }

    else if($action=="3"){
        $id=$_POST["no"];
        $nomClub=$_POST["nomClubModif"];
        $nomVille=$_POST["nomVilleModif"];

        $req1="Select noVille from VILLE where nomVille='".$nomVille."'";
        $res1=bdd_query($req1);
        $l=mysql_fetch_array($res1);
        $noVille=$l[0];

        $req2 = "update CLUB set nomClub='".$nomCLub."', noVille=".$noVille." where noClub=".$id;
        $res2 = bdd_query($req);
    }
    print ("<script language = \"JavaScript\">");
    print ("location.href = 'Club.php';");
    print ("</script>");

?>
<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
