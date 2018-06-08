@extends('layouts.studentOverzicht')

@section('title', 'Overzicht')

@section('content')
<div class="content">
    <div class="row">
        <div class="col s12 m5">
          <h3>Aanwezigheid:</h3>
        </div>
    </div>
    <div class="row">
    <div class="col s12">
      <table class="striped highlight responsive-table ">
        <thead>
          <th>Vak</th>
          <th>Datum</th>
          <th>Token</th>
        </thead>
        <tbody>
          @foreach($registraties as $reg)
          <tr>
            <td>{{$reg->omschrijving}}</td>
            <td>{{$reg->datum}}</td>
            <td>{{$reg->token}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
