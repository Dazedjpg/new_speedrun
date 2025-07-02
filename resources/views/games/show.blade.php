<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $game['game_title'] }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="{{ $style['bg'] }} text-white min-h-screen">

  <!-- Navbar -->
  <nav class="{{ $style['nav'] }} border-b border-gray-700 px-8 py-4 flex items-center justify-between">
    <div class="flex items-center gap-6">
      <span class="text-white font-bold text-xl">Speedrunner</span>
      <a href="/" class="text-white hover:underline">Home</a>
      <a href="/games" class="text-white hover:underline">Games</a>
    </div>
  </nav>

  <!-- Game Info -->
  <div class="max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">{{ $game['game_title'] }}</h1>
    <div class="flex flex-col md:flex-row gap-6">
      <img src="{{ asset('img/' . $game['cover_image']) }}" class="w-full md:w-64 h-auto object-contain rounded" />
      <p class="text-white">{{ $game['description'] }}</p>
    </div>
  </div>




  <!-- Runs Section -->
  <div class="max-w-5xl mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Speedrun Submissions</h2>

    @php
      // Predefined categories to show always
      $categories = ['Any%', 'Glitchless'];

      // Group the runs for the current game by category
      function convertToMilliseconds($time) {
          preg_match('/(?:(\d+)m)?\s*(?:(\d+)s)?\s*(?:(\d+)ms)?/', $time, $matches);
          return (int)($matches[1] ?? 0) * 60000 + (int)($matches[2] ?? 0) * 1000 + (int)($matches[3] ?? 0);
      }

      $gameRuns = collect($runs)
        ->where('game_id', $game['game_id'])
        ->sortBy(fn($r) => convertToMilliseconds($r['time']))
        ->groupBy('category');
    @endphp

    <!-- Tabs -->
    <div class="mb-6 flex flex-col md:flex-row justify-between items-center">
  
  <!-- Category Tabs -->
    <div class="flex flex-wrap gap-2" id="category-tabs">
      @foreach($categories as $index => $cat)
        <button 
          onclick="showCategory('{{ Str::slug($cat) }}')" 
          class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 {{ $loop->first ? 'active-tab' : '' }}"
          id="tab-{{ Str::slug($cat) }}"
        >
          {{ $cat }}
        </button>
      @endforeach
    </div>

    <!-- Submit Run Button -->
    <div class="mt-4 md:mt-0">
      <button 
        class="bg-maroon hover:bg-red-800 text-white px-5 py-2 rounded text-sm md:text-base"
      >
        ➕ Submit Run
      </button>
    </div>

  </div>

    <!-- Category Tables -->
    @foreach($categories as $index => $cat)
      <div class="category-table {{ !$loop->first ? 'hidden' : '' }}" id="cat-{{ Str::slug($cat) }}">
        @php $runsInCategory = $gameRuns[$cat] ?? collect(); @endphp

        @if ($runsInCategory->isEmpty())
          <p class="text-gray-400 mb-6">No runs available in this category.</p>
        @else
          <table class="min-w-full text-left border border-white border-collapse mb-8">
            <thead class="bg-gray-800 text-white">
              <tr>
                <th class="py-2 px-4 border border-white">Rank</th>
                <th class="py-2 px-4 border border-white">Runner</th>
                <th class="py-2 px-4 border border-white">Time</th>
                <th class="py-2 px-4 border border-white">Status</th>
                <th class="py-2 px-4 border border-white">Video</th>
              </tr>
            </thead>
            <tbody class="text-gray-300">
              @foreach($runsInCategory->values() as $rank => $run)
                <tr class="border-t border-white">
                  <td class="py-2 px-4 border border-white">{{ $rank + 1 }}</td>
                  <td class="py-2 px-4 border border-white">{{ $run['user_name'] }}</td>
                  <td class="py-2 px-4 border border-white">{{ $run['time'] }}</td>
                  <td class="py-2 px-4 border border-white">{{ $run['status'] }}</td>
                  <td class="py-2 px-4 border border-white">
                    <a href="{{ $run['video_url'] }}" target="_blank" class="text-blue-400 hover:underline">Watch</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @endif
      </div>
    @endforeach

    <!-- Submit Button -->
    

  </>

  <script>
    const versionSelect = document.getElementById('versionSelect');
    const vNum = document.getElementById('v-num');
    const vDesc = document.getElementById('v-desc');
    const vDate = document.getElementById('v-date');

    function updateVersionInfo() {
      const selected = versionSelect.options[versionSelect.selectedIndex];
      vNum.textContent = selected.value;
      vDesc.textContent = selected.dataset.description;
      vDate.textContent = selected.dataset.released;
    }

    if (versionSelect) {
      versionSelect.addEventListener('change', updateVersionInfo);
      updateVersionInfo(); // show info on first load
    }

    function showCategory(slug) {
      document.querySelectorAll('.category-table').forEach(el => el.classList.add('hidden'));
      document.querySelectorAll('#category-tabs button').forEach(el => el.classList.remove('bg-gray-500', 'active-tab'));
      document.getElementById('cat-' + slug).classList.remove('hidden');
      document.getElementById('tab-' + slug).classList.add('bg-gray-500', 'active-tab');
    }
  </script>

</body>
</html>
