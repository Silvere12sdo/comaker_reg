<!-- Stored in resources/views/login.blade.php -->
@extends('layouts.password')
@section('title', 'Wachtwoord reset')
@section('content')
<div class="row">
  <div class="col s6 offset-s3">
    <form method="POST" action="updatepass">
      {{ csrf_field() }}
      <div class="white register center-align">
        <img src="{{ URL::asset('img/logo.png') }}" alt="E-register logo" width="55%" height="55%">
        <p>Wachtwoord veranderen:</p>
        @if(isset($msg))
          <small style="color:red; font-weight:bold;">{{$msg}}</small>
        @endif
        <input type="text" placeholder="E-mailadres" name="email" value="{{$email}}" disabled>
        <input type="text" placeholder="E-mailadres" name="email" value="{{$email}}" hidden>
        <input type="password" pattern=".{10,}" placeholder="Wachtwoord" id="wachtwoord" name="wachtwoord" required>
        <input type="password" pattern=".{10,}" placeholder="Wachtwoord bevestigen" id="bevestig_wachtwoord" name="bevestig_wachtwoord" required>
        <i><small style="color:#808080;">(Wachtwoord moet bestaan uit minstens 10 karakters)</small></i>
        <br>
        <div class="center-align">
        <span class="center row" id='message'></span> 
        <button class="btn" id="submit" type="submit" name="submit">Opslaan
          <i class="material-icons right">send</i>
        </button>
      </div>
      </div>
    </form>
    <p class="center small"><a href="login">Heeft u al een account? Meld u hier aan</a></p>
  </div>
</div>
@endsection
@section('script')
<script>
$('#submit').prop('disabled',true);
$('#wachtwoord, #bevestig_wachtwoord').on('keyup', function () {
  if ($('#wachtwoord').val() == $('#bevestig_wachtwoord').val()) {
    $('#message').html('').css('color', 'green');
    $('#submit').prop('disabled',false);  
  } else {
    $('#message').html('<small>Wachtwoord komt niet overeen</small>').css('color', 'red');
    $('#submit').prop('disabled', true); 
  }
});
</script>
@endsection

