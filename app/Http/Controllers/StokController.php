<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\suppliermodel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Barryvdh\DomPDF\Facade\Pdf;


class StokController extends Controller
{
    
    public function index(){
        $breadcrumb = (object)[
            'title'=>'Daftar stok',
            'list'=>['Home','stok']
        ];
        $page =(object)[
            'title'=>'Daftar stok yang terdaftar dalam sistem'
        ];
        $activeMenu ='stok';
        $stok = Stokmodel::all();
        $barang = BarangModel::all();
        $user = UserModel::all();
        return view('stok.index',['breadcrumb'=>$breadcrumb,'page'=>$page,'stok'=>$stok,'barang'=>$barang,'user'=>$user, 'activeMenu' =>$activeMenu]);
    }

    public function list(Request $request)
    {
        $stoks = StokModel::select('stok_id', 'supplier_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah')
            ->with(['supplier', 'barang', 'user']);

        //Filter data user berdasarkan level_id
        if ($request->barang_id) {
            $stoks->where('barang_id', $request->barang_id);
        }

        //Filter data user berdasarkan level_id
        if ($request->supplier_id) {
            $stoks->where('supplier_id', $request->supplier_id);
        }

        // Return data untuk DataTables
        return DataTables::of($stoks)
            ->addIndexColumn() // menambahkan kolom index / nomor urut
            ->addColumn('aksi', function ($stok) {
                // Menambahkan kolom aksi untuk edit, detail, dan hapus
                // $btn = '<a href="' . url('/stok/' . $stok->stok_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                // $btn .= '<a href="' . url('/stok/' . $stok->stok_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                // $btn .= '<form class="d-inline-block" method="POST" action="' . url('/stok/' . $stok->stok_id) . '">'
                //     . csrf_field() . method_field('DELETE') .
                //     '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                // return $btn;
                $btn = '<button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';

                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi berisi HTML
            ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title'=>'Tambah stok',
            'list'=>['Home','stok','tambah']
        ];
        $page = (object)[
            'title'=>'Tambah stok baru'
        ];
        $activeMenu = 'stok';
        $stok = suppliermodel::all();
        return view('stok.create',['breadcrumb'=>$breadcrumb,'page'=>$page,'activeMenu'=>$activeMenu,'stok'=>$stok]);
    }


    public function store(Request $request){
        $request->validate([
            'supplier_id'=>'required|string',
            'barang_id'=>'required|string|max:100',
            'user_id'=>'required|string|max:100',
            'stok_tanggal'=>'required|datetime',
            'stok_jumlah'=>'required|int',
        ]);
        suppliermodel::create([
            'supplier_id'=>$request->supplier_id,
            'barang_id'=>$request->barang_id,
            'user_id'=>$request->user_id,
            'stok_tanggal'=>$request->stok_tanggal,
            'stok_jumlah'=>$request->stok_jumlah,
        ]);
        return redirect('/stok')->with('success','Data stok berhasil disimpan');
    }

    public function create_ajax()
    {
        $barang = BarangModel::select('barang_id', 'barang_nama')->get();
        $supplier = SupplierModel::select('supplier_id', 'supplier_nama')->get();
        $user = UserModel::select('user_id', 'nama')->get();

        return view('stok.create_ajax')->with([
            'barang' => $barang,
            'supplier' => $supplier,
            'user' => $user,
        ]);
    }
    public function store_ajax(Request $request)
    {
        // cek apakah request berupa ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'supplier_id'=>'required|string',
                'barang_id'=>'required|string|max:100',
                'user_id'=>'required|string|max:100',
                'stok_tanggal'=>'required',
                'stok_jumlah'=>'required|int',
            ];
            // use Illuminate\Support\Facades\Validator;
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // response status, false: error/gagal, true: berhasil
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors() // pesan error validasi
                ]);
            }
            StokModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data supplier berhasil disimpan'
            ]);
        }
        return redirect('/');
    }

    public function show(string $id)
    {
        $stok = StokModel::with(['supplier', 'barang', 'user'])->find($id)->get(); // tambahkan 'barang' dan 'user'
        if (!$stok) {
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan');
        }
    
        $breadcrumb = (object) ['title' => 'Detail stok', 'list' => ['Home', 'stok', 'Detail']];
        $page = (object) ['title' => 'Detail stok'];
        $activeMenu = 'stok';
        
        return view('stok.show', compact('breadcrumb', 'page', 'stok', 'activeMenu'));
    }
    


    public function show_ajax( $id)
    {
        $stok = StokModel::with(['supplier', 'barang', 'user'])->find($id);
        $barang = BarangModel::all();
        $supplier = SupplierModel::all();
        $user = UserModel::all();

        return view('stok.show_ajax',compact('stok','barang','supplier','user'));


        if ($stok) {
            return response()->json([
                'status' => true,
                'data' => compact('stok','barang','supplier','user'),
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
            ]);
        }
    }
    

    

    public function edit(string $stok_id){
        $stok = StokModel::find($stok_id)->with('user','barang','supplier')->get();
        $breadcrumb = (object)[
            'title'=>'Edit stok',
            'list'=>['Home','stok','edit']
        ];
        $page = (object)[
            'title' => 'Edit stok'
        ];
        $activeMenu = 'stok';
        return view('stok.edit',['breadcrumb'=>$breadcrumb,'page'=>$page,'stok'=>$stok,'activeMenu'=>$activeMenu]);
    }


    public function edit_ajax($id)
    {
        $stok = StokModel::with(['supplier', 'barang', 'user'])->find($id);
        $barang = BarangModel::all();
        $supplier = SupplierModel::all();
        $user = UserModel::all();
        
        return view('stok.edit_ajax',compact('stok','barang','supplier','user'));
    }

    public function update(Request $request, string $stok_id){
        $request->validate([
            'stok_tanggal'=>'required|datetime',
            'stok_jumlah'=>'required|int',
        ]);
        $supplier = suppliermodel::find($stok_id);
        $supplier->update([
            'stok_tanggal'=>$request->stok_tanggal,
            'stok_jumlah'=>$request->stok_jumlah,
        ]);
        return redirect('/stok')->with('success','Data stok berhasil diperbarui');
    }

    
    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'stok_tanggal'=>'required',
                'stok_jumlah'=>'required|int',
            ];
            
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }
            $stok = StokModel::find($id);
            if ($stok) {
                $stok->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate',
                    'data' => $stok
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

    public function destroy(string $stok_id){
        $check = StokModel::find($stok_id);
        if (!$check) {
            return redirect('/stok')->with('error', 'Data level tidak ditemukan');
        }
        try {
            StokModel::destroy($stok_id);
            return redirect('/stok')->with('success', 'Data level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/stok')->with('error', 'Data level gagal dhapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    public function confirm_ajax($id)
    {
        $stok = StokModel::find($id);
        return view('stok.confirm_ajax', ['stok' => $stok]);
    }


    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {

            $stok = StokModel::find($id);
            if ($stok) { // jika sudah ditemuikan
                $stok->delete(); // stok di hapus
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil dihapus',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ]);
            }
        }
        return redirect('/');
    }


    public function import()
    {
        return view('stok.import');
    }
    public function import_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                // validasi file harus xls atau xlsx, max 1MB
                'file_stok' => ['required', 'mimes:xlsx', 'max:1024']
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }
            $file = $request->file('file_stok'); // ambil file dari request
            $reader = IOFactory::createReader('Xlsx'); // load reader file excel
            $reader->setReadDataOnly(true); // hanya membaca data
            $spreadsheet = $reader->load($file->getRealPath()); // load file excel
            $sheet = $spreadsheet->getActiveSheet(); // ambil sheet yang aktif
            $data = $sheet->toArray(null, false, true, true); // ambil data excel
            $insert = [];
            if (count($data) > 1) { // jika data lebih dari 1 baris
                foreach ($data as $baris => $value) {
                    if ($baris > 1) { // baris ke 1 adalah header, maka lewati
                        $insert[] = [
                            'supplier_id' => $value['A'],
                            'barang_id' => $value['B'],
                            'user_id' => $value['C'],
                            'stok_tanggal' => $value['D'],
                            'stok_jumlah' => $value['E'],
                            'created_at' => now(),
                        ];
                    }
                }
                if (count($insert) > 0) {
                    // insert data ke database, jika data sudah ada, maka diabaikan
                    SupplierModel::insertOrIgnore($insert);
                }
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diimport'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Tidak ada data yang diimport'
                ]);
            }
        }
        return redirect('/');
    }

    public function export_excel()
    {
        $stok = StokModel::select( 'supplier_id', 'barang_id', 'user_id','stok_tanggal','stok_jumlah')
            ->get();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); //ambil sheet yang aktif
        // Set Header Kolom
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'supplier id');
        $sheet->setCellValue('C1', 'barang id');
        $sheet->setCellValue('D1', 'user id');
        $sheet->setCellValue('E1', 'stok tanggal');
        $sheet->setCellValue('F1', 'stok jumlah');
        // Buat header menjadi bold
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
        $no = 1; // Nomor data dimulai dari 1
        $baris = 2; // Baris data dimulai dari baris ke-2
        foreach ($stok as $key => $value) {
            $sheet->setCellValue('A' . $baris, $no);
            $sheet->setCellValue('B' . $baris, $value->supplier_id);
            $sheet->setCellValue('C' . $baris, $value->barang_id);
            $sheet->setCellValue('D' . $baris, $value->user_id);
            $sheet->setCellValue('E' . $baris, $value->stok_tanggal);
            $sheet->setCellValue('F' . $baris, $value->stok_jumlah);
            $baris++;
            $no++;
        }
        // Set ukuran kolom otomatis untuk semua kolom
        foreach (range('A', 'F') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
        // Set judul sheet
        $sheet->setTitle('Data supplier');
        // Buat writer
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'Data stok ' . date('Y-m-d H:i:s') . '.xlsx';
        // Atur Header untuk Download File Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');
        // Simpan file dan kirim ke output
        $writer->save('php://output');
        exit;
    }

    public function export_pdf() {
        set_time_limit(600);
        $stok = StokModel::select('supplier_id', 'stok_tanggal', 'stok_jumlah', 'user_id', 'barang_id')
                                                                                                ->orderBy('supplier_id')
                                                                                                ->orderBy('stok_tanggal')
                                                                                                ->with('supplier')
                                                                                                ->get();
    
        // use Barryvdh\DomPDF\Facade\Pdf;
        $pdf = Pdf::loadView('stok.export_pdf', ['stok' => $stok]);
    
        $pdf->setPaper('a4', 'portrait'); // set ukuran kertas dan orientasi
        $pdf->setOption("isRemoteEnabled", true); // set true jika ada gambar dari uri
        $pdf->render();
    
        return $pdf->stream('Data stok '.date('Y-m-d H:i:s').'.pdf');
    }    
}