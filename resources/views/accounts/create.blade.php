<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto py-4">
        <h1 class="text-3xl font-bold">Buat Akun Baru</h1>

        <form action="{{ route('accounts.store') }}" method="POST" class="mt-4">
            @csrf
            <div>
                <label class="block mb-2" for="username">Username:</label>
                <input type="text" name="username" id="username" class="border rounded px-3 py-2 w-full" required>
            </div>
            <div class="mt-4">
                <label class="block mb-2" for="password">Password:</label>
                <input type="password" name="password" id="password" class="border rounded px-3 py-2 w-full" required>
            </div>
            <div class="mt-4">
                <label class="block mb-2" for="name">Nama:</label>
                <input type="text" name="name" id="name" class="border rounded px-3 py-2 w-full" required>
            </div>
            <div class="mt-4">
                <label class="block mb-2" for="role">Role:</label>
                <select name="role" id="role" class="border rounded px-3 py-2 w-full" required>
                    <option value="admin">Admin</option>
                    <option value="author">Author</option>
                </select>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-4">Simpan Akun</button>
        </form>
    </div>
</body>
</html>
