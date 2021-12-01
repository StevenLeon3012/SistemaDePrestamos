@extends('layouts.app')
@section('content')
<!-- Modal -->
<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editar">EDITAR USUARIO</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre Completo</label>
              <input type="text" class="form-control" id="exampleInputEmail1"
              >

            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Numero Empleado</label>
              <input type="text" class="form-control" id="exampleInputEmail1"
              >

            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Rol</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>

            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Correo</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Telefono</label>
              <input type="text" class="form-control" id="exampleInputEmail1"
              >

            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Fecha Registro</label>
              <input type="date" class="form-control" id="exampleInputEmail1"
              >

            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
    </div>
@endsection
