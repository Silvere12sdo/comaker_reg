<!-- Stored in resources/views/login.blade.php -->

@extends('layouts.login')

@section('title', 'Login')

@section('content')
<div class="row">
  <div class="col s6 offset-s3">
    <form method="POST" action="studentLogin">
      {{ csrf_field() }}
      <div class="white login center-align">
        <img src="img/logo.png" alt="E-register logo" width="55%" height="55%">
        <input type="text" placeholder="E-mailadres" name="email" required>
        <input type="password" placeholder="Wachtwoord" name="password" required>
        <button class="btn" type="submit" name="action">Aanmelden
          <i class="material-icons right">send</i>
        </button>
        <div class="row">
        @if(isset($msg))
          <small style="color:green; font-weight:bold;">{{$msg}}</small>
        @endif
        </div>
        <p class="center small"> <a href="register">Account aanmaken</a> - <a href="resetpass">Wachtwoord vergeten</a></p>
      </div>
    </form>
  </div>
</div>
@endsection