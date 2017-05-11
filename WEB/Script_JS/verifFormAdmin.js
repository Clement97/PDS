
function surligne(event,erreur){
   if(erreur)
      event.target.style.border = "thin solid red"; 
   else
      event.target.style.border = "thin solid green"; 
  }





function verifLogin(){
  var regex = /^[a-zA-Z0-9]{3,25}$/ ;
  champLogin.addEventListener("blur", function(event) {
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

function verifNom(){
  var regex = /^[a-zA-Z]{3,25}|| $/ ;
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
  var regex = /^[a-zA-Z]{3,25}|| $/ ;
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



	var champLogin = document.getElementById('login');
    var champNom = document.getElementById('nom');
    var champPrenom =document.getElementById('prenom');
    var champPassword=document.getElementById('password');
    var champConfPassword=document.getElementById('confPassword');



	var loginOK= verifLogin();
	var nomOK= verifNom();
	var prenomOK= verifPrenom();
	var passwordOK=verifPassword();
	var confPasswordOK =verifConfPassword();












