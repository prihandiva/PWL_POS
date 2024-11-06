@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Profil Pengguna</h3>
    </div>
    
    <div class="card-body">
        <!-- Tampilkan Data User -->
        <table class="table table-bordered table-sm table-striped">
            <tr>
                <th>ID Pengguna</th>
                <td>{{ $user->user_id }}</td>
            </tr>
            <tr>
                <th>Username</th>
                <td>{{ $user->username }}</td>
            </tr>
            <tr>
                <th>Nama Pengguna</th>
                <td>{{ $user->nama }}</td>
            </tr>
            <tr>
                <th>ID Level</th>
                <td>{{ $user->level_id }}</td>
            </tr>
            <tr>
                <th>Kode Level</th>
                <td>{{ $user->level->level_kode }}</td>
            </tr>
            <tr>
                <th>Nama Level</th>
                <td>{{ $user->level->level_nama }}</td>
            </tr>
            <tr>
                <th>Foto Profil</th>
                <td>
                    @if($user->user_foto)
                        <img src="{{ asset('images/profile/' . $user->user_foto) }}" alt="Foto Profil" width="150px">
                    @else
                        <p>Foto belum tersedia</p>
                    @endif
                </td>
            </tr>
        </table>
        
        <!-- Tautan Edit Profil -->
        <a href="{{ url('/user' . $user->user_id) }}" class="btn btn-warning mt-1">Kembali</a>
    </div>
</div>
@endsection
