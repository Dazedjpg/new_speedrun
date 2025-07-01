<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Speedrunner')</title>
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
      <span class="text-white font-bold text-xl">Speedrunner</span>
      <a href="/" class="text-white hover:underline">Home</a>
      <a href="/games" class="text-white hover:underline">Games</a>
    </div>

    <div class="flex items-center gap-4 relative">
      <input type="text" placeholder="Search..." class="px-3 py-1 rounded-md text-black focus:outline-none focus:ring-2 focus:ring-maroon" />

      @auth
        <!-- Dropdown Trigger -->
        <div class="relative group">
          <button class="text-white hover:underline focus:outline-none">
            Hi, {{ auth()->user()->name }} ▼
          </button>
          <!-- Dropdown -->
          <div class="absolute right-0 mt-2 w-40 bg-gray-800 rounded-md shadow-lg hidden group-hover:block z-10">
            <a href="/profile" class="block px-4 py-2 hover:bg-gray-700 text-sm">Profile</a>
            <form method="POST" action="{{ route('signout') }}">
              @csrf
              <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-700 text-sm">Sign Out</button>
            </form>
          </div>
        </div>
      @else
        <a href="/signup" class="text-white hover:underline">Sign Up</a>
        <a href="/signin" class="bg-maroon text-white px-4 py-1 rounded hover:bg-red-900">Sign In</a>
      @endauth
    </div>
  </nav>

  <!-- Main Content -->
  <main class="px-4 py-8">
    @yield('content')
  </main>

</body>
</html>
