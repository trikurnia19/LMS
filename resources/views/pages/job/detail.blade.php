@extends('layouts.app')

@section('content')
<main class="container">
    <div class="row">
@include('components.sidebar')

        <div class="col-md-9 mb-5">
            <div class="container">
                <h2>Daftar Pelamar</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Nama Universitas</th>
                            <th>Jurusan</th>
                            <th>Tahun Lulus</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applier as $applier)
                        <tr>
                            <td>{{ $applier->name }}</td>
                            <td>{{ $applier->birthday}}</td>
                            <td>{{ $applier->address }}</td>
                            <td>{{ $applier->university_name}}</td>
                            <td>{{ $applier->major }}</td>
                            <td>{{ $applier->graduating_year}}</td>
                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-right fixed-bottom mb-4 mr-4">
                    <button class="btn btn-danger" id="back-button" type="button" onclick="history.back()">Kembali</button>
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
