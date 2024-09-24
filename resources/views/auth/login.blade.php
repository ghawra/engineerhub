<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-md">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-2xl font-bold mb-6 text-center">LOGIN</h2>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Usermail"> <i class="fa-regular fa-user" aria-hidden="true"></i>Username/Email</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="Usermail" type="text" placeholder="Username/Email">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3" id="password" type="password" placeholder="Password">
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button">
                        Login
                    </button>
                    <a href="{{route('register')}}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('login') }}">
                        Register
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
