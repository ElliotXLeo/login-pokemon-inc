$('#formLogin').submit((e) => {
  e.preventDefault();
  const usuario = $.trim($('#usuario').val());
  const clave = $.trim($('#clave').val());
  if (usuario == "" || clave == "") {
    Swal.fire({
      icon: 'warning',
      title: 'Debe ingresar su usuario y/o clave.'
    });
    return false;
  }
});