<?php

require_once("bdd.php");

function print_header($title,$js="") {
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\n";
        echo "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\n";
        echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"fr\" >\n";
        echo "<head>";
        echo "    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
        echo "    <title>".$title."</title>";
        echo "    <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"iconeweb.ico\" />\n";
        echo "    <meta http-equiv=\"Content-Style-Type\" content=\"text/css\" />\n";
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />\n";
        //if($js!=""){
            echo "    <script type=\"text/javascript\" LANGUAGE=\"JavaScript\" SRC=\"".$js."\"></SCRIPT> \n";
        //}
        echo "</head><body>\n\n";
}

?>
