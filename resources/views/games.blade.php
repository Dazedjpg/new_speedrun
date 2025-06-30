@extends('layouts.app')

@section('content')
<div class="bg-black min-h-screen text-white py-10 px-4 md:px-12">
  <h1 class="text-3xl font-bold text-white mb-6">All Games</h1>

  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-6 gap-6">
    @foreach ($games as $game)
      <a href="{{ route('games.show', $game->id) }}" class="bg-gray-900 rounded-md overflow-hidden hover:scale-[1.03] transition-transform duration-150">
        <img src="{{ $game->cover_url }}" alt="{{ $game->name }}" class="w-full h-32 object-cover">
        <div class="p-3">
          <h2 class="text-sm font-semibold text-white leading-tight truncate">{{ $game->name }}</h2>
          <p class="text-xs text-gray-400 mt-1">{{ $game->release_year }}</p>
        </div>
      </a>
    @endforeach
  </div>

  <div class="mt-8">
    {{ $games->links() }}
  </div>
</div>
@endsection
