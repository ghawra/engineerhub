<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Image Logo Yodya Karya */
        .YK {
            width: 150px;
            margin-left: 7.1rem;
        }
    </style>

    <style>
        .slider {
            transition: transform 0.5s ease;
        }
        .slider-container {
            overflow: hidden;
            width: 100%;
        }
        .slider-item {
            min-width: 100%;
        }
    </style>
</head>
<body class="bg-gray-100 mr-5 h-screen flex justify-center items-center">
   
<div class="flex w-full max-w-4xl shadow-lg rounded-lg overflow-hidden">
        <!-- Form Login -->
        <div class="flex flex-col p-12 bg-white w-full lg:w-1/2"> <!-- Increased padding -->

            <label class="flex text-sm mb-5 font-bold "><img src="{{asset('/imageYK/tes.png')}}" class="w-5 mr-2" alt="">Engineer Hub</label>
            
            <h1 class="text-2xl font-bold ">Login In to Your Account</h1> <!-- Increased font size -->
            <p class="mb-11 text-gray-500">Welcome back!</p>

            <form ction="{{ route('login.post') }}" method="POST" class="w-full">

                <div class="mb-4 ml-5">
                    <label class="block text-gray-700 text-xl" for="username">Username</label> <!-- Increased font size -->
                    <input class="shadow focus:outline-none focus:ring-2 focus:ring-green-500 mt-1 block w-full border-gray-800 rounded-md p-4 text-xl" type="text" id="username" required> <!-- Increased padding and font size -->
                </div>

                <div class="mb-4 ml-5">
                    <label class="block text-gray-700 text-xl" for="password">Password</label> <!-- Increased font size -->
                    <input class="shadow  focus:outline-none focus:ring-2 focus:ring-green-500 mt-1 block w-full border-gray-300 rounded-md p-4 text-xl" type="password" id="password" required> <!-- Increased padding and font size -->
                </div>

                <div class="mb-4 ml-5">
                    <input type="checkbox" id="remember" class="mr-2 leading-tight">
                    <label class="text-sm text-gray-600" for="remember">Remember Me</label>
                </div>

                <button type="submit" src="{{route('pageKosong')}}" class="w-full ml-2.5  bg-green-600 text-white py-4 rounded-md text-xl hover:bg-green-700">Login</button> <!-- Increased button padding and font size -->

            </form>

            <div class="text-center pt-4 ml-5">
                <p>Don't have an account? <a href="{{ route('selectregist') }}" class="underline font-semibold">Create an account.</a></p>
            </div>

        </div>

        <!-- Gambar di sebelah kanan -->
        <div class="slider-container w-full lg:w-1/2 flex relative">
            <div class="slider flex">
                <div class="slider-item">
                    <img src="https://via.placeholder.com/400x300?text=Gambar+1" alt="Gambar 1" class="w-full h-full object-cover">
                </div>
                <div class="slider-item">
                    <img src="https://via.placeholder.com/400x300?text=Gambar+2" alt="Gambar 2" class="w-full h-full object-cover">
                </div>
            </div>

            <a id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 text-white p-2 rounded-full hover:bg-gray-700 transition"><i class="fa-solid fa-angle-left fa-3x"></i></a>
            <a id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 text-white p-2 rounded-full hover:bg-gray-700 transition"><i class="fa-solid fa-angle-right fa-3x"></i></a>
        </div>
    </div>

    <script>
        let currentIndex = 0;
        const slides = document.querySelectorAll('.slider-item');
        const totalSlides = slides.length;

        function showSlide(index) {
            const offset = index * -100;
            document.querySelector('.slider').style.transform = `translateX(${offset}%)`;
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            showSlide(currentIndex);
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            showSlide(currentIndex);
        }

        document.getElementById('next').addEventListener('click', nextSlide);
        document.getElementById('prev').addEventListener('click', prevSlide);

        setInterval(nextSlide, 3000); // Ganti slide setiap 3 detik
    </script>
</body>
</html>