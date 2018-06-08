<!-- Stored in resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <!-- Material Icon CDN -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Materialize CSS CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <!-- custom styles -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ URL::asset('css/styleIndex.css') }}">
</head>
<body class="wf1">
    <div class="navbar-fixed">
        <nav class="wf2">
          <div class="nav-wrapper">
            <a href="#" class="brand-logo">LOGO</a>
            <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
            <li><a href="{{URL::to('/docent')}}">Docent</a></li>
            <li><a href="{{URL::to('/loguit')}}">Loguit</a></li>
            </ul>
            <ul class="side-nav" id="mobile-menu">
              <li><a href="{{URL::to('/docent')}}">Docent</a></li>
              <li><a href="{{URL::to('/loguit')}}">Loguit</a></li>
            </ul>
          </div>
        </nav>
      </div>
  <div class="container">
    @yield('content')
  </div>
  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <!-- Materialize JS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <!-- eigen js -->
  @yield('script')
</body>
</html>