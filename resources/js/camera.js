    function startCamera(videoElement) {
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function (stream) {
                videoElement.srcObject = stream;
            })
            .catch(function (err) {
                console.log("Error: " + err);
            });
    }

    // Fungsi untuk menangkap foto dari vide

    function capturePhoto(videoElement, canvasElement, inputElement) {
        const context = canvasElement.getContext('2d');
        context.drawImage(videoElement, 0, 0, canvasElement.width, canvasElement.height);
        const dataURL = canvasElement.toDataURL('image/png');
        inputElement.value = dataURL;
    }

    // Event listener saat tombol "Ambil Foto KTP" ditekan
    document.getElementById('ktpCapture').addEventListener('click', function () {
        const ktpVideo = document.getElementById('ktpVideo');
        const ktpCanvas = document.getElementById('ktpCanvas');
        const ktpInput = document.getElementById('ktpInput');

        ktpCanvas.width = ktpVideo.videoWidth;
        ktpCanvas.height = ktpVideo.videoHeight;
        capturePhoto(ktpVideo, ktpCanvas, ktpInput);

        alert('Foto KTP berhasil diambil');
    });

    // Event listener untuk membuka modal KTP dan mengaktifkan kamera
    document.querySelector('[data-modal-target="ktpModal"]').addEventListener('click', function () {
        const ktpVideo = document.getElementById('ktpVideo');
        startCamera(ktpVideo);
    });

    // Event listener saat tombol "Ambil Foto Wajah" ditekan
    document.getElementById('wajahCapture').addEventListener('click', function () {
        const wajahVideo = document.getElementById('wajahVideo');
        const wajahCanvas = document.getElementById('wajahCanvas');
        const wajahInput = document.getElementById('wajahInput');

        wajahCanvas.width = wajahVideo.videoWidth;
        wajahCanvas.height = wajahVideo.videoHeight;
        capturePhoto(wajahVideo, wajahCanvas, wajahInput);

        alert('Foto Wajah berhasil diambil');
    });

    // Event listener untuk membuka modal Wajah dan mengaktifkan kamera
    document.querySelector('[data-modal-target="wajahModal"]').addEventListener('click', function () {
        const wajahVideo = document.getElementById('wajahVideo');
        startCamera(wajahVideo);
    });

    // Event listener untuk menutup modal KTP
    document.querySelector('[data-modal-hide="ktpModal"]').addEventListener('click', function () {
        const ktpVideo = document.getElementById('ktpVideo');
        let stream = ktpVideo.srcObject;
        let tracks = stream.getTracks();
        tracks.forEach(function (track) {
            track.stop();
        });
        ktpVideo.srcObject = null;
        document.getElementById('ktpModal').classList.add('hidden');
    });

    // Event listener untuk menutup modal Wajah
    document.querySelector('[data-modal-hide="wajahModal"]').addEventListener('click', function () {
        const wajahVideo = document.getElementById('wajahVideo');
        let stream = wajahVideo.srcObject;
        let tracks = stream.getTracks();
        tracks.forEach(function (track) {
            track.stop();
        });
        wajahVideo.srcObject = null;
        document.getElementById('wajahModal').classList.add('hidden');
    });
