<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Games</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen">
  <div class="p-6">
    <h1 class="text-3xl font-bold mb-4">Games List</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      @foreach($games as $game)
        <div class="bg-gray-900 p-4 rounded">
          <h2 class="text-xl font-semibold">{{ $game['game_title'] }}</h2>
          <p class="text-sm text-gray-400">{{ $game['description'] }}</p>
          <img 
            src="{{ asset('img/' . $game['cover_image']) }}" 
            alt="{{ $game['game_title'] }}" 
            class="w-full h-40 sm:h-48 md:h-56 object-cover rounded mt-4"
          />

        </div>
      @endforeach
    </div>
  </div>
</body>
</html>
