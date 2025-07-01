<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Speedrun Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .bg-maroon { background-color: #800000; }
    .text-maroon { color: #800000; }
  </style>
</head>
<body class="bg-black text-white font-sans min-h-screen">

<!-- Navbar -->
<nav class="bg-black border-b border-gray-700 px-8 py-4 flex items-center justify-between">
  <div class="flex items-center gap-6">
    <span class="text-white font-bold text-xl">Arena Speedrun</span>
    <a href="/" class="text-maroon hover:underline">Home</a>
    <a href="/games" class="text-maroon hover:underline">Games</a>
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

  <div class="container mx-auto px-4 py-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <!-- Latest Runs -->
    <div class="lg:col-span-2 bg-gray-900 rounded-lg p-6">
      <h2 class="text-xl font-bold text-maroon mb-4">LATEST RUNS</h2>
      
      <!-- Run Item -->
      <div class="space-y-6">
        <div class="flex gap-4 items-start border-b border-gray-700 pb-4">
          <img src="https://via.placeholder.com/64" alt="Game" class="w-16 h-16 rounded" />
          <div class="flex-1">
            <h3 class="font-semibold text-lg">Super Mario 64</h3>
            <p class="text-maroon text-sm">Any%</p>
            <div class="flex items-center text-sm text-gray-400 mt-1">
              🏆 1st &nbsp;&nbsp; 8m 19s 485ms &nbsp;&nbsp; by <span class="text-white ml-1">Midket</span>
              <span class="ml-auto">59 minutes ago</span>
            </div>
          </div>
        </div>

        <div class="flex gap-4 items-start border-b border-gray-700 pb-4">
          <img src="https://via.placeholder.com/64" alt="Game" class="w-16 h-16 rounded" />
          <div class="flex-1">
            <h3 class="font-semibold text-lg">Donkey Kong</h3>
            <p class="text-maroon text-sm">Glitchless</p>
            <div class="flex items-center text-sm text-gray-400 mt-1">
              👑 1st &nbsp;&nbsp; 0m 19s 800ms &nbsp;&nbsp; by <span class="text-white ml-1">paynkiller01</span>
              <span class="ml-auto">1 hour ago</span>
            </div>
          </div>
        </div>

        <div class="flex gap-4 items-start border-b border-gray-700 pb-4">
          <img src="https://via.placeholder.com/64" alt="Game" class="w-16 h-16 rounded" />
          <div class="flex-1">
            <h3 class="font-semibold text-lg">Minecraft</h3>
            <p class="text-maroon text-sm">Any% Glitchless</p>
            <p class="text-sm text-gray-400">Bedrock Edition</p>
            <div class="flex items-center text-sm text-gray-400 mt-1">
              👑 1st &nbsp;&nbsp; 0m 19s 800ms &nbsp;&nbsp; by <span class="text-white ml-1">Tentacool</span>
              <span class="ml-auto">1 hour ago</span>
            </div>
          </div>
        </div>

        <!-- Tambahkan data run lainnya seperti pola di atas -->
      </div>
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">
      
      <!-- Challenges -->
      <div class="bg-gray-900 rounded-lg p-6">
        <h2 class="text-xl font-bold text-maroon mb-4">CHALLENGES</h2>
        <p class="text-sm text-gray-400 mb-1">Live • <span class="bg-maroon text-white px-2 py-0.5 rounded text-xs">SRC Series</span></p>
        <h3 class="text-white font-semibold mb-2">Deltarune Chapter 3 Egg% Speedrun Challenge</h3>
        <p class="text-sm text-gray-400">Ends in <span class="text-white">4d 11h 45m</span></p>
        <p class="text-sm text-gray-400">Prize pool 🏆 <span class="text-white">$500.00</span></p>
      </div>

      <!-- Community News -->
      <div class="bg-gray-900 rounded-lg p-6">
        <h2 class="text-xl font-bold text-maroon mb-4">COMMUNITY NEWS</h2>
        <div class="space-y-4">
          <div>
            <p class="text-sm text-maroon">SITE NEWS • 2 days ago</p>
            <h4 class="font-semibold">SRC Series Deltarune Chapter 3 Egg%...</h4>
            <p class="text-xs text-gray-400">by <span class="text-white">Meta</span> • 6 views</p>
          </div>
          <div>
            <p class="text-sm text-maroon">13 days ago</p>
            <h4 class="font-semibold">The 2nd Edition Twisted Metal Minute...</h4>
            <p class="text-xs text-gray-400">by <span class="text-white">AudiblySmiles</span> • 0 views</p>
          </div>
          <div>
            <p class="text-sm text-maroon">26 days ago</p>
            <h4 class="font-semibold">Jetrunner Demo $600 Speedrun Bounty...</h4>
            <p class="text-xs text-gray-400">by <span class="text-white">VexGamingTV</span> • 3 views</p>
          </div>
        </div>
      </div>
    </div>

  </div>

</body>
</html>