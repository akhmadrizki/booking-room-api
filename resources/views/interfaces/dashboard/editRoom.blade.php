@extends('layouts.dashboard')

@section('additional-css')
<style>
  .button-add {
    border: none;
    cursor: pointer;
  }

  .section-color::before {
    background-color: #032038 !important;
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
        <form action="{{ route('update.room', $rooms->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Gambar Ruangan <span style="color: #ffcc00">( Max 5 MB | JPEG, JPG, PNG )</span></label>
              <input type="file" name="image_ruangan" class="form-control">
            </div>
            <div class="form-group">
              <label>Nama Ruangan *</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-door-closed"></i>
                  </div>
                </div>
                <input type="text" class="form-control" name="nama_ruangan" value="{{ $rooms->nama_ruangan }}" required>
              </div>
            </div>

            <div class="form-group">
              <label>Kategori</label>
              <select name="category_id" id="category_id" class="custom-select">
                <option value="none" disabled selected>- Pilih Kategori -</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" @if($category->category) selected @endif>{{$category->category}}
                </option>
                @endforeach
              </select>
            </div>

            <div class="section-title mt-0 section-color">Detail Ruangan</div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Kapasitas Ruangan</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-users"></i>
                    </div>
                  </div>
                  <input type="number" class="form-control" name="kapasitas_ruangan"
                    value="{{ $rooms->kapasitas_ruangan }}">
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Proyektor</label>
                <input type="number" class="form-control" name="proyektor" value="{{ $rooms->proyektor }}"
                  placeholder="masukkan jumlah">
              </div>
              <div class="form-group col-md-4">
                <label>Panggung</label>
                <input type="number" class="form-control" name="panggung" value="{{ $rooms->panggung }}"
                  placeholder="masukkan jumlah">
              </div>
            </div>

          </div>
          <div class="card-footer text-left">
            <button class="button-add btn-lg btn-success">Update</button>
            <a href="{{ route('index.room') }}" class="button-add btn-lg btn-warning">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection