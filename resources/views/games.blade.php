<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Game Detail | Speedrunner</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .bg-maroon { background-color: #800000; }
    .text-maroon { color: #800000; }
  </style>
</head>
<body class="bg-black text-white font-sans min-h-screen">

  <!-- Navbar -->
  <nav class="bg-maroon border-b border-gray-700 px-8 py-4 flex items-center justify-between">
    <div class="flex items-center gap-6">
      <a href="/" class="text-white font-bold text-xl">Speedrunner</a>
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

  <!-- Game Detail -->
  <div class="container mx-auto px-4 py-10">
    <div class="max-w-3xl mx-auto bg-gray-900 rounded-lg p-8">
      <div class="flex items-center gap-6">
        <img src="{{ asset($game['image_url']) }}" alt="{{ $game['title'] }}" class="w-32 h-32 rounded" />
        <div>
          <h1 class="text-3xl font-bold">{{ $game['title'] }}</h1>
          <p class="text-gray-400">{{ $game['category'] }}</p>
        </div>
      </div>

      <div class="mt-6 text-gray-300">
        <p><strong>Runner:</strong> <span class="text-white">{{ $game['runner'] }}</span></p>
        <p><strong>Rank:</strong> {{ $game['rank'] }}</p>
        <p><strong>Time:</strong> {{ $game['time'] }}</p>
      </div>
    </div>
  </div>

</body>
</html>
