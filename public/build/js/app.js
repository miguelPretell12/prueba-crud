const boton = document.querySelector('#boton');
const formulario = document.querySelector('#formulario');
const email = document.querySelector('#email');
const password = document.querySelector('#password');

email.addEventListener('change',validarFormulario);
password.addEventListener('change',validarFormulario);

function validarFormulario(e){
     if(e.target.value.length < 3){
          swal({
               title: 'Completar el campo seleccionado',
               icon: 'error'
          });
          return;
     }
}
