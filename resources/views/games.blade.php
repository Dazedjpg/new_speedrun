<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Games</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
  .bg-maroon { background-color: #800000; }
  .text-maroon { color: #800000; }
</style>
</head>
<body class="bg-black text-white min-h-screen">

<nav class="bg-maroon border-b border-gray-700 px-8 py-4 flex items-center justify-between">
  <div class="flex items-center gap-6">
    <span class="text-white font-bold text-xl">Speedrunner</span>
    <a href="/" class="text-white hover:underline">Home</a>
    <a href="/games" class="text-white hover:underline">Games</a>
  </div>

  <div class="flex items-center gap-4">
    <input
      type="text"
      placeholder="Search..."
      class="px-3 py-1 rounded-md text-black focus:outline-none focus:ring-2 focus:ring-maroon"
    />
    <a href="/register" class="text-white hover:underline">Sign Up</a>
    <a href="/login" class="bg-maroon text-white px-4 py-1 rounded hover:bg-red-900">Sign In</a>
  </div>
</nav>

  <div class="p-6">
    <h1 class="text-3xl font-bold mb-4">Games List</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 max-w-5xl mx-auto">
      @foreach($games as $game)
        <div class="bg-gray-900 p-4 rounded">
          <h2 class="text-xl font-semibold">{{ $game['game_title'] }}</h2>
          <img 
            src="{{ asset('img/' . $game['cover_image']) }}" 
            alt="{{ $game['game_title'] }}" 
            class="w-full h-40 sm:h-48 md:h-56 object-contain rounded mt-4"
          />


        </div>
      @endforeach
    </div>
  </div>
</body>
</html>
