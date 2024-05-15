@extends('layouts.app')

@section('content')
<main class="container">
    <div class="row">
@include('components.sidebar')

        <div class="col-md-9 mb-5">
            <div class="container">
                <h2>Daftar Karyawan Pensiun</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal Pensiun</th>
                            <th>Dokumen</th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{$user->updated_at}}</td>
                            <td>
                                <a href="{{ route('cetakSK', ['name' => $user->name]) }}" class="btn btn-primary">Cetak SK Pensiun</a>
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
