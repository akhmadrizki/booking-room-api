@extends('layouts.dashboard')

@section('additional-css')

<style>
  .hero {
    background-color: #032038 !important;
  }
</style>

@endsection

@section('content')

<div class="section-header">
  <h1>Dashboard</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12 mb-4">
      <div class="hero bg-primary text-white">
        <div class="hero-inner">
          <h2>Selamat Datang, Ujang!</h2>
          <p class="lead">
            Mie tek-tek kenangan Campur bayam dan kemangi <br>
            Yuk cek apakah ada Ruangan yang dipinjam hari ini
          </p>
          <div class="mt-4">
            <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-file-contract"></i>
              List Booked
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection