function multiselect(){ //Función para la selección multiple en la parte de rol y áreas
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
      theme: "classic" //pone el tema un poco mas moderno
    });
  });
}

function guardar(){
  var formdata = {
    
  };

  if($('#form_usuarios').find('#rol').val().join()!=='') formdata.id_rol= $('#form_usuarios').find('#rol').val().join();
  if($('#form_usuarios').find('#num_empleado').val()!=='') formdata.num_empleado = $('#form_usuarios').find('#num_empleado').val();
  if($('#form_usuarios').find('#id_area').val().join()!=='') formdata.id_area = $('#form_usuarios').find('#id_area').val().join();
  if($('#form_usuarios').find('#nombre').val()!=='')  formdata.nombre = $('#form_usuarios').find('#nombre').val();
  if($('#form_usuarios').find('#apellido').val()!=='')  formdata.apellido = $('#form_usuarios').find('#apellido').val();
  if($('#form_usuarios').find('#pass').val()!=='') formdata.pass = $('#form_usuarios').find('#pass').val();

  console.log(formdata);

  $.ajax({
    url: 'insertarusuario.php',
    method: 'POST',
    data: formdata
  }).done(function(res){
    console.log(res)
    alert(res.msj);
    $(fila).fadeIn(400);
  });
  //alert('Se ha dado clic');
}

$(document).ready(function(){
    var idEliminar= -1;
    var idEditar= -1;
    var fila;
    $(".btnEliminar").click(function(){
      idEliminar=$(this).data('id');
      fila=$(this).parent('td').parent('tr');
    });
    $(".eliminar").click(function(){
      $.ajax({
        url: 'eliminarusuario.php',
        method: 'POST',
        data:{
          id:idEliminar
        }
      }).done(function(res){
        alert(res);
        $(fila).fadeOut(1000);
      });
    });

    $(".btnEditar").click(function(){
  
      idEditar=$(this).data('id');
      var id_rol=$(this).data('id_rol');
      var num_empleado=$(this).data('num_empleado');
      var id_area=$(this).data('id_area');
      var nombre=$(this).data('nombre');
      var apellido=$(this).data('apellido');
      //var contraseña=$(this).data('contraseña');
  
      // alert(orientacion);  
      $("#id_rol1").val(id_rol);
      $("#num_empleado1").val(num_empleado);
      $("#id_area1").val(id_area);
      $("#nombre1").val(nombre);
      $("#apellido1").val(apellido);
      //$("#contraseña1").val(contraseña);
      $("#idEdit").val(idEditar);
      // alert(idEditar);
  
  });
  
  });