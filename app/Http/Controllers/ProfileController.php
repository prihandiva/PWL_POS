<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        // Mendapatkan user yang sedang login
        $user = auth()->user();

        // Menampilkan halaman profil
        return view('profile.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimum 2MB
        ]);

        $user = auth()->user();
        $user->name = $request->name;

        // Proses upload foto profil
        if ($request->hasFile('profile_photo')) {
            // Simpan foto ke storage
            $path = $request->file('profile_photo')->store('profile_photos', 'public');

            // Hapus foto lama jika ada
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Simpan path foto baru
            $user->profile_photo = $path;
        }

        // Simpan perubahan ke database
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
