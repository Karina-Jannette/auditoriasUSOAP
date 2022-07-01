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
        url: 'eliminararea_afac.php',
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
      var area=$(this).data('area');
      //alert(idEditar);
      
      //alert(areas);
      $("#area1").val(area);
      $("#idEdit2").val(idEditar);
      
  
  });
  
  });