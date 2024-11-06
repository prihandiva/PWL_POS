<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
=======
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
>>>>>>> ce8e93b3395ff72a10ec1939d2f06e9120d0f31e

class ProfileController extends Controller
{
    public function index()
<<<<<<< HEAD
{
    $user = auth()->user(); // Ambil user yang sedang login

    if (!$user) {
        return redirect()->route('login')->withErrors('Please log in first.'); // Redirect ke halaman login jika user null
    }

    $activeMenu = 'profile';
    $breadcrumb = (object) [
        'title' => 'Profile',
        'list' => ['User', 'Profile']
    ];

    return view('user.profile', compact('user', 'activeMenu', 'breadcrumb'));
}

    // public function index()
    // {
    //     $id = session('user_id');
    //     $breadcrumb = (object) [
    //         'title' => 'Profile',
    //         'list' => ['Home', 'Profile']
    //     ];
    //     $page = (object) [
    //         'title' => 'Profile Anda'
    //     ];
    //     $activeMenu = 'profile'; // set menu yang sedang aktif
    //     $user = UserModel::with('level')->find($id);
    //     $level = LevelModel::all(); // ambil data level untuk filter level
    //     return view('profile.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'user' => $user, 'activeMenu' => $activeMenu]);
    // }

    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);
        $breadcrumb = (object) ['title' => 'Detail User', 'list' => ['Home', 'User', 'Detail']];
        $page = (object) ['title' => 'Detail user'];
        $activeMenu = 'user'; // set menu yang sedang aktif
        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function edit_ajax(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::select('level_id', 'level_nama')->get();
        return view('profile.edit_ajax', ['user' => $user, 'level' => $level]);
    }

    public function update_ajax(Request $request, $id)
    {
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => 'nullable|integer',
                'username' => 'nullable|max:20|unique:m_user,username,' . $id . ',user_id',
                'nama' => 'nullable|max:100',
                'password' => 'nullable|min:6|max:20'
            ];
            // use Illuminate\Support\Facades\Validator;
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // respon json, true: berhasil, false: gagal
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors() // menunjukkan field mana yang error
                ]);
            }
            $check = UserModel::find($id);
            if ($check) {
                if (!$request->filled('level_id')) { // jika password tidak diisi, maka hapus dari request
                    $request->request->remove('level_id');
                }
                if (!$request->filled('username')) { // jika password tidak diisi, maka hapus dari request
                    $request->request->remove('username');
                }
                if (!$request->filled('nama')) { // jika password tidak diisi, maka hapus dari request
                    $request->request->remove('nama');
                }
                if (!$request->filled('password')) { // jika password tidak diisi, maka hapus dari request
                    $request->request->remove('password');
                }
                $check->update([
                    'username'  => $request->username,
                    'nama'      => $request->nama,
                    'password'  => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
                    'level_id'  => $request->level_id
                ]);
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }

    public function edit_foto(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::select('level_id', 'level_nama')->get();
        return view('profile.edit_foto', ['user' => $user, 'level' => $level]);
    }

    public function update_foto(Request $request, $id)
    {
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'foto'   => 'required|mimes:jpeg,png,jpg|max:4096'
            ];
            // use Illuminate\Support\Facades\Validator;
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // respon json, true: berhasil, false: gagal
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors() // menunjukkan field mana yang error
                ]);
            }
            $check = UserModel::find($id);
            if ($check) {
                if ($request->has('foto')) {

                    if (isset($check->foto)) {
                        $fileold = $check->foto;
                        if (Storage::disk('public')->exists($fileold)) {
                            Storage::disk('public')->delete($fileold);
                        }
                        $file = $request->file('foto');
                        $filename = $check->foto;
                        $path = 'image/profile/';
                        $file->move($path, $filename);
                        $pathname = $filename;
                    } else {
                        $file = $request->file('foto');
                        $extension = $file->getClientOriginalExtension();

                        $filename = time() . '.' . $extension;

                        $path = 'image/profile/';
                        $file->move($path, $filename);
                        $pathname = $path . $filename;
                    }
                }
                $check->update([
                    'foto'      => $pathname
                ]);
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }
}
=======
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
>>>>>>> ce8e93b3395ff72a10ec1939d2f06e9120d0f31e
