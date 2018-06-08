<!-- Stored in resources/views/login.blade.php -->

@extends('layouts.login')

@section('title', 'Login')

@section('content')
<div class="row">
  <div class="col s6 offset-s3">
    <form method="POST" action="mailpassword">
      {{ csrf_field() }}
      <div class="wwreset">
        <img src="img/logo.png" alt="E-register logo" width="55%" height="55%">
        <input type="text" placeholder="E-mailadres" name="email" placeholder="E-mailadres" required>
        <button class="btn" type="submit" name="action">Aanvraag versturen
          <i class="material-icons right">send</i>
        </button>
        <div class="row">
        @if(isset($msg))
          <small style="color:green; font-weight:bold;">{{$msg}}</small>
        @endif
        </div>
        <p class="center small"><a href="login">Heeft u al een account? Meld u hier aan</a>
      </div>
    </form>
  </div>
</div>
@endsection