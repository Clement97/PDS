
<script>
var cible=document.querySelector('select[size]');
var Parent=document.querySelector('form');
var Enfant=document.querySelector('input[value]');




			var div3=document.createElement('div');
				div3.classNameName='input';

				var label3=document.createElement('label');
					label3.htmlFor='login';
					label3.innerHTML='login';

				var input3=document.createElement('input');
					input3.type='text';
					input3.name='login';
					input3.id='login';
					input3.size='15';
					input3.required="required";




			var div1=document.createElement('div');
				div1.classNameName='input';

				var label1=document.createElement('label');
					label1.htmlFor='prenom';
					label1.innerHTML='Prenom';

				var input1=document.createElement('input');
					input1.type='text';
					input1.name='prenom';
					input1.id='prenom';
					input1.size='15';
					input1.required="required";
					input1.pattern="^[a-zA-Z]{3,25}$"

			var div2=document.createElement('div');
				div2.className='input';

				var label2=document.createElement('label');
					label2.htmlFor='nom';
					label2.innerHTML='Nom';

				var input2=document.createElement('input');
					input2.type='text';
					input2.name='nom';
					input2.id='nom';
					input2.size='15';
					input2.required="required";
					input2.pattern="^[a-zA-Z]{3,25}$"

				var br=document.createElement('br');	

				div1.appendChild(label1);
				div1.appendChild(br.cloneNode(false));
				div1.appendChild(input1);

				div2.appendChild(label2);
				div2.appendChild(br.cloneNode(false));
				div2.appendChild(input2);


				div3.appendChild(label3);
				div3.appendChild(br.cloneNode(false));
				div3.appendChild(input3);




cible.addEventListener("change",function(e){
	if(e.target.value=="Login"){
		if(div1.parentNode){
			Parent.removeChild(div1);
			Parent.removeChild(div2);
		}
		Parent.insertBefore(div3,Enfant);
	}else{
		if(e.target.value=="Nom et Prenom"){
			if(div3.parentNode){
				Parent.removeChild(div3);
			}
			Parent.insertBefore(div1,Enfant);
			Parent.insertBefore(div2,Enfant);

		}
		else{
			if(div1.parentNode){
				Parent.removeChild(div1);
				Parent.removeChild(div2);
			}
			if(div3.parentNode){
				Parent.removeChild(div3);
			}
		}
	}
},false);

</script>

