<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto py-4">
        <h1 class="text-3xl font-bold">Beranda Blog</h1>

        <!-- Navigation -->
        <nav class="mt-4">
            <ul class="flex space-x-4">
                <li><a href="{{ url('/') }}" class="text-blue-500">Home</a></li>
                @auth
                    <li><a href="{{ route('posts.index') }}" class="text-blue-500">Post</a></li>
                    @if(auth()->user()->role === 'admin')
                        <li><a href="{{ route('accounts.index') }}" class="text-blue-500">Account</a></li>
                    @endif
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-blue-500">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li><a href="{{ route('login') }}" class="text-blue-500">Login</a></li>
                @endguest
            </ul>
        </nav>

        <!-- Display all posts -->
        <div class="mt-4">
            @foreach ($posts as $post)
                <div class="border p-4 mb-4 rounded">
                    <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                    <p class="text-gray-600">{{ $post->content }}</p>
                    <p class="text-sm text-gray-500">Dibuat oleh: {{ $post->account->name }} pada {{ $post->created_at->format('d M Y H:i') }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
