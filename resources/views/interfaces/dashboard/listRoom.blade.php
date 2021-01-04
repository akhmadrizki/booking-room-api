@extends('layouts.dashboard')

@section('additional-css')
<style>
  .button-add {
    background-color: #1ecad3;
    border: none;
  }

  .button-add:hover {
    background-color: #18bcc5 !important;
  }
</style>
@endsection

@section('content')
<div class="section-header">
  <h1>List Ruangan</h1>
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
        <div class="card-header">
          <h4>Tambah Ruangan</h4>
          <a href="{{ route('add.room') }}" class="button-add btn btn-primary"><i class="fas fa-plus-circle"></i></a>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped table-md">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar Ruangan</th>
                  <th>Nama Ruangan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rooms as $room)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td><img src="{{ asset('img/' . $room->image_ruangan) }}" width="80"></td>
                  <td>{{ $room->nama_ruangan }}</td>
                  <td>
                    <a href="#" class="btn-sm btn-warning"><i class="far fa-edit"></i></a>
                    {{-- <a href="#" class="btn-sm btn-danger"><i class="far fa-trash-alt"></i></a> --}}
                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                      data-target="#delete-modal{{ $room->id }}"><i class="far fa-trash-alt"></i></button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        {{-- <div class="card-footer text-right">
          <nav class="d-inline-block">
            <ul class="pagination mb-0">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
              </li>
            </ul>
          </nav>
        </div> --}}
      </div>
    </div>
  </div>
</div>
@endsection

@section('modals')
@foreach($rooms as $room)
<div class="modal fade" id="delete-modal{{ $room->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Ruangan</h5>
      </div>
      <div class="modal-body">
        <div>Apakah Anda yakin ingin menghapus <span class="font-weight-bold">{{ $room->nama_ruangan }}</span>
          ini?
        </div>
      </div>
      <div class="modal-footer bg-whitesmoke">
        <button class="btn btn-light" data-dismiss="modal">Tidak</button>
        <form action="{{ route('delete.room', ['id' => $room->id]) }}" method="POST">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-danger">Ya, hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection