
            var ejercicioId;
            $(document).on('click','.delete',function(){
                ejercicioId = $(this).attr('id');
                $('#confirmarModal').modal('show');
            });
            $('#btnEliminar').click(function(){
                $.ajax({
                    url:"/ejercicio/eliminar/"+ejercicioId,
                    beforeSend: function(){
                        $('#btnEliminar').text('Eliminando ejercicio...');
                    },
                    success:function(data){
                        setTimeout(function() {
                            $('#confirmarModal').modal('hide');
                            toastr.warning('Ejercicio eliminado','Eliminar registro',{timeOut:3000});
                            $('#tabla-ejercicio').DataTable().ajax.reload();

                        },2000);
                        $('#btnEliminar').text('Eliminar');
                    }

                });
            })
