<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $game['game_title'] }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="{{ $style['bg'] }} text-white min-h-screen">

  <nav class="{{ $style['nav'] }} border-b border-gray-700 px-8 py-4 flex items-center justify-between">
    <div class="flex items-center gap-6">
      <span class="text-white font-bold text-xl">Speedrunner</span>
      <a href="/" class="text-white hover:underline">Home</a>
      <a href="/games" class="text-white hover:underline">Games</a>
    </div>
  </nav>

  <div class="max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">{{ $game['game_title'] }}</h1>
    <div class="flex flex-col md:flex-row gap-6">
      <img src="{{ asset('img/' . $game['cover_image']) }}" class="w-full md:w-64 h-auto object-contain rounded" />
      <p class="text-white">{{ $game['description'] }}</p>
    </div>
  </div>

</body>
</html>
