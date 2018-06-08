<!-- Stored in resources/views/login.blade.php -->
@extends('layouts.login')
@section('title', 'Wachtwoord Wijzigen')
@section('content')
<div class="row">
  <div class="col s6 offset-s3">
    <form method="POST" action="/eregister/public/login">
      {{ csrf_field() }}
      <div class="white register center-align">
        <img src="img/logo.png" alt="E-register logo" width="55%" height="55%">
        <p>Wachtwoord wijzigen:</p>
        @if(isset($msg))
          <small style="color:red; font-weight:bold;">{{$msg}}</small>
        @endif
        <input type="password" pattern=".{10,}" placeholder="Wachtwoord" id="wachtwoord" name="wachtwoord" required>
        <p>Nieuw wachtwoord bevestigen:</p>
        <input type="password" pattern=".{10,}" placeholder="Wachtwoord bevestigen" id="bevestig_wachtwoord" name="bevestig_wachtwoord" required>
        <i><small style="color:#808080;">(Wachtwoord moet bestaan uit minstens tien karakters)</small></i>
        <br>
        <div class="center-align">
        <button class="btn" id="submit" type="submit" name="submit">Submit
          <i class="material-icons right">send</i>
        </button>
      </div>
      </div>
    </form>
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

