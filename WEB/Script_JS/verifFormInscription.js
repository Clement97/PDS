
function surligne(event,erreur){
   if(erreur)
      event.target.style.border = "thin solid red"; 
   else
      event.target.style.border = "thin solid green"; 
  }



function verifNom(){
  var regex = /^[a-zA-Z]{3,25}$/ ;
  champNom.addEventListener("blur", function(event) {
      if (!regex.test(event.target.value)){
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
  var regex = /^[a-zA-Z]{3,25}$/ ;
  champPrenom.addEventListener("blur", function(event) {
      if (!regex.test(event.target.value)){
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
    if(event.target.value.length==0||event.target.value!=champMail.value){
        surligne(event, true);
        return false;
    }
    else{
        surligne(event, false);
        return true;
    }
  });
}


function verifPassword(){
  var regex = /(?=^.{8,}$)^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/
  champPassword.addEventListener("blur", function(event) {
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


var nomOK= verifNom();
var prenomOK= verifPrenom();
var telOK= verifTel();
var adresseOK= verifAdresse();
var mailOK= verifMail();
var confMailOK=verifConfMail();
var passwordOK=verifPassword();
var confPasswordOK =verifConfPassword();













