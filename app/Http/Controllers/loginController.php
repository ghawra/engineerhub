<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\pelamar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class loginController extends Controller
{

    public function showRegisterForm()
{
    return view('auth.register'); // Ganti 'register' dengan nama view yang sesuai
}

public function showLoginForm()
{
    return view('auth.login'); // Ganti 'login' dengan nama view yang sesuai
}
    // Method untuk register pengguna baru
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:225|unique:user',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:8|confirmed',
            'alamat' => 'required|string|max:255',
            'asal_kota' => 'required|string|max:255', // Pastikan ini sesuai
            'cv' => 'required|file|mimes:pdf,doc,docx', // Ganti string menjadi file
            'ijazah' => 'required|file|mimes:pdf,doc,docx', // Ganti string menjadi file
            'kelamin' => 'required|string|max:255',
            'pengalaman_kerja' => 'required|string|max:255',
            'ktp' => 'required|file|mimes:jpg,png,jpeg', // Ganti string menjadi file
            'foto_muka' => 'required|file|mimes:jpg,png,jpeg', // Ganti string menjadi file
            'ska' => 'required|string|max:255',
            'tanggal' => 'required|date|max:10'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Simpan pengguna
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Simpan pelamar
        $pelamar = pelamar::create([
            'user_id' => $user->id,
            'alamat' => $request->alamat,
            'asal_kota' => $request->asal_kota, // Perbaiki ini
            'cv' => $request->file('cv')->store('cv'), // Simpan file
            'ijazah' => $request->file('ijazah')->store('ijazah'), // Simpan file
            'kelamin' => $request->kelamin,
            'pengalaman_kerja' => $request->pengalaman_kerja,
            'ktp' => $request->file('ktp')->store('ktp'), // Simpan file
            'foto_muka' => $request->file('foto_muka')->store('foto_muka'), // Simpan file
            'ska' => $request->ska
        ]);
    
        Auth::login($user);
    
        return redirect()->route('login')->with('success', 'Registration successful.');
    }
    

    // Method untuk login pengguna
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('pageKosong')->with('success', 'Login successful.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Method untuk logout pengguna
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out.');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|string',
        ]);

        // Decode base64 image data
        $imageData = $request->input('image');
        $image = Image::make($imageData);

        // Buat nama file unik
        $filename = uniqid() . '.jpg';

        // Simpan gambar ke folder public/uploads
        $path = public_path('uploads/' . $filename);
        $image->save($path);

        // Jika ingin menggunakan OCR, ini contoh sederhana (Anda perlu menambahkan logika OCR di sini)
        // $ocrText = $this->processOCR($path);

        return response()->json([
            'success' => true,
            'message' => 'Image uploaded successfully',
            'image_url' => asset('uploads/' . $filename),
            // 'text' => $ocrText, // Jika menggunakan OCR
        ]);
    }
    
}
