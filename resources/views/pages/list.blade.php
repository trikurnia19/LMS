@extends('layouts.app')

@section('content')
<main class="container">
    <div class="row">
@include('components.sidebar')

        <div class="col-md-9 mb-5">
            <div class="container">
                <h2>Daftar Karyawan</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>E-mail</th>
                            <th>Tindakan</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('editUser', $user->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('deleteUser', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('pensiunkanUser', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">Berhak Pensiun</button>
                                </form>
                            </td>                            
                           
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
