@extends('layout')
@section('content')

<!-- Tabs-->
      <div class="container">
        @extends('tabs')
        @yield('content')

         <!-- Contenido dentro de Pestañas -->
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="lista-ejercicio" role="tabpanel" aria-labelledby="lista-ejercicios-tab">
                <!-- TABLA CRUD EJERCICIO-->
                    <table id="tabla-ejercicio" class="table table-hover">
                        <thead>
                            <td>ID</td>
                            <td>Nombre de ejercicio</td>
                            <td>Recomendación</td>
                            <td>Acciones</td>
                        </thead>
                    </table>
            </div>

            <!--FORMULARIO NUEVO EJERCICIO-->
            <div class="tab-pane fade" id="nuevo-ejercicio" role="tabpanel" aria-labelledby="crear-ejercicio-tab">

              <br>
              <form id="crear-ejercicio">
                @csrf
                <div class="mb-3">
                  <label for="" class="form-label">Nombre de ejercicio:</label>
                  <input type="text" class="form-control" id="txtNombre" name="txtNombre" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Recomendación:</label>
                    <textarea class="form-control" id="txtAreaRecomendacion" name="txtAreaRecomendacion" rows="3"></textarea>
                  </div>
                <button type="submit" class="btn btn-primary">Crear</button>
              </form>
            </div>
            <!-- TABLA CRUD RUTINA-->
                <div class="tab-pane fade" id="lista-rutina" role="tabpanel" aria-labelledby="rutina-tab">
                    <table id="tabla-rutina-ejercicio" class="table table-hover">
                        <thead>
                            <td>ID</td>
                            <td>Día</td>
                            <td>Parte del cuerpo</td>
                            <td>Nombre de ejercicio</td>
                            <td>Recomendación</td>
                            <td>Peso</td>
                            <td>Repeticiones</td>
                           <!-- <td>Acciones</td>-->
                        </thead>
                    </table>
                </div>



          <!--MODAL BOOTSTRAP EDITAR-->

            <div class="modal fade" id="ejercicio_edit_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Ejercicio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                        <!--FORMULARIO DE EDITAR(REGISTRAR)-->
                        <form id="ejercicio-edit-form">
                            <div class="modal-body">
                                    @csrf
                                    <input type="hidden" id="txtId2" name="txtId2">
                                    <div class="mb-3">
                                            <label for="" class="form-label">Nombre de ejercicio:</label>
                                            <input type="text" class="form-control" id="txtNombre2" name="txtNombre2" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                            <label for="" class="form-label">Recomendación:</label>
                                            <textarea class="form-control" id="txtAreaRecomendacion2" name="txtAreaRecomendacion2" rows="3"></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                    </form>
                </div>
                </div>
            </div>
          <!--MODAL BOOTSTRAP ELIMINAR-->
                <div class="modal fade" id="confirmarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        ¿Desea eliminar el ejercicio de la lista?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" id="btnEliminar" name="btnEliminar" class="btn btn-danger">Eliminar </button>
                        </div>
                    </div>
                    </div>
                </div>
      </div>


      <!--Script de mostrar/listar datos de ejercicios-->
      <script>
        var ejercicioIndexUrl = "{{ route('ejercicio.index') }}";
        </script>
      <script src="{{ asset('js/ejercicios/listarDatosEjercicio.js') }}"></script>


      <!--Script de crear /insertar/registrar datos de ejercicios-->
      <script>
        var ejercicioCrearUrl = "{{ route('ejercicio.store') }}";
        </script>
      <script src="{{ asset('/js/ejercicios/crearEjercicio.js') }}"></script>

      <!--Script para eliminar-->
      <script src="{{ asset('/js/ejercicios/eliminarEjercicio.js') }}"></script>

      <!--Script para editar-->
      <script src="{{ asset('/js/ejercicios/editarEjercicio.js') }}"></script>

      <!--Script actualizar datos de ejercicios-->

      <script>
        var ejercicioActualizarUrl = "{{route('ejercicio.update')}}";
        </script>
      <script src="{{ asset('js/ejercicios/actualizarEjercicio.js') }}"></script>

      <!--RUTINAS-->
       <!--Script de mostrar/listar rutinas-->
       <script>
        var rutinaIndexUrl = "{{ route('rutina.index') }}";
        </script>
      <script src="{{ asset('js/rutina/listarDatosRutina.js') }}"></script>
@endsection
