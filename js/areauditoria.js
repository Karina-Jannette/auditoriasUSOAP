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
        url: 'eliminararea.php',
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
      var areas=$(this).data('areas');
      //alert(idEditar);
      
  
      //alert(areas);
      $("#areas1").val(areas);
      $("#idEdit").val(idEditar);
      
  
  });
  
  });