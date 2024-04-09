$('#ejercicio-edit-form').submit(function(e){
    e.preventDefault();
    //Recuperar valores
    var id2= $('#txtId2').val();
    var nombre2= $('#txtNombre2').val();
    var recomendacion2= $('#txtAreaRecomendacion2').val();
    var _token2= $("input[name=_token]").val();

        $.ajax({
            //ruta desde web routes
            url:ejercicioActualizarUrl,
            type: "POST",
            data:{
                id:id2,
                nombre:nombre2,
                recomendacion:recomendacion2,
                _token: _token2
            },
            success:function(response){
                if(response){
                    $('#ejercicio_edit_modal').modal('hide');
                    toastr.info(nombre2+' ha sido actualizado','Actualizar registro', {timeOut:3000});
                    $('#tabla-ejercicio').DataTable().ajax.reload();
                }
            }
        })
 })
