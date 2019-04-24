@extends('layout.admin')

@section('content')
  <div class="container-admin">
    <div class="row">
      <div class="col-12">
        <div class="admin-card">
          <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" placeholder="Nombre" name="name">
              <small id="emailHelp" class="form-text text-muted">Información solo para control interno.</small>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="picture" lang="es">
              <label class="custom-file-label" for="customFileLang">Seleccionar foto(312x312)</label>
            </div>
            <div class="form-group">
              <label for="position">Cargo</label>
              <input type="text" class="form-control" name="position" placeholder="Cargo">
            </div>
            
            <br />
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>   
        </div>    
      </div>
    </div>
  </div>
@endsection