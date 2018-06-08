@extends('layouts.docentProfiel')

@section('title', 'Profiel')
@section('content')
<div class="content">
    <div class="divider"></div>
        <div class="section">
                <i class="material-icons" style="text-align:left; font-size:100px">account_circle</i>
            <h5 class="wf1_text">Naam</h5>
                <p>Voornaam Achternaam</p>
        </div>
    <div class="divider"></div>
        <div class="section">
            <h5 class="wf1_text">Type account</h5>
                <p>Docent</p>
        </div>
  <div class="divider"></div>
        <div class="section">
            <h5 class="wf1_text">Wachtwoord wijzigen</h5>
                <p><a href="../resetpass"><u>Wijzig hier uw wachtwoord</u></a></p>
        </div>
        
@endsection
@section('script')
<script>
    $("document").ready(function(){
      $(".button-collapse").sideNav();
    });
</script>
@endsection