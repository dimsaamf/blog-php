<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Post</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto py-4">
        <h1 class="text-3xl font-bold">Buat Post Baru</h1>

        <form action="{{ route('posts.store') }}" method="POST" class="mt-4">
            @csrf
            <div>
                <label class="block mb-2" for="title">Judul:</label>
                <input type="text" name="title" id="title" class="border rounded px-3 py-2 w-full" required>
            </div>
            <div class="mt-4">
                <label class="block mb-2" for="content">Konten:</label>
                <textarea name="content" id="content" class="border rounded px-3 py-2 w-full" rows="5" required></textarea>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-4">Simpan Post</button>
        </form>
    </div>
</body>
</html>
