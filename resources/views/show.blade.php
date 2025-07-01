@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 text-white">
  <h1 class="text-3xl font-bold mb-6">{{ $game['game_title'] }}</h1>

  <img src="{{ asset('img/' . $game['cover_image']) }}" alt="{{ $game['game_title'] }}" class="w-64 h-auto rounded shadow-lg mb-4">

  <p class="text-lg text-gray-300">{{ $game['description'] }}</p>

  <a href="{{ route('games.index') }}" class="text-maroon hover:underline block mt-4">&larr; Back to Games</a>
</div>
@endsection
