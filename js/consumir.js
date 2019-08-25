/*Aqui lo pporcesa y lo manda a functions/recibe.php*/
function recibir(tipo){
  var txtTarjeta = $("#txtTarjeta").val();
  var txtCVV = $("#txtCVV").val();
  var txtmonto = $("#txtmonto").val();

  if (txtTarjeta!='' && txtCVV!='' && txtmonto!='') {
    

     var url = "functions/recibe.php";
     var datos = {"txtTarjeta":txtTarjeta, "txtCVV":txtCVV, "txtmonto":txtmonto, "tipo":tipo};
          $.ajax({                        
             type: "POST",                 
             url: url,                     
             data: datos, 
             success: function(data)             
             {
               alert(data); 
             }
         });
    }else{
    alert("Algunos datos de tu tarjeta no fueron ingresados correctamente!, intentalo de nuevo.");
  }

  }