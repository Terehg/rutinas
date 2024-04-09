function editarEjercicio(id){
    $.get('/ejercicio/editar/'+id, function(ejercicio){
        $('#txtId2').val(ejercicio[0].id);
        $('#txtNombre2').val(ejercicio[0].nombre);
        $('#txtAreaRecomendacion2').val(ejercicio[0].recomendacion);

        $("input[name=_token]").val();
        $('#ejercicio_edit_modal').modal('toggle');
    })
}
