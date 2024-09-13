<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index(){

        $data = [
            'nama' => 'Pelanggan Pertama',
        ];
        UserModel::where('username','customer-1')->update($data);//update data user
    //coba akses model UserModel
    $user = UserModel::all();//ambil semua data dari tabel m_user
    return view('user',['data'=> $user]);
}}
