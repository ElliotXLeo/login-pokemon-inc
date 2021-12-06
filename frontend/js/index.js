'use strict';
const documentoListo = () => {
  const endpoint = '../backend/models/Login.php';
  const loginForm = document.querySelector('#loginForm');

  const consultarApi = async (e) => {
    e.preventDefault();
    const completeLoginForm = document.querySelector('#loginForm');
    const usuario = document.querySelector('#usuario').value;
    const clave = document.querySelector('#clave').value;
    const data = new FormData(completeLoginForm);
    // console.log(data.get('usuario'));
    // console.log(data.get('clave'));
    if (usuario === '' || clave === '') {
      Swal.fire({
        icon: 'warning',
        title: 'Formulario incompleto',
        text: 'Todos los campos son obligatorios'
      });
    } else {
      const response = await axios({
        method: 'POST',
        url: endpoint,
        data: data
      });
      const respuesta = document.getElementById('respuesta');
      if (response.data) {
        const { id, usuario, descripcion } = response.data[0];
        respuesta.innerHTML = `
          <div class="alert alert-primary my-2" role="alert">
            Bienvenido ${usuario}. Id: ${id}. Rol: ${descripcion}.
          </div>
        `
        Swal.fire({
          icon: 'success',
          title: '¡Conexión exitosa!',
          confirmButtonText: 'Ingresar'
        }).then((result) => {
          if (result.value) {
            window.location.href = './views/index-admin.php';
          }
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: '¡Usuario y/o clave incorrecta!'
        });
        respuesta.innerHTML = `
          <div class="alert alert-danger my-2" role="alert">
            ¡Usuario y/o clave incorrecta!
          </div>
        `
      }
    }
  };
  loginForm.addEventListener('submit', consultarApi);
};

document.addEventListener('DOMContentLoaded', documentoListo);