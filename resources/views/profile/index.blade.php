@extends('layouts.template')

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
