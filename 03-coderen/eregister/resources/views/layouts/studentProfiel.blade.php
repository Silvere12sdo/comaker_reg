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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- custom styles -->
  <link rel="stylesheet" href="{{ URL::asset('css/styleIndex.css') }}">
</head>
<body class="#000">
    <div class="navbar-fixed">
        <nav class="wf2">
          <div class="nav-wrapper">
            <a href="#" class="brand-logo center">
              <div class="imagepadding">
              <img src="../img/logo.png" alt="E-register logo" width="35%" height="35%">
            </a>
            <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{URL::to('/student')}}">Home</a></li>
                <li><a href="{{URL::to('/student/overzicht')}}">Overzicht</a></li>
                <li><a href="{{URL::to('/student/profiel')}}">Profiel</a></li>
                <li><a href="{{URL::to('/loguit')}}">Loguit</a></li>
            </ul>
            <ul class="side-nav" id="mobile-menu">
                <li><a href="{{URL::to('/student')}}">Home</a></li>
                <li><a href="{{URL::to('/student/overzicht')}}">Overzicht</a></li>
                <li><a href="{{URL::to('/student/profiel')}}">Profiel</a></li>
                <li><a href="{{URL::to('/loguit')}}">Loguit</a></li>
                <footer class="page-footer wf1_text" style="background-color: #d4a029;">
                    <div class="container">
                      <div class="row">
                        <div class="col l6 s12">
                          <h5 class="white-text"><img src="../img/logo.png" alt="E-register logo" width="55%" height="55%"></h5>
                          <p class="grey-text text-lighten-4">Eregister programma van team 11 <p> 
                             <b>Studentpagina</b></p> </p>
                        </div>
                        <div class="col l4 offset-l2 s12">
                          <h5 class="white-text"><i class="medium material-icons">insert_link</i>Links</h5>
                          <ul>
                            <li><a class="grey-text text-lighten-3" href="https://www.windesheimflevoland.nl/?gclid=Cj0KCQjwl7nYBRCwARIsAL7O7dEJcFXckC4t0DHW3gpin2kaLcod13-eEzU0C-jydbJWLyzlnG3SDP8aAtx5EALw_wcB">Windesheim Flevoland</a></li>
                            <li><a class="grey-text text-lighten-3" href="https://startpagina.windesheim.nl/default.aspx">Sharenet</a></li>
                            <li><a class="grey-text text-lighten-3" href="https://elo.windesheim.nl/Start.aspx#51">ELO</a></li>
                            <li><a class="grey-text text-lighten-3" href="https://educator.windesheim.nl/studyprogress?3">Educator</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="footer-copyright">
                      <div class="container">
                      © Team 11
                      </div>
                    </div>
                  </footer>
            </ul>
          </div>
        </nav>
      </div>
    @yield('content')
  </div>
  <footer class="page-footer wf1_text" style="background-color: #074883;">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text"><img src="../img/logo.png" alt="E-register logo" width="25%" height="25%"></h5>
            <p class="grey-text text-lighten-4">Eregister programma van team 11 <p> 
               <b>Studentpagina</b></p> </p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text"><i class="medium material-icons">insert_link</i>Links</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="https://www.windesheimflevoland.nl/?gclid=Cj0KCQjwl7nYBRCwARIsAL7O7dEJcFXckC4t0DHW3gpin2kaLcod13-eEzU0C-jydbJWLyzlnG3SDP8aAtx5EALw_wcB">Windesheim Flevoland</a></li>
              <li><a class="grey-text text-lighten-3" href="https://startpagina.windesheim.nl/default.aspx">Sharenet</a></li>
              <li><a class="grey-text text-lighten-3" href="https://elo.windesheim.nl/Start.aspx#51">ELO</a></li>
              <li><a class="grey-text text-lighten-3" href="https://educator.windesheim.nl/studyprogress?3">Educator</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © Team 11
        </div>
      </div>
    </footer>
  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <!-- Materialize JS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <!-- eigen js -->
  @yield('script')
</body>
</html>