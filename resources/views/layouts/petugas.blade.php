<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!-- font poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <!-- link css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <!-- Sidebar -->
    @include('includes.sidebar')

    <!-- overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Main -->
    <div class="main">
      <!-- Topbar -->
      @include('includes.topbar')

      <!-- Content -->
      @yield('content')
    </div>

    <!-- link js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- custom js -->
    <script src="{{ asset('js/script.js') }}"></script>
  </body>
</html>
