<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;

class ocrController extends Controller
{
    public function index()
    {
        return view('ocr');
    }

    public function upload(Request $request)
    {
        // Mendapatkan data gambar dari request
        $imageData = $request->input('image');

        // Menghilangkan bagian header dari data URI
        $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $image = base64_decode($imageData);

        // Menyimpan gambar ke folder public
        $filePath = public_path('captured-image.jpg');
        file_put_contents($filePath, $image);

        // Proses OCR
        $text = (new TesseractOCR($filePath))->run();

        // Mengembalikan hasil OCR dalam format JSON
        return response()->json(['text' => $text]);
    }
}
