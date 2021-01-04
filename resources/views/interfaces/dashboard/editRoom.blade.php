@extends('layouts.dashboard')

@section('additional-css')
<style>
  .button-add {
    border: none;
    cursor: pointer;
  }
</style>
@endsection

@section('content')
<div class="section-header">
  <h1>Edit Ruangan</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form action="#" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label>Gambar Ruangan <span style="color: #ffcc00">( Max 5 MB | JPEG, JPG, PNG )</span></label>
              <input type="file" class="form-control">
            </div>
            <div class="form-group">
              <label>Nama Ruangan</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-door-closed"></i>
                  </div>
                </div>
                <input type="text" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="card-footer text-left">
            <button class="button-add btn-lg btn-success">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection