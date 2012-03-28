
function affiche_complet(){
    var elements=document.getElementById('tableau').getElementByClassName('identifiant');
    for(var i=0; i < elements.lenght; i++){
        elements[i].style.display="table-cell";
    }
}


function deroule(valeur, action)
    {
    switch (action){
    case 1:
        document.getElementById("form_ajout").style.height=valeur+"px";
        break;
    case 2:
        document.getElementById("form_ajout").style.height=valeur+"px";
        document.getElementById("nomVille").value="";
        break;
    }
}

function deroule2(valeur, action)
    {
    switch (action){
    case 1:
        document.getElementById("form_modif").style.height=valeur+"px";
        document.getElementById("form_modif").style.border="2px solid DimGrey";
        break;
    case 2:
        document.getElementById("form_modif").style.height=valeur+"px";
        document.getElementById("form_modif").style.border="0px";
        break;
    } 
}

function remplir_champ_modif(id, valeur){
    document.getElementById(id).value=valeur;
}

function select_checkbox(id){
    document.getElementById(id).checked=true;
}

function check_field(id){
    var nom=document.getElementById(id).value;
    if(nom==""){
        document.getElementById(id).style.backgroundColor = "#FE4949";
        document.getElementById("error_"+id).innerHTML="champ vide";
        return false;
    }
    else {
        field_ok(id);
        return true;
    }
}

function check_select(id){
    var valeur=document.getElementById(id).value;
    if(valeur==0){
        document.getElementById("error_"+id).innerHTML="non sélectionné";
        return false;
    }
    else {
        field_ok(id);
        return true;
    }
}

function field_ok(id) {
	document.getElementById(id).style.backgroundColor="#FEFEFE";
        document.getElementById("error_"+id).innerHTML="";
}

function check_two_fields(id1, id2){
    var nom1=document.getElementById(id1).value;
    var nom2=document.getElementById(id2).value;
    if(nom1==""){
        document.getElementById(id1).style.backgroundColor = "#FE4949";
        document.getElementById("error_"+id1).innerHTML="champ vide";
        return false;
    }
    else if(nom2==""){
        document.getElementById(id2).style.backgroundColor = "#FE4949";
        document.getElementById("error_"+id2).innerHTML="champ vide";
        return false;
    }
    else{
        field_ok(id1);
        field_ok(id2);
        return true;
    }
}

function check_tree_fields(id1, id2, id3){
    return (check_field(id1)&&check_field(id2)&&check_field(id3));
}

function redirection_classement(){
    var noCompet = document.getElementById("compet").value;
    document.location.href="Classement2.php?noCompet="+noCompet;
}

