function vDatosIncompletosInicio(){
    var email=document.getElementById("iEmail").value;
    var pass=document.getElementById("iPass").value;

    if(email=="" || pass==""){
        Swal.fire({
            template: '#AlertDatosIncompletos'
          })
        /*Swal.fire({
            title:"¡Alto!",
            text:"por favor llena todos los datos"
        })*/
    }
    
}

function vDatosIncompletosRegistro(){
    var email=document.getElementById("email").value;
    var nombre=document.getElementById("nombre").value;
    var user=document.getElementById("user").value;
    var fechaNacimiento=document.getElementById("fechaNacimiento").value;
    var pass=document.getElementById("pass").value;
    var confirmPass=document.getElementById("confirmPass").value;

    if(email=="" || nombre=="" || user=="" || fechaNacimiento=="" || pass=="" || confirmPass==""){
        Swal.fire({
            template: '#AlertDatosIncompletos'
          })
        /*Swal.fire({
            title:"¡Alto!",
            text:"por favor llena todos los datos"
        })*/
    }
    
}

function vUser(){
    var user=document.getElementById("user").value;
    var txUser=document.getElementById("txUser");
    
    if(user.length <= 2){
        /*modals.push({title: 't1', text: 'text1', toast:true})*/
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'error',
            title: 'El nombre de usuario debe tener minimo 3 caracteres'
          })
        txUser.innerHTML="Usuario no valido";
        txUser.style.color="#ff0000";
    } else {
        txUser.innerHTML="";
        txUser.style.color="#00ff00";
    }

    if(user==""){
        Swal.fire({
            template: '#AlertDatosIncompletos'
          })
        txUser.innerHTML="";
        txUser.style.color="#00ff00";
    }
}

function vPass(){
    var pass=document.getElementById("pass").value;
    var txPass=document.getElementById("txPass");

    var pattern=/^(?=.*[0-9])(?=.*[¡”#$%&;/=’?¡¿:;,.-_+*{}])[a-zA-Z0-9¡”#$%&;/=’?¡¿:;,.-_+*{}]{8,}$/;

    if(pass.match(pattern)){
        txPass.innerHTML="";
        txPass.style.color="#00ff00";
    } else {
        /*modals.push({title: 't2', text: 'text2', toast:true})*/
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'error',
            title: 'Tu contraseña debe tener al menos 8 caracteres, una mayúscula, un número y un carácter especial'
          })
        txPass.innerHTML="Contraseña no valida";
        txPass.style.color="#ff0000";
    }

    if(pass==""){
        Swal.fire({
            template: '#AlertDatosIncompletos'
          })
        txPass.innerHTML="";
        txPass.style.color="#00ff00";
    }
}

function vconfirmPass(){
    var pass=document.getElementById("pass");
    var confirmPass=document.getElementById("confirmPass");
    var txPass=document.getElementById("txPass");

    if(pass.value!=confirmPass.value){
        txPass.innerHTML="La contraseña debe ser igual"
        txPass.style.color="#ff0000";

    } else{
        txPass.innerHTML="";
        txPass.style.color="#00ff00";
    }

    if(confirmPass==""){
        Swal.fire({
            template: '#AlertDatosIncompletos'
          })
        txPass.innerHTML="";
        txPass.style.color="#00ff00";
    }

}

function fechaActual(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('.Fecha').attr('max', maxDate);
};

function validacionInicio(){
    vDatosIncompletosInicio();
}

function validacionRegistro(){

    vUser();
    vPass();
    vconfirmPass()
    vDatosIncompletosRegistro()
}