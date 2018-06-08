<!-- Stored in resources/views/studentIndex.blade.php -->
@extends('layouts.studentIndex')

@section('title', 'Home')
@section('content')
<div class="content">
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel wf2">
              <span class="white-text">
                  <span class="left-align" style="font-size:50px;"><i class="far fa-list-alt"></i></span> 
                  <a href="{{URL::to('/student/overzicht')}}">&nbsp Toon overzicht</a>
              </span>
            </div>
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
