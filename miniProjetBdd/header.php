<?php
function print_header($title,$css="",$js="") {
    echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\n";
    echo "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\n";
    echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"fr\" >\n";
    echo "<head>";
    echo "    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
    echo "    <title>".$title."</title>";
    echo "    <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"iconeweb.ico\" />\n";
    echo "    <meta http-equiv=\"Content-Style-Type\" content=\"text/css\" />\n";
    if($css!="") {
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"".$css."\" />\n";
    }
    if($js!=""){
        echo "    <script type=\"text/javascript\" LANGUAGE=\"JavaScript\" SRC=\"".$js."\"></SCRIPT> \n";
    }

    echo "</head><body>\n\n";
    print("<br/>\n");
    echo"<div id=\"menu\">\n
    <ul>\n
    <li><a href=\"index.php\">ACCUEIL</a></li>\n
    <li><a href=\"Ville.php\">VILLE</a></li>\n
    <li><a href=\"Club.php\">CLUB</a></li>\n
    <li><a href=\"Athlete.php\">ATHLETE</a></li>\n
    <li><a href=\"Discipline.php\">DISCIPLINE</a></li>\n
    <li><a href=\"Competition.php\">COMPETITION</a></li>\n
    <li><a href=\"Classement.php\">CLASSEMENTS</a></li>\n
    </ul>\n
    </div>\n";
}
?>
