@extends('layouts.app')

@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body px-0">
                    <div class="card-title text-center">
                        <span>Hello,</span>
                        <span class="display-5 font-italic">{{ Auth::user()->name }}</span>
                    </div>

                    <hr>
                    <a href="{{ route('notificationView') }}" class="btn btn-secondary btn-block">
                        <span>Pemberitahuan</span>
                        @php $cn = count(Auth::user()->Unreadnotifications) @endphp
                        @if($cn)<span class="badge badge-primary badge-pill">{{ $cn }}</span> @endif
                    </a>
                    @can('application.create')
                    <a href="{{ Route('applyView') }}" class="btn btn-secondary btn-block">Pengajuan Cuti</a>
                    @endcan
                    @can('application.authorize')
                    <a href="{{ Route('employeeView') }}" class="btn btn-secondary btn-block"> Tambahkan Karyawan</a>
                    @endcan
                    @can('application.authorize')
                    <a href="{{ Route('users') }}" class="btn btn-secondary btn-block"> Daftar Karyawan</a>
                    @endcan
                    @can('application.authorize')
                    <a href="{{ Route ('retireList') }}" class="btn btn-secondary btn-block"> Karyawan Pensiun</a>
                    @endcan
                    @can('application.authorize')
                    <a href="#" class="btn btn-secondary btn-block"> Cetak SK Pensiun</a>
                    @endcan
                    @can('application.authorize')
                    <a href="#" class="btn btn-secondary btn-block"> Rekrutmen Karyawan</a>
                    @endcan
                    @can('application.authorize')
                    <a href="{{ Route('actionView') }}" class="btn btn-secondary btn-block">Tindakan</a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">Edit User</div>
                <div class="card-body">
                    <form action="{{ route('updateUser', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Form fields for editing user details -->
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="birthday">Tanggal Lahir</label>
                            <input type="birthday" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}">
                        </div>
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <input type="gender" class="form-control" id="gender" name="gender" value="{{ $user->gender }}">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Nomor Telepon</label>
                            <input type="phone_number" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="address" class="form-control" id="address" name="address" value="{{ $user->address }}">
                        </div>
                        <!-- Add more form fields as needed -->
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection

@push('css')
<style>
    .display-5 {
        font-size: 1.5rem !important;
    }

</style>
@endpush
