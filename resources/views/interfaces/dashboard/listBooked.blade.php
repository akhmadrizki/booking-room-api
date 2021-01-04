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
      <div class="card">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped table-md">
              <tbody>
                <tr>
                  <th>No</th>
                  <th>Nama Ruangan</th>
                  <th>Nama Peminjam</th>
                  <th>Tanggal Pinjam</th>
                  <th>Jam Pinjam</th>
                  <th>Keperluan</th>
                  <th>Atribut</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td>3A</td>
                  <td>Yoga</td>
                  <td>2017-01-09</td>
                  <td>09:11</td>
                  <td>Rapat UKM</td>
                  <td>Mic, Kursi, Projector</td>
                  <td>
                    <div class="badge badge-success">Active</div>
                  </td>
                  <td>
                    <a href="#" class="btn-sm btn-warning"><i class="far fa-edit"></i></a>
                    <a href="#" class="btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer text-right">
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
        </div>
      </div>
    </div>
  </div>
</div>
@endsection