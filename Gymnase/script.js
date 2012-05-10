function showHint(val){
         if (val==0){
                    document.getElementById("resultat").innerHTML="";
                    return;
         }
         xmlhttp=new XMLHttpRequest();
         xmlhttp.onreadystatechange=function(){
                    if (xmlhttp.readyState==4 && xmlhttp.status==200)
                             document.getElementById("resultat").innerHTML=
                             xmlhttp.responseText;
         }
         xmlhttp.open("GET","gethint.php?num="+val,true);
         xmlhttp.send();
}

function remplir_liste(){
	 xmlhttp=new XMLHttpRequest();
         xmlhttp.onreadystatechange=function(){
                    if (xmlhttp.readyState==4 && xmlhttp.status==200)
                             document.getElementById("abonne").innerHTML=
                             xmlhttp.responseText;
         }
         xmlhttp.open("GET","remplirListe.php",true);
         xmlhttp.send();
}

function form_modif(id){
         xmlhttp=new XMLHttpRequest();
         xmlhttp.onreadystatechange=function(){
                    if (xmlhttp.readyState==4 && xmlhttp.status==200)
                             document.getElementById("resultat").innerHTML=
                             xmlhttp.responseText;
         }
         xmlhttp.open("GET","formModif.php?id="+id,true);
         xmlhttp.send();
}

function sauvegarder(id){
    if(!confirm("confirmer la modification ?")){
        return;
    }
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
            document.getElementById("resultat").innerHTML=
            xmlhttp.responseText;
    }
    xmlhttp.open("POST","sauvegarder.php",true);
    xmlhttp.send();
}

