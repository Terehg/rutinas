document.addEventListener('DOMContentLoaded', function() {
    // Configuración de AJAX para incluir el token CSRF en las cabeceras de las peticiones
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#crear-ejercicio').submit(function(e){
        e.preventDefault();
        //Recupear valores
        var nombre= $('#txtNombre').val();
        var recomendacion= $('#txtAreaRecomendacion').val();
        var _token= $("input[name=_token]").val();

        //Enviar con AJAX
        $.ajax({
            url: ejercicioCrearUrl,
            type: "POST",
            data:{
                nombre:nombre,
                recomendacion:recomendacion,
                _token: _token
            },
            success:function(response){
                if(response){
                    $('#crear-ejercicio')[0].reset();
                    toastr.success('Ejercicio creado con éxito','Nuevo registro',{timeOut:2000});
                    $('#tabla-ejercicio').DataTable().ajax.reload();
                }

            }
        })
    });
});
