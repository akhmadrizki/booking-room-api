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
  <h1>Tambah Kategori</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form action="{{ route('add.room') }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Kategori</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="category">
                <div class="input-group-append">
                  <button class="btn btn-success" type="submit">Tambah</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection