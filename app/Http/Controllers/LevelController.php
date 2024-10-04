<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\levelModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


// class LevelController extends Controller
// {
    // public function index(){
    //     // DB::insert ('insert into m_level(level_kode,level_nama,created_at) values(?,?,?)',['cus','Pelanggan',now()]);
    //     // return 'Insert data baru berhasil';

    //     // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer','cus']);
    //     // return 'Update data berhasil.Jumlah data yang diupdate: ' .$row.'baris';

    //     // $row = DB::delete('delete from m_level where level_kode = ?',['cus']);
    //     // return 'Delete data berhasil. Jummlah data yang dihapus:  ' . $row. ' baris';

    //     // $data = DB::select('select * from m_level');
    //     // return view ('level',['data' => $data]);


    // }


class LevelController extends Controller
{
    // Display the list of levels
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Level',
            'list'  => ['Home', 'Level']
        ];

        $page = (object) [
            'title' => 'Daftar level yang terdaftar dalam sistem'
        ];

        $activeMenu = 'level';

        return view('level.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    // Fetch level data for DataTables
    public function list(Request $request)
    {
        $levels = levelModel::select('level_id', 'level_kode', 'level_nama');

        return DataTables::of($levels)
            ->addIndexColumn()
            ->addColumn('aksi', function ($level) {
                $btn = '<a href="' . url('/level/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/level/' . $level->level_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/level/' . $level->level_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    // Show the form to add a new level
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Level',
            'list'  => ['Home', 'Level', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah level baru'
        ];

        $activeMenu = 'level';

        return view('level.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    // Store a new level
    public function store(Request $request)
    {
        $request->validate([
            'level_kode' => 'required|string|min:3|unique:m_level,level_kode',
            'level_nama' => 'required|string|max:255'
        ]);

        levelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Data level berhasil disimpan');
    }

    // Show the details of a level
    public function show(string $id)
    {
        $level = levelModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Level',
            'list'  => ['Home', 'Level', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail level'
        ];

        $activeMenu = 'level';

        return view('level.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    // Show the form to edit a level
    public function edit(string $id)
    {
        $level = levelModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Level',
            'list'  => ['Home', 'Level', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit level'
        ];

        $activeMenu = 'level';

        return view('level.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    // Update the level data
    public function update(Request $request, string $id)
    {
        $request->validate([
            'level_kode' => 'required|string|min:3|unique:m_level,level_kode,' . $id . ',level_id',
            'level_nama' => 'required|string|max:255'
        ]);

        levelModel::find($id)->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Data level berhasil diubah');
    }

    // Delete a level
    public function destroy(string $id)
    {
        $check = levelModel::find($id);
        if (!$check) {
            return redirect('/level')->with('error', 'Data level tidak ditemukan');
        }

        try {
            LevelModel::destroy($id);

            return redirect('/level')->with('success', 'Data level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/level')->with('error', 'Data level gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

//-------------------------------- AJAX -----------------------------------------------------------------------

    // Menampilkan halaman form tambah level ajax
    public function create_ajax()
    {
        return view('level.create_ajax'); // Mengarahkan ke view untuk create level ajax
    }

    // Menyimpan data level menggunakan AJAX
    public function store_ajax(Request $request)
    {
        // Cek apakah request berasal dari AJAX atau request JSON
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_kode' => 'required|string|min:3|unique:m_level,level_kode',
                'level_nama' => 'required|string|max:255',
            ];

            // Validasi data request
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                // Jika validasi gagal, kembalikan response JSON dengan pesan error
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            // Jika validasi sukses, simpan data level ke dalam database
            levelModel::create([
                'level_kode' => $request->level_kode,
                'level_nama' => $request->level_nama
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data level berhasil disimpan',
            ]);
        }

        return redirect('/'); // Jika bukan request AJAX, arahkan kembali ke halaman utama
    }

    public function edit_ajax($id)
    {
        $level = levelModel::find($id);

        if (!$level) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan.'
            ]);
        }

        return view('level.edit_ajax', compact('level'));
    }


    // Memperbarui data level menggunakan AJAX
    public function update_ajax(Request $request, $id)
    {
        // Cek apakah request berasal dari AJAX
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_kode' => 'required|string|min:3|unique:m_level,level_kode,' . $id . ',level_id',
                'level_nama' => 'required|string|max:255',
            ];

            // Validasi data request
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors(),
                ]);
            }

            $level = levelModel::find($id);
            if ($level) {
                // Jika level ditemukan, update datanya
                $level->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data level berhasil diupdate'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data level tidak ditemukan'
                ]);
            }
        }

        return redirect('/'); // Jika bukan request AJAX, arahkan kembali ke halaman utama
    }

    // Konfirmasi penghapusan data level menggunakan AJAX
    public function confirm_ajax(string $id)
    {
        $level = levelModel::find($id);

        // Pastikan level ditemukan
        if (!$level) {
            return response()->json([
                'status' => false,
                'message' => 'Level tidak ditemukan.'
            ]);
        }

        // Kirimkan data level ke view konfirmasi
        return view('level.confirm_ajax', ['level' => $level]);
    }

    // Menghapus data level menggunakan AJAX
    public function delete_ajax(Request $request, string $id)
    {
        // Cek apakah request berasal dari AJAX
        if ($request->ajax() || $request->wantsJson()) {
            $level = levelModel::find($id);

            if ($level) {
                // Jika level ditemukan, hapus dari database
                $level->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data level berhasil dihapus',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data level tidak ditemukan',
                ]);
            }
        }

        return redirect('/');
    }

}
