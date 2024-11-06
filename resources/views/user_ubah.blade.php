<!DOCTYPE html>
<html> 
    <head>
        <title>Ubah Data User</title>
    </head>
    <body>

        {{-- Form Ubah Data User --}}
        <h1>Form Ubah Data User</h1>
        <a href="/user">Kembali</a>
        <br><br>

        {{-- Form untuk Ubah User dengan Upload Foto --}}
        <form method="post" action="{{ url('user/ubah_simpan/' . $data->user_id) }}" enctype="multipart/form-data"> {{-- perbaikan URL --}}
        
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" value="{{ $data->username }}">
            <br><br>

            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukkan Nama" value="{{ $data->nama }}">
            <br><br>

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Password" value="{{ $data->password }}">
            <br><br>

            <label>Level ID</label>
            <input type="number" name="level_id" placeholder="Masukkan ID Level" value="{{ $data->level_id }}">
            <br><br>

            {{-- Input untuk Upload Foto --}}
            <label>Upload Foto</label>
            <input type="file" name="user_foto">
            <br><br>

            {{-- Jika foto lama ada, tampilkan preview-nya --}}
            @if ($data->user_foto)
                <label>Foto Saat Ini</label>
                <br>
                <img src="{{ asset('storage/' . $data->user_foto) }}" alt="Foto Profil" width="150px">
                <br><br>
            @endif

            <input type="submit" class="btn btn-success" value="Ubah">
        </form>
    </body>
</html>
