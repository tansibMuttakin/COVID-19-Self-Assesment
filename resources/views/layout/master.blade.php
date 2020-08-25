<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layout.top_link')
    <title>COVID-19 Self-Assessment System</title>
</head>
<body>
    <div class="container">
        @yield('header')
        @yield('content')
    </div>
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
      <div class="container text-center">
        <small>Copyright &copy; COVID-19 Self-Assessment System</small>
        <br>
        <small>Stay Home Stay Safe</small>
      </div>
  </footer>
</body>
@include('layout.bottom_link')
</html>