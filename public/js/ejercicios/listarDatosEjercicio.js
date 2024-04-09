document.addEventListener('DOMContentLoaded', function() {
    // Configuración de AJAX para incluir el token CSRF en las cabeceras de las peticiones
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Tu código existente para inicializar la DataTable
    $(document).ready(function(){
        //var tablaEjercicio =
         $('#tabla-ejercicio').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: ejercicioIndexUrl,
            },
            columns: [
                { data: 'id' },
                { data: 'nombre' },
                { data: 'recomendacion' },
                { data: 'action', orderable: false },
            ]
        });
    });
});
