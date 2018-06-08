<!-- Stored in resources/views/index.blade.php -->
@extends('layouts.docentIndex')

@section('title', 'Portaal')
@section('content')
<div class="content">
    <div class="row">
        <div class="col s12 m5">
          <div class="card-panel wf2">
            <span class="white-text">
                <span class="left-align" style="font-size:50px;"><i class="fas fa-chalkboard-teacher"></i></span> 
            <a href="{{URL::to('/docent')}}">Docenten</a>
            </span>
          </div>
          @if(isset($msg))
          <div class="card-panel wf2">
            <span class="white-text">
            <span class="left-align" style="font-size:50px;"><h4>{{$msg}}</h4></span> 
            </span>
          </div>
          @endif
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