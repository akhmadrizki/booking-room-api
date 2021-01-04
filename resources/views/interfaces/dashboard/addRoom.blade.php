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
  <h1>Tambah Ruangan</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form action="{{ route('add.room') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Gambar Ruangan <span style="color: #ffcc00">( Max 5 MB | JPEG, JPG, PNG )</span></label>
              <input type="file" name="image_ruangan" class="form-control">
            </div>
            <div class="form-group">
              <label>Nama Ruangan</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-door-closed"></i>
                  </div>
                </div>
                <input type="text" class="form-control" name="nama_ruangan" required>
              </div>
            </div>
          </div>
          <div class="card-footer text-left">
            <button class="button-add btn-lg btn-success">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection