<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    {{-- PHP --}}
    @php $anggota = Auth::user(); @endphp

    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg bg-body-light shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand" href="#">Book Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Daftar Buku</a>
            </li>

            @if ($anggota)
                <li class="nav-item">
                    <form action="{{ route('anggota.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </li>
            @else
                <div class="d-flex align-items-center gap-2 md:ms-3">
                    <li class="nav-item">
                        <a class="btn btn-outline-primary" href="{{ route('anggota.login') }}">Login</a>
                    </li>
                    <li>
                        <a class="btn btn-primary" href="{{ route('anggota.register') }}">Register</a>
                    </li>
                </div>
            @endif
        </ul>
        </div>
    </div>
    </nav>

    {{-- content --}}
    <div class="container my-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>