<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Your CV</title>
    <!-- Tambahkan Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Gaya khusus untuk background gambar */
        .bg-engineer {
            background-image: url('https://via.placeholder.com/400x600'); /* Ganti dengan URL gambar asli */
            background-size: cover;
            background-position: center;
        }

        /* Gaya untuk border dashed pada upload box */
        .upload-box {
            border: 2px dashed #ccc;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .upload-box:hover {
            border-color: #6ee7b7; /* Warna hijau terang saat hover */
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <!-- Container Utama -->
    <div class="flex w-full max-w-5xl bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Bagian Kiri (Form Upload CV) -->
        <div class="flex flex-col items-center justify-center w-full lg:w-1/2 p-10">
            <div class="mb-4">
                <img src="https://via.placeholder.com/150" alt="EngineerHub Logo" class="w-20"> <!-- Ganti dengan URL logo asli -->
            </div>
            <h2 class="text-2xl font-bold mb-6">Send Your CV</h2>
            <div class="upload-box w-full max-w-xs">
                <div class="flex flex-col items-center">
                    <i class="fas fa-file-upload fa-3x text-gray-500 mb-4"></i>
                    <p class="font-semibold">Upload an File</p>
                    <p class="text-gray-500">File must be up to 40 MB</p>
                    <input type="file" class="hidden"  id="cv-upload"> <!-- Input file disembunyikan -->
                </div>
            </div>
        </div>

        <!-- Bagian Kanan (Gambar) -->
        <div class="hidden lg:flex w-full lg:w-1/2 bg-engineer"></div>
    </div>

    <!-- Tambahkan Font Awesome untuk ikon -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        // JavaScript untuk menangani klik pada upload box
        document.querySelector('.upload-box').addEventListener('click', function() {
            document.getElementById('cv-upload').click(); // Simulasikan klik pada input file
        });
    </script>
</body>
</html>
