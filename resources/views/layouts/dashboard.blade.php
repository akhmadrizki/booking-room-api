<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sibook &mdash; Dashboard</title>
  <link rel="icon" href="{{ asset('img/icon.png') }}">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('stisla/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('stisla/css/components.css')}}">

  <style>
    .navbar-bg {
      background-color: #032038 !important;
    }

    .footer-left a {
      color: #032038;
    }

    .footer-left a:hover {
      color: #1ecad3;
    }

    .button-beta {
      background-color: #1ecad3;
      border: none;
    }

    .button-beta:hover {
      background-color: #18bcc5 !important;
    }

    .sidebar-menu li.active a {
      color: #032038 !important;
    }

    .sidebar-menu li.active a::before {
      background-color: #032038 !important;
    }

    body.sidebar-mini .main-sidebar .sidebar-menu>li.active>a {
      background-color: #032038 !important;
      color: #fff !important;
    }
  </style>

  @yield('additional-css')

</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="{{ asset('stisla/img/avatar/avatar-3.png')}}" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display:none;">
                {{ csrf_field() }}
              </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/">Sibook</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">
              <img src="{{ asset('img/icon.png') }}" alt="primakara-logo" title="sibook">
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="{{ Request::route()->getName() == 'index.wellcome' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('index.wellcome')}}">
                <i class="fas fa-fire"></i>
                <span>Dashboard</span>
              </a>
            </li>

            <li class="{{Request::route()->getName() == 'index.room' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('index.room')}}">
                <i class="fas fa-list-ol"></i>
                <span>List Ruangan</span>
              </a>
            </li>

            <li class="{{Request::route()->getName() == 'index.list' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('index.list')}}">
                <i class="fas fa-file-contract"></i>
                <span>List Peminjaman</span>
              </a>
            </li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="button-beta btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Beta version
            </a>
          </div>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; {{ date('Y') }} <div class="bullet"></div> Primakara Booking Room | By <a href="#">Akhmad
            Rizki</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>

  @yield('modals')

  <!-- General JS Scripts -->
  <script src="{{ asset('stisla/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('stisla/modules/popper.js')}}"></script>
  <script src="{{ asset('stisla/modules/tooltip.js')}}"></script>
  <script src="{{ asset('stisla/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('stisla/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{ asset('stisla/modules/moment.min.js')}}"></script>
  <script src="{{ asset('stisla/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{ asset('stisla/js/scripts.js')}}"></script>
  <script src="{{ asset('stisla/js/custom.js')}}"></script>
</body>

</html>