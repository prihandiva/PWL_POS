<!DOCTYPE html>
<html> 
    <head>
        <title>Data user Pengguna</title>
    </head>
    <body>
        {{-- //Tampilkan Data user --}}
        <h1>Data user Pengguna</h1>
        <a href="/user/tambah">+ Tambah User</a>
        <br>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama user</th>
                <th>ID Leevel user</th>
                <th>Aksi</th>
            </tr>
            @foreach ($data as $d)
            <tr>
            <td>{{ $d->user_id}}</td>
                <td>{{ $d->username}}</td>
                <td>{{ $d->nama}}</td>
                <td>{{ $d->level_id}}</td>
                <td><a href="/user/ubah/{{$d->user_id}}">Ubah || </a><a href="/user/hapus/{{$d->user_id}}">Hapus</a></td>
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