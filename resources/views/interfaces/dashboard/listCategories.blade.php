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
      @if(session('success'))
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          {{session('success')}}
        </div>
      </div>
      @endif
      <div class="card">
        <form action="{{ route('add.category') }}" method="POST">
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

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped table-md">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $category->category }}</td>
                  <td>
                    <a href="#" class="btn-sm btn-warning"><i class="far fa-edit"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection