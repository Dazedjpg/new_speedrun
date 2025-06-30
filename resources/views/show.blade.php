@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $game->name }}</h1>
  <img src="{{ $game->cover_url }}" style="max-width:300px;">
  <p>Abbreviation: {{ $game->abbreviation }}</p>
  <p>Release Year: {{ $game->release_year }}</p>
  <a href="{{ $game->link }}" target="_blank">Link to Speedrun.com</a>
</div>
@endsection
