document.addEventListener('DOMContentLoaded', function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).ready(function(){

         $('#tabla-rutina-ejercicio').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: rutinaIndexUrl,
            },
            columns: [
                { data: 'id' },
                { data: 'nombre_dia' },
                { data: 'nombre_parte_cuerpo' },
                { data: 'nombre_ejercicio' },
                { data: 'recomendacion' },
                { data: 'peso' },
                { data: 'repeticiones' },
              //  { data: 'action', orderable: false },
            ]
        });
    });
});
