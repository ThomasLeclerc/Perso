<?php
global $BDD;
global $login;
global $droit;
global $bdd;
define("HOST","localhost");
define("BASE","AJAX");
define("USER","root");
define("PASS","stairway22");

function bdd_connect() {
    global $BDD;
    $BDD = mysql_connect(HOST,USER,PASS) or die("Impossible de contacter la base de donnees...");
    mysql_select_db(BASE,$BDD) or die("Base de donnees introuvable...");
}

function bdd_query($query) {
    $resultat = mysql_query($query) or die("La requete demandee n'a pu aboutir... <a href=index.php>Recommencez</a>");
    return $resultat;
}

function bdd_pdo_connect(){
    global $bdd;
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host='.HOST.';dbname='.BASE.'', USER, PASS, $pdo_options);
    return $bdd;
}
?>
