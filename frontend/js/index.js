$('#formLogin').submit((e) => {
  e.preventDefault();
  const usuario = $.trim($('#usuario').val());
  const clave = $.trim($('#clave').val());
  if (usuario == "" || clave == "") {
    Swal.fire({
      icon: 'warning',
      title: 'Debe ingresar un usuario y/o clave.'
    });
    return false;
  } else {
    $.ajax({
      url: '../backend/base-de-datos/login.php',
      type: 'POST',
      datatype: 'json',
      data: {
        usuario: usuario,
        clave: clave
      },
      success: (data) => {
        if (data != 'null') {
          Swal.fire({
            icon: 'success',
            title: '¡Conexión exitosa!.',
            // confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ingresar'
          }).then((result) => {
            if (result.value) {
              window.location.href = './views/inicio-admin.php';
            }
          });
          ;
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Usuario y/o clave incorrecta.'
          });
        }
      }
    });
  }
});