<!DOCTYPE html>
<html> 
    <head>
        <title>Data user Pengguna</title>
    </head>
    <body>
        {{-- //Tampilkan Data user --}}
        <h1>Data user Pengguna</h1>
        <a href="PWL_POS/public/user/tambah">+ Tambah User</a>{{--//perbaikan error--}}
        <br>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama user</th>
                <th>ID Leevel user</th>
                <th>Kode Level</th>
                <th>Nama Level</th>
                <th>Aksi</th>
            </tr>
            @foreach ($data as $d)
            <tr>
            <td>{{ $d->user_id}}</td>
                <td>{{ $d->username}}</td>
                <td>{{ $d->nama}}</td>
                <td>{{ $d->level_id}}</td>
                <td>{{ $d->level->level_kode}}</td>
                <td>{{ $d->level->level_nama}}</td>
                <td><a href="PWL_POS/public/user/ubah/{{$d->user_id}}">Ubah || </a><a href="PWL_POS/public/user/hapus/{{$d->user_id}}">Hapus</a></td>{{--//perbaikan error--}}
            </tr>
           @endforeach
        </table> 

        {{-- <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>Jumlah Pengguna</th>
                
            </tr>
            <tr>
                <td>{{ $data}}</td>
            </tr>
           
        </table>--}}
    </body>
</html>