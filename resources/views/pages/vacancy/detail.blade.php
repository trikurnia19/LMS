@extends('layouts.app')

@section('content')
<main class="container">
    <div class="row">
        @include('components.sidebar')

        <div class="col-md-9 mb-5">
            <div class="container">
                <h2>Detail Lowongan</h2>
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>{{ $vacancy->title }}</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Publish:</strong> {{ $vacancy->is_publish ? 'Ya' : 'Tidak' }}</p>
                        <p><strong>Tanggal Mulai:</strong> {{ $vacancy->start_date }}</p>
                        <p><strong>Tanggal Berakhir:</strong> {{ $vacancy->end_date }}</p>
                        <p><strong>Persyaratan:</strong> {{ $vacancy->requirements }}</p>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-danger" onclick="history.back()">Kembali</button>
                    </div>
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
