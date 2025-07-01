<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen">
  <div class="max-w-xl mx-auto mt-16 p-6 bg-gray-900 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4">My Profile</h1>
    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>

    <div class="mt-6">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="bg-red-700 px-4 py-2 rounded hover:bg-red-900 text-white">Logout</button>
      </form>
    </div>
  </div>
</body>
</html>
