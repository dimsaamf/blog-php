<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Post</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto py-4">
        <h1 class="text-3xl font-bold">Daftar Post</h1>

        @if (auth()->user()->role == 'admin')
            <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Buat Post Baru</a>
        @endif

        <div class="mt-4">
            @foreach ($posts as $post)
                <div class="border p-4 mb-4 rounded">
                    <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                    <p class="text-gray-600">{{ $post->content }}</p>
                    <p class="text-sm text-gray-500">Dibuat oleh: {{ $post->account->name }} pada {{ $post->date->format('d M Y H:i') }}</p>
                    <div class="mt-2">
                        @if (auth()->user()->role == 'admin')
                            <a href="{{ route('posts.edit', $post->idpost) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                            <form action="{{ route('posts.destroy', $post->idpost) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
