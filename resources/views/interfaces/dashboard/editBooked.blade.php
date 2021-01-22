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
  <h1>Update Status</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form action="{{ route('update.list', $peminjam->id) }}" method="POST">
          @csrf
          <div class="card-body">

            <div class="card profile-widget">
              <div class="profile-widget-header">
                <img alt="image" src="{{ asset('img/' . $peminjam->room->image_ruangan) }}"
                  class="profile-widget-picture">
                <div class="profile-widget-items">
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Tanggal Pinjam</div>
                    <div class="profile-widget-item-value">{{$peminjam->tgl_pinjam}}</div>
                  </div>
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Jam Peminjaman</div>
                    <div class="profile-widget-item-value">{{ $peminjam->jam_pinjam }}</div>
                  </div>
                </div>
              </div>
              <div class="profile-widget-description pb-0">
                <div class="profile-widget-name">{{$peminjam->user->name}} <div
                    class="text-muted d-inline font-weight-normal">
                    <div class="slash"></div> {{$peminjam->tujuan}}
                  </div>
                </div>
                <p>Barang yang ingin dipinjam: <b>{{ $peminjam->tambahan }}</b></p>
              </div>
            </div>

            <div class="form-group">
              <label>Status</label>
              <select name="status" id="status" class="custom-select">
                <option value="none" disabled selected>- Pilih Kategori -</option>
                <option value="{{$peminjam->status}}" @if($peminjam->status) selected @endif>{{$peminjam->status}}
                </option>
                @if (auth()->user()->role == 'admin')
                <option value="pending">pending</option>
                @endif

                @if (auth()->user()->role == 'master')
                <option value="disetujui">disetujui</option>
                @endif
              </select>
            </div>

          </div>
          <div class="card-footer text-left">
            <button class="button-add btn-lg btn-success">Update</button>
            <a href="{{ URL::previous() }}" class="button-add btn-lg btn-warning">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection