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
                            <th>Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applier as $applier)
                        <tr>
                            <td>{{ $applier->name }}</td>
                            <td>{{ $applier->birthday}}</td>
                            <td>
                                
                                <a href="{{ route('applierDetail') }}" class="btn btn-success">Detail</a>
                                <form action="{{ route('lolos', [$applier->id,'executive']) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">Terima</button>
                                </form> 
                                <form action="{{ route('deleteApplier', $applier->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Tolak</button>
                                </form>
                            </td>
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
