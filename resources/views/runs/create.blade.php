<!DOCTYPE html>
<html>
<head>
    <title>Tambah Run</title>
</head>
<body>
    <h1>Tambah Run</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('runs.store') }}" method="POST">
        @csrf

        <label>Game ID:</label><br>
        <input type="number" name="game_id" required><br><br>

        <label>User ID:</label><br>
        <input type="number" name="user_id" required><br><br>

        <label>Category ID:</label><br>
        <input type="number" name="category_id" required><br><br>

        <label>Time (in seconds):</label><br>
        <input type="number" step="0.01" name="time_in_second" required><br><br>

        <label>Video URL:</label><br>
        <input type="url" name="video_url"><br><br>

        <label>Status:</label><br>
        <input type="text" name="status" required><br><br>

        <label>Submitted At:</label><br>
        <input type="datetime-local" name="submitted_at"><br><br>

        <label>Reviewed By (User ID):</label><br>
        <input type="number" name="reviewed_by"><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
