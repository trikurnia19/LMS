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
                        <a href="{{ Route('role.create') }}" class="btn btn-primary">Tambah Role</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td class="text-center">
                                <div class="row text-center">
                                    <div class="col-md-6 text-right">
                                        <a href="{{ url('role/'.$role->id.'/edit/') }}">
                                        <button class="btn btn-primary">
                                            Edit
                                        </button>
                                    </a>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <form action="{{ url('role/'.$role->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" value="Delete">Delete</button>
                                        </form>
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
