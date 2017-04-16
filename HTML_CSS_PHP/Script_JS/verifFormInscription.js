
function surligne(event,erreur){
   if(erreur)
      event.target.style.border = "thin solid red"; 
   else
      event.target.style.border = "thin solid green"; 
  }



// // function verifFormInscription(form){

// // }

function verifNom(){
  champNom.addEventListener("blur", function(event) {
      if (event.target.value.length<3 || event.target.value.length>25){
        surligne(event,true);
        return false;   
      }
      else{
        surligne(event,false);
        return true;
      }
  });
}


function verifPrenom(){
  champPrenom.addEventListener("blur", function(event) {
      if (event.target.value.length<3 || event.target.value.length>25){
        surligne(event,true);
        return false;   
      }
      else{
        surligne(event,false);
        return true;
      }
  });
}

function verifTel(){
  var regex = /^0[67]+[0-9]{8}$/ ;
  champTel.addEventListener("blur", function(event) {
    if(!regex.test(event.target.value) || event.target.length==0){
        surligne(event,true);
        return false;   
      }
      else{
        surligne(event,false);
        return true;
      }
  });
}

function verifAdresse(){
  var regex = /^[0-9]{1,3}[a-zA-Z\ ]{7,}$/ ;
  champAdresse.addEventListener("blur", function(event){
    if(!regex.test(event.target.value)){
        surligne(event, true);
        return false;
    }
    else{
        surligne(event, false);
        return true;
    }
  });
}

function verifMail(){
  var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
  champMail.addEventListener("blur", function(event) {
    if(!regex.test(event.target.value)){
        surligne(event, true);
        return false;
    }
    else{
        surligne(event, false);
        return true;
    }
  });
}

function verifConfMail(){
  champConfMail.addEventListener("blur", function(event) {
    if(event.target.value!=champMail.value){
        surligne(event, true);
        return false;
    }
    else{
        surligne(event, false);
        return true;
    }
  });
}



function estLettreMinuscule(c){
  var code =String.charCodeAt(c);
  if(code>96 && code<123){
    return true;
  }
  return false;
}

function estLettreMajuscule(c){
  var code =String.charCodeAt(c);
  if(code>64 && code<91){
    return true;
  }
  return false;
}

function estChiffre(c){
  var code =String.charCodeAt(c);
  if(code>47 && code<58){
    return true;
  }
  return false;
}

function estCarSpe(c){
  return !(estChiffre(c)||estLettreMajuscule(c)||estLettreMinuscule(c));
}

function contientChiffre(s){
  for(var i =0; i<s.length;i++){
    if(estChiffre(s.charAt(i))) return true;
  }
  return false;
}

function contientMin(s){
    for(var i =0; i<s.length;i++){
      if(estLettreMinuscule(s.charAt(i))) return true;
    }
    return false;
}

function contientMaj(s){
  for(var i =0; i<s.length;i++){
    if(estLettreMajuscule(s.charAt(i))) return true;
  }
  return false;
}

function contientCarSpe(s){
  for(var i =0; i<s.length;i++){
    if(estCarSpe(s.charAt(i))) return true;
  }
  return false;
}

function tailleMin(s){
  return (s.length>7);
}

function verifPassword(){
  champPassword.addEventListener("blur", function(event) {
    var chaine=event.target.value;
    if(!(contientMaj(chaine)&&contientMin(chaine)&&contientChiffre(chaine)&&contientCarSpe(chaine)&&tailleMin(chaine))){
        surligne(event, true);
        return false;
    }
    else{
        surligne(event, false);
        return true;
    }
  });
// modificer cette merde et faire une bonne expression rég
}

function verifConfPassword(){
  champConfPassword.addEventListener("blur", function(event) {
    if(event.target.value!=champPassword.value){
        surligne(event,true);
        return false;
    }
    else{
        surligne(event,false);
        return true;
    }
  });
} 





    var champNom = document.getElementById('nom');
    var champPrenom =document.getElementById('prenom');
    var champTel=document.getElementById('tel');
    var champAdresse=document.getElementById('adresse');
    var champMail = document.getElementById('mail'); 
    var champConfMail=document.getElementById('confmail');
    var champPassword=document.getElementById('mdp');
    var champConfPassword=document.getElementById('confmdp');


    verifNom();
    verifPrenom();
    verifTel();
    verifAdresse();
    verifMail();
    verifConfMail();
    verifPassword();
    verifConfPassword();










