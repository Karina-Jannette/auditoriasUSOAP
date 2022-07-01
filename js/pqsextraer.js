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
                document.getElementById('area_afac').value=obj.data[Q].areas_afac;
                document.getElementById('elemento').value=obj.data[Q].elemento;
                document.getElementById('pregunta').value=obj.data[Q].pregunta;
                document.getElementById('orientacion').value=obj.data[Q].orientacion;
                document.getElementById('inciso').value=obj.data[Q].inciso;
                document.getElementById('documentos').value =obj.data[Q].documento;
  
              }
          }
      });
  }