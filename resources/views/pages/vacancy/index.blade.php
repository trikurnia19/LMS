@extends('layouts.app')

@section('content')
<main class="container">
    <div class="row">
        @include('components.sidebar')

        <div class="col-md-9 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Daftar Lowongan</h2>
                    </div>
                    <div class="col-md-8 text-right">
                        <a href="{{ Route('vacancy.create') }}" class="btn btn-primary">Buat Lowongan</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul Lowongan</th>
                            <th>Publish</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vacancies as $vacancy)
                        <tr>
                            <td>{{ $vacancy->title }}</td>
                            <td>{{ $vacancy->is_publish ? 'Ya' : 'Tidak' }}</td>
                            <td>{{ $vacancy->start_date }}</td>
                            <td>{{ $vacancy->end_date }}</td>
                            <td>
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <a href="{{ url('vacancy/'.$vacancy->id.'/edit/') }}">
                                        <button class="btn btn-primary">
                                            Edit
                                        </button>
                                    </a>
                                    </div>
                                    <div class="col-md-4">
                                        <form action="{{ url('vacancy/'.$vacancy->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" value="Delete">Delete</button>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('detail', $vacancy->id) }}">
                                            <button class="btn btn-info">Detail</button>
                                        </a>
                                    </div>
                                </div>
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
