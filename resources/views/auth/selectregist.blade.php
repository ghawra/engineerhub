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
<body class="bg-gray-100 flex items-center justify-center h-screen">
   <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <!-- Logo Icon -->
        <div class="text-center mb-6">
            <svg class="mx-auto w-16 h-16 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 19.479a1 1 0 00.683.875l.097.031a1 1 0 001.216-.681l.031-.097a1 1 0 00-.681-1.216l-.097-.031a1 1 0 00-1.216.681l-.031.097zm13.757 0a1 1 0 001.216-.681l.031-.097a1 1 0 00-.681-1.216l-.097-.031a1 1 0 00-1.216.681l-.031.097a1 1 0 00.681 1.216zm-7.677-1.6a4 4 0 100-8 4 4 0 000 8z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16m-8 12v4m0-4a4 4 0 110-8 4 4 0 010 8z"></path>
            </svg>
        </div>

        <!-- Title -->
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Register</h2>

        <!-- Subtitle -->
        <p class="text-center text-gray-600 mb-6">Select User</p>

        <!-- Buttons -->
        <div class="flex justify-around">
            <a href="{{route('register')}}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg">
                Engineers
            </a>
            <a href="#" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg">
                Company
            </a>
        </div>
        <div class="text-center pt-4">
                <p>Already have an account? <a href="{{route('login')}}" class="underline font-semibold">Log in here.</a></p>
        </div>
    </div>
</body>
</html>
