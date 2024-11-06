<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
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

    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);
        $breadcrumb = (object) ['title' => 'Detail User', 'list' => ['Home', 'User', 'Detail']];
        $page = (object) ['title' => 'Detail user'];
        $activeMenu = 'user';
        return view('user.show', compact('breadcrumb', 'page', 'user', 'activeMenu'));
    }

    public function edit_ajax(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::select('level_id', 'level_nama')->get();
        return view('profile.edit_ajax', compact('user', 'level'));
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => 'nullable|integer',
                'username' => 'nullable|max:20|unique:m_user,username,' . $id . ',user_id',
                'nama' => 'nullable|max:100',
                'password' => 'nullable|min:6|max:20',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors(),
                ]);
            }

            $user = UserModel::find($id);
            if ($user) {
                $updateData = $request->only(['level_id', 'username', 'nama']);
                if ($request->filled('password')) {
                    $updateData['password'] = bcrypt($request->password);
                }
                $user->update($updateData);

                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate',
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
            ]);
        }

        return redirect('/');
    }

    public function edit_foto(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::select('level_id', 'level_nama')->get();
        return view('profile.edit_foto', compact('user', 'level'));
    }

    public function update_foto(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'foto' => 'required|mimes:jpeg,png,jpg|max:4096',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors(),
                ]);
            }

            $user = UserModel::find($id);

            if ($user) {
                if ($request->hasFile('foto')) {
                    $oldFoto = $user->foto;
                    if ($oldFoto && Storage::disk('public')->exists($oldFoto)) {
                        Storage::disk('public')->delete($oldFoto);
                    }

                    $file = $request->file('foto');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $path = 'image/profile/';
                    $file->move(public_path($path), $filename);

                    $user->update(['foto' => $path . $filename]);
                }

                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate',
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
            ]);
        }

        return redirect('/');
    }
}
