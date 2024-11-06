@extends('layouts.template')
<<<<<<< HEAD
@section('content')
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" data-width="75%" aria-hidden="true"></div>
    <div class="container rounded bg-white border">
        <div class="row" id="profile">
            <div class="col-md-4 border-right">
                <div class="p-3 py-5">

                    <div class="d-flex flex-column align-items-center text-center p-3 "><img class="rounded mt-3 mb-2"
                            width="250px" src=" {{ asset($user->user_foto) }} ">
                    </div>
                    <div onclick="modalAction('{{ url('/profile/' . session('user_id') . '/edit_foto') }}')"
                        class="mt-4 text-center"><button class="btn btn-primary profile-button" type="button">Edit
                            Foto</button></div>
                </div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3 py-4">
                    <div class="d-flex align-items-center">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-3">
                        <table class="table table-bordered table-striped table-hover table-sm">
                            <tr>
                                <th>ID</th>
                                <td>{{ $user->user_id }}</td>
                            </tr>
                            <tr>
                                <th>Level</th>
                                <td>{{ $user->level->level_nama }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $user->nama }}</td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td>********</td>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-3 text-center">
                        <button onclick="modalAction('{{ url('/profile/' . session('user_id') . '/edit_ajax') }}')"
                            class="btn btn-primary profile-button">Edit Profile</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }
    </script>
@endpush
=======

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Profile</h3>
    </div>

    <div class="card-body">
        <!-- Pesan Sukses -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form untuk update profile -->
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama User -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <!-- Foto Profil -->
            <div class="form-group">
                <label for="profile_photo">Profile Photo</label>
                @if($user->profile_photo)
                    <div>
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" width="150" class="img-thumbnail">
                    </div>
                @endif
                <input type="file" class="form-control-file mt-2" id="profile_photo" name="profile_photo">
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
</div>
@endsection
>>>>>>> ce8e93b3395ff72a10ec1939d2f06e9120d0f31e
