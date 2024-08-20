<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Akun</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto py-4">
        <h1 class="text-3xl font-bold">Daftar Akun</h1>

        @if (auth()->user()->role == 'admin')
            <a href="{{ route('accounts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Buat Akun Baru</a>
        @endif

        <div class="mt-4">
            @foreach ($accounts as $account)
                <div class="border p-4 mb-4 rounded">
                    <h2 class="text-xl font-semibold">{{ $account->name }} ({{ $account->role }})</h2>
                    <p class="text-sm text-gray-500">Username: {{ $account->username }}</p>
                    <div class="mt-2">
                        @if (auth()->user()->role == 'admin')
                            <a href="{{ route('accounts.edit', $account->username) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                            <form action="{{ route('accounts.destroy', $account->username) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
       
