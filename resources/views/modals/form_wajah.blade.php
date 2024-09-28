<h1>Webcam Capture and OCR Result</h1>

<!-- Orientation Selection -->
<div>
    <label>
        <input type="radio" name="orientation" value="portrait" checked> Portrait
    </label>
    <label>
        <input type="radio" name="orientation" value="landscape"> Landscape
    </label>
</div>

<!-- Webcam capture section -->
<div class="webcam-capture"></div>
<button id="capture" class="btn btn-success mt-2">Capture</button>
<img id="photo" src="" alt="Captured Image" style="display: none;"/>

<!-- File input for choosing an image -->
<div class="mt-2">
    <label for="image_upload">Or choose an image from your device:</label>
    <input type="file" id="image_upload" accept="image/*">
</div>

<!-- Display OCR result -->
<div id="ocr-result" class="mt-4">
    <h2>OCR Result:</h2>
    <pre id="result-text"></pre>
</div>

<script>
    // Setup WebcamJS
    function updateWebcamSettings() {
        var orientation = document.querySelector('input[name="orientation"]:checked').value;
        var width = orientation === 'portrait' ? 360 : 480;
        var height = orientation === 'portrait' ? 480 : 360;

        Webcam.set({
            width: width,
            height: height,
            image_format: 'jpeg',
            jpeg_quality: 80
        });
        Webcam.attach('.webcam-capture');
    }

    // Initialize with default settings
    updateWebcamSettings();

    // Update settings when orientation changes
    document.querySelectorAll('input[name="orientation"]').forEach(function(radio) {
        radio.addEventListener('change', updateWebcamSettings);
    });

    // Capture button event
    document.getElementById('capture').addEventListener('click', function() {
        Webcam.snap(function(data_uri) {
            // Show the captured image
            var photoElement = document.getElementById('photo');
            photoElement.src = data_uri;
            photoElement.style.display = 'block';

            // Send the captured image to the server
            uploadImage(data_uri);
        });
    });

    // Function to upload image to server
    function uploadImage(imageData) {
        fetch('/upload', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: 'image=' + encodeURIComponent(imageData)
        }).then(response => response.json())
          .then(data => {
              console.log(data);
              if (data.text) {
                  document.getElementById('result-text').textContent = data.text;
              }
          });
    }

    // Event for file input
    document.getElementById('image_upload').addEventListener('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var photoElement = document.getElementById('photo');
                photoElement.src = e.target.result;
                photoElement.style.display = 'block';

                // Send the selected image to the server
                uploadImage(e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
</script>
