<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index(){

    //     $data = [
    //         'level_id' => 2,
    //         'username' => 'manager_tiga',
    //         'nama' => 'Manager 3',
    //         'password' => Hash::make('12345')
    //     ];

    //     UserModel::create($data);
    $user = UserModel::all();//ambil semua data dari tabel m_user
    // return view('user',['data'=> $user]);

    // $user = UserModel::find(1);
   // $user = UserModel::where('level_id',1)->first();
    // $user = UserModel::firstWhere('level_id',1);
    // $user = UserModel::findOr(1,['username','nama'],function(){
    //     abort(404);
    // });
    // $user = UserModel::findOr(20,['username','nama'],function(){
    //     abort(404);
    // });
    // // $user = UserModel::findOrFail(1);
    // $user=UserModel::where('username','manager9')->firstOrFail();
    // $user = UserModel::where('level_id',2)->count();
    // dd($user);
    // return view('user',['data' => $user]);

    //Menampilkan jumlah pengguna
    // $userCount = UserModel::where('level_id', 2)->count(); // Hitung jumlah pengguna dengan level_id 2


        // $user = UserModel::create(
        //     [
        //         'username' => 'manager11',
        //         'nama'=> 'Manager11',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2,
        //     ],
        //     );
        //     $user->username = 'manager12';

        //     // $user->isDirty(); // true
        //     // $user->isDirty('username'); // true $user->isDirty('nama'); // false $user->isDirty(['nama', 'username']); // true
        //     // $user->isclean(); // false
        //     // $user->isClean ('username'); // false
        //     // $user->isClean ('nama'); // true
        //     // $user->isClean (['nama', 'username']); // false
        
        //     $user->save();
        //     $user->wasChanged();
        //     $user->wasChanged('username');
        //     $user->wasChanged(['username','level_id']);
        //     $user->wasChanged('nama');
        //     dd($user->wasChanged(['nama','username']));
            
            
        //     // $user->isDirty(); // false
        //     // $user->isClean(); // true.

    return view('user', ['data' => $user]); // Kirim hasil ke view

}
    public function tambah(){
        return view('user_tambah');
    }
    public function tambah_simpan(Request $request){
        
        UserModel::create([
            'username' => $request->username,
            'nama' => $request ->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id
        
        ]);
        return redirect('/user');
    }
}