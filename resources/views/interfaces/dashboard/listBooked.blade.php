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
  <h1>List Ruangan yang Dipinjam</h1>
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
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped table-md">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Ruangan</th>
                  <th>Nama Peminjam</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Selesai</th>
                  <th>Keperluan</th>
                  <th>Atribut</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($peminjam as $pinjam)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$pinjam->room->nama_ruangan}}</td>
                  <td>{{$pinjam->user->name}}</td>
                  <td>{{$pinjam->tgl_pinjam}}</td>
                  <td>{{$pinjam->tgl_selesai}}</td>
                  <td>{{$pinjam->tujuan}}</td>
                  <td>{{$pinjam->tambahan}}</td>
                  <td>
                    <div class="badge badge-success">{{$pinjam->status}}</div>
                  </td>
                  <td>
                    <a href="{{ route('edit.list', $pinjam->id) }}" class="btn-sm btn-warning"><i
                        class="far fa-edit"></i></a>
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