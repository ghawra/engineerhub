// public/js/camera-control.js
// JavaScript untuk mengontrol kamera

// Variabel untuk menyimpan stream video
let ktpStream = null;
let wajahStream = null;

// Mengaktifkan kamera ketika modal KTP dibuka
document.querySelector('[data-modal-target="ktpModal"]').addEventListener('click', async function () {
    const ktpVideo = document.getElementById('ktpVideo');
    try {
        // Meminta akses ke kamera
        ktpStream = await navigator.mediaDevices.getUserMedia({ video: true });
        // Menampilkan video pada elemen <video>
        ktpVideo.srcObject = ktpStream;
    } catch (err) {
        console.error('Gagal mengakses kamera:', err);
    }
});

// Menghentikan kamera ketika modal KTP ditutup
document.querySelector('[data-modal-hide="ktpModal"]').addEventListener('click', function () {
    if (ktpStream) {
        // Menghentikan semua track video
        ktpStream.getTracks().forEach(track => track.stop());
        ktpStream = null;
    }
});

// Mengaktifkan kamera ketika modal Wajah dibuka
document.querySelector('[data-modal-target="wajahModal"]').addEventListener('click', async function () {
    const wajahVideo = document.getElementById('wajahVideo');
    try {
        // Meminta akses ke kamera
        wajahStream = await navigator.mediaDevices.getUserMedia({ video: true });
        // Menampilkan video pada elemen <video>
        wajahVideo.srcObject = wajahStream;
    } catch (err) {
        console.error('Gagal mengakses kamera:', err);
    }
});

// Menghentikan kamera ketika modal Wajah ditutup
document.querySelector('[data-modal-hide="wajahModal"]').addEventListener('click', function () {
    if (wajahStream) {
        // Menghentikan semua track video
        wajahStream.getTracks().forEach(track => track.stop());
        wajahStream = null;
    }
});

// Fungsi untuk menangkap gambar dari video KTP
document.getElementById('ktpCapture').addEventListener('click', function () {
    const canvas = document.getElementById('ktpCanvas');
    const video = document.getElementById('ktpVideo');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    const context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    // Convert to base64
    document.getElementById('ktpInput').value = canvas.toDataURL('image/png');
});

// Fungsi untuk menangkap gambar dari video Wajah
document.getElementById('wajahCapture').addEventListener('click', function () {
    const canvas = document.getElementById('wajahCanvas');
    const video = document.getElementById('wajahVideo');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    const context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    // Convert to base64
    document.getElementById('wajahInput').value = canvas.toDataURL('image/png');
});
