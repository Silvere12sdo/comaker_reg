<!-- Stored in resources/views/QRTonen.blade.php -->
@extends('layouts.docentProfiel')

@section('title', 'Portaal')
@section('content')
<div class="content">
  <div class="row">
    <div class="col s12 m12">
      <center>
        {!! QrCode::size(500)->generate(URL::to('https://project4.bakiyuksel.nl/public/studentLogin')); !!}            
        <br>
        <h5>Scan de QR-code om jouw aanwezigheid te registreren.</h5>
      </center>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
    $("document").ready(function(){
      $(".button-collapse").sideNav();
    });
</script>
@endsection
