<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Setup Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <body class="bg-gray-100">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="container mx-auto mt-10">
            <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-center mb-6">Database Configuration</h2>
                @if (session('success'))
                    <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('installer.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="hostname" class="block text-gray-700">Hostname</label>
                        <input type="text" name="hostname" id="hostname" value="{{ old('hostname') }}"
                            class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="port" class="block text-gray-700">Port</label>
                        <input type="text" name="port" id="port" value="{{ old('port') }}"
                            class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="connection" class="block text-gray-700">Connection</label>
                        <input type="text" name="connection" id="connection" value="{{ old('connection', 'mysql') }}"
                            class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="database" class="block text-gray-700">Database Name</label>
                        <input type="text" name="database" id="database" value="{{ old('database') }}"
                            class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700">Username</label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}"
                            class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" name="password" id="password"
                            class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg font-bold">Save &
                            Install</button>
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>
