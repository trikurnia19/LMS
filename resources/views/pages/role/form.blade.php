@extends('layouts.app')

@section('content')
<main class="container">
    <div class="row">
        @include('components.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <button class="btn btn-danger" id="back-button" type="submit" value="Cancel" onclick="history.back()">Kembali</button>

                    <form action="{{ $title=='Update role' ? route('role.update',$role->id) : route('role.store') }}" method="POST">
                        @csrf
                        @if ($title=='Update role')
                            @method('PUT')
                          @endif
                          <div class="form-grup row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>
                            <div class="col-md-6">
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $title=='Update role' ? $role->name : old('name') }}" required autofocus>

                                @error('name')
                                <span class="invalid-feedback" title="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        
                        <div class="form-group row p-4">
                            @foreach ($permissions as $item)
                                <div class="form-check col-md-4">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="permission_{{ $item->id }}" name="permissions[]" @if($title=='Update role'&&$role->hasPermissionTo($item->id)) checked @endif>
                                    <label class="form-check-label" for="permission_{{ $item->id }}">
                                      {{ $item->name }}
                                    </label>
                                  </div>
                            @endforeach
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection