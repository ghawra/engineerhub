<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="icon" href="{{ asset('imageYK/LogoYodyaKarya.png') }}" type="image/jpg">

    <!-- Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla {
            font-family: karla;
        }
    </style>
</head>
<body class="bg-gray-100 font-family-karla h-screen flex items-center justify-center">

    <div class="w-full max-w-2xl bg-white shadow-md rounded-lg px-6 py-4">

        <!-- Register Form Card -->
        <div>
            <p class="text-center text-2xl mb-4 font-semibold">Join Us</p>

            <!-- Form Registrasi -->
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                <!-- Form Grid Container -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">

                    <!-- Left Column -->
                    <div class="space-y-3">
                        <!-- Name Field -->
                        <div class="flex flex-col">
                            <label for="name" class="text-sm">Name</label>
                            <input type="text" name="name" id="nama" placeholder="John Smith" class="shadow appearance-none border rounded w-full py-1 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                        </div>

                        <!-- Username Field -->
                        <div class="flex flex-col">
                            <label for="username" class="text-sm">Username</label>
                            <input type="text" name="username" id="username" placeholder="John" class="shadow appearance-none border rounded w-full py-1 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                        </div>

                        <!-- Email Field -->
                        <div class="flex flex-col">
                            <label for="email" class="text-sm">Email</label>
                            <input type="email" name="email" id="email" placeholder="your@email.com" class="shadow appearance-none border rounded w-full py-1 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                        </div>

                        <!-- Password Field -->
                        <div class="flex flex-col">
                            <label for="password" class="text-sm">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-1 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="flex flex-col">
                            <label for="password_confirmation" class="text-sm">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="confirm-password" placeholder="Password" class="shadow appearance-none border rounded w-full py-1 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                        </div>

                        <!-- Address Field -->
                        <div class="flex flex-col">
                            <label for="alamat" class="text-sm">Alamat</label>
                            <input type="text" name="alamat" id="alamat" placeholder="Jl. Contoh No.1" class="shadow appearance-none border rounded w-full py-1 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                        </div>

                        
                        <!-- City Field -->
                        <div class="flex flex-col">
                            <label for="asal_kota" class="text-sm">Asal Kota</label>
                            <input type="text" name="asal_kota" id="asal_kota" placeholder="Nama Kota" class="shadow appearance-none border rounded w-full py-1 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-3">

                        <!-- Gender Field -->
                        <div class="flex flex-col">
                            <label for="kelamin" class="text-sm">Gender</label>
                            <select name="kelamin" id="kelamin" class="shadow appearance-none border rounded w-full py-1 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <!-- Experience Field -->
                        <div class="flex flex-col">
                            <label for="pengalaman_kerja" class="text-sm">Pengalaman Kerja</label>
                            <textarea name="pengalaman_kerja" id="pengalaman_kerja" placeholder="Deskripsikan pengalaman kerja Anda..." class="shadow appearance-none border rounded w-full py-1 px-2 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3" required></textarea>
                        </div>
                        
                        <button type="button" data-modal-target="ktpModal" data-modal-toggle="ktpModal" class="bg-blue-500 text-white p-2 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l1.5-1.5M9 21h6M21 10L19.5 8.5M8.5 12.5l-4.5-4.5M21 14v-4m0 4H14m3 6l-3 3m-6-3L5 21m6 0H3M3 10h3m3-3H9V3m6 0v6h3M9 3L5 6M9 3h6"/>
                            </svg><a href="/prototype/ocr.blade.php">
                            Ambil Foto KTP</a>
                        </button>

                        <!-- Modal untuk KTP -->
                        <div id="ktpModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
                            <div class="flex items-center justify-center min-h-screen">
                                <div class="relative w-full max-w-lg p-4">
                                    <div class="bg-white rounded-lg shadow-lg p-6">
                                        <h2 class="text-xl font-bold mb-4">Ambil Foto KTP</h2>
                                        <div class="relative">
                                            <video id="ktpVideo" class="border rounded w-full" autoplay></video>
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <div class="border-2 border-green-500" style="width: 300px; height: 150px;"></div>
                                            </div>
                                        </div>
                                        <button type="button" id="ktpCapture" class="mt-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                            Ambil Foto KTP
                                        </button>
                                        <canvas id="ktpCanvas" class="hidden"></canvas>
                                        <!-- Hidden input untuk menyimpan Base64 dari foto KTP -->
                                        <input type="hidden" id="ktpInput" name="ktp">

                                        <div class="mt-4 flex justify-end">
                                            <button type="button" data-modal-hide="ktpModal" class="bg-gray-500 text-white px-4 py-2 rounded">
                                                Tutup
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol untuk membuka modal kamera Wajah -->
                        <button type="button" data-modal-target="wajahModal" data-modal-toggle="wajahModal" class="bg-blue-500 text-white p-2 rounded mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l1.5-1.5M9 21h6M21 10L19.5 8.5M8.5 12.5l-4.5-4.5M21 14v-4m0 4H14m3 6l-3 3m-6-3L5 21m6 0H3M3 10h3m3-3H9V3m6 0v6h3M9 3L5 6M9 3h6"/>
                            </svg>
                            Ambil Foto Wajah
                        </button>

                        <!-- Modal untuk Wajah -->
                        <div id="wajahModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
                            <div class="flex items-center justify-center min-h-screen">
                                <div class="relative w-full max-w-lg p-4">
                                    <div class="bg-white rounded-lg shadow-lg p-6">
                                        <h2 class="text-xl font-bold mb-4">Ambil Foto Wajah</h2>
                                        <div class="relative">
                                            <video id="wajahVideo" class="border rounded w-full" autoplay></video>
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <div class="border-2 border-red-500 rounded-full" style="width: 200px; height: 200px;"></div>
                                            </div>
                                        </div>
                                        <button type="button" id="wajahCapture" class="mt-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                            Ambil Foto Wajah
                                        </button>
                                        <canvas id="wajahCanvas" class="hidden"></canvas>
                                        <!-- Hidden input untuk menyimpan Base64 dari foto wajah -->
                                        <input type="hidden" id="wajahInput" name="foto_muka">

                                        <div class="mt-4 flex justify-end">
                                            <button type="button" data-modal-hide="wajahModal" class="bg-gray-500 text-white px-4 py-2 rounded">
                                                Tutup
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Submit Button (Centered) -->
                <div class="flex justify-center pt-6">
                    <input type="submit" value="Register" class="bg-black text-white font-bold text-sm hover:bg-gray-700 py-2 px-4 rounded w-1/2" />
                </div>
            </form>

            <!-- Login Link -->
            <div class="text-center pt-4">
                <p>Already have an account? <a href="{{ route('login') }}" class="underline font-semibold">Log in here.</a></p>
            </div>
        </div>
    </div>

    <!-- Client-side password confirmation -->
    <script src="{{ asset('js/camera.js') }}"></script>

</body>
</html>
