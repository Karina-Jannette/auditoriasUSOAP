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
        url: 'eliminarpq.php',
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
      var id_pq=$(this).data('id_pq');
      var num_pq=$(this).data('num_pq');
      var area=$(this).data('area');
      var elemento=$(this).data('elemento');
      var pregunta=$(this).data('pregunta');
      var orientacion=$(this).data('orientacion');
      var documentos=$(this).data('documentos');
  
      // alert(orientacion);
  
  
      $("#id_pq1").val(id_pq);
      $("#num_pq1").val(num_pq);
      $("#area1").val(area);
      $("#elemento1").val(elemento);
      $("#pregunta1").val(pregunta);
      $("#orientacion1").val(orientacion);
      $("#documentos1").val(documentos);
      $("#idEdit").val(idEditar);
      // alert(idEditar);
  
  
  
  });
  
  });
  
  
  function pqsllenado(){
    //alert("entra pqs");
    let numeropq= document.getElementById('num_pq').value;
  //alert(area);
  
  
  $.ajax({
          url: 'consultpqs.php',
          type: 'POST'
      }).done(function(respuesta) {
          obj = JSON.parse(respuesta);
          let res = obj.data;
          let x = 0;
          for (Q = 0; Q < res.length; Q++) { 
              if (obj.data[Q].id_pregunta == numeropq){
                //area=obj.data[Q].areas;
                document.getElementById('area').value=obj.data[Q].areas;
                document.getElementById('elemento').value=obj.data[Q].elemento;
                document.getElementById('pregunta').value=obj.data[Q].pregunta;
                document.getElementById('orientacion').value=obj.data[Q].orientacion;
                document.getElementById('inciso').value=obj.data[Q].inciso;
                document.getElementById('documentos').value =obj.data[Q].documento;
  
              }
          }
      });
  }