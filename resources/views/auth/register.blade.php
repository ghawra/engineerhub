<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Mengatur ukuran input dan textarea lebih kecil */
        .form-control, .form-select {
            height: 38px; /* Ketinggian input */
            font-size: 14px; /* Ukuran font lebih kecil */
        }
        textarea {
            height: 80px; /* Tinggi textarea */
        }
        .card {
            padding: 20px; /* Padding card lebih kecil */
        }
    </style>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Register</h2>
                        <form>
                            <div class="row">
                                <!-- Bagian Kiri: Form Input -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username <i class="fa-regular fa-user"></i></label>
                                        <input type="text" class="form-control form-control-sm" id="username" placeholder="Masukkan Username">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control form-control-sm" id="email" placeholder="Masukkan Email">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control form-control-sm" id="password" placeholder="Password">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control form-control-sm" id="alamat" placeholder="Alamat">
                                    </div>
                                </div>

                                <!-- Bagian Kanan: Upload File, Dropdown, dan Textarea -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="cv" class="form-label">Upload CV</label>
                                        <input type="file" class="form-control form-control-sm" id="cv" accept=".pdf,.doc,.docx">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="ijazah" class="form-label">Upload Ijazah</label>
                                        <input type="file" class="form-control form-control-sm" id="ijazah" accept=".pdf,.doc,.docx">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select id="gender" class="form-select form-select-sm">
                                            <option selected>Select Gender</option>
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="notes" class="form-label">Pengalaman Kerja</label>
                                        <textarea class="form-control form-control-sm" id="notes" placeholder="Enter additional information..." rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary btn-sm">Register</button>
                                <a href="{{ route('login') }}" class="btn btn-link btn-sm">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
