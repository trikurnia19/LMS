@extends('layouts.app')

@section('content')
<main class="container">
    <div class="row">
        @include('components.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <form action="{{ isset($vacancy) ? url('vacancy/'.$vacancy->id) : route('vacancy.store') }}" method="POST">
                      @csrf
                      @if (isset($vacancy))
                      @method('PUT')
                      @else

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Judul</label>
                            <div class="col-md-6">
                                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ isset($vacancy) ? $vacancy->title : old('title') }}" required autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="requirements" class="col-md-4 col-form-label text-md-right">Persyaratan</label>
                            <div class="col-md-8">
                                <textarea name="requirements" id="requirements" cols="30" rows="10" required>
                                  @if (isset($vacancy))
                                      {{ $vacancy->requirements }}
                                  @endif
                                </textarea>

                                @error('requirements')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start_date" class="col-md-4 col-form-label text-md-right">Tanggal Mulai</label>
                            <div class="col-md-6">
                                <input type="date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ isset($vacancy) ? $vacancy->start_date : old('start_date') }}" required autofocus>

                                @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end_date" class="col-md-4 col-form-label text-md-right">Tanggal Berakhir</label>
                            <div class="col-md-6">
                                <input type="date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{isset($vacancy) ? $vacancy->end_date : old('end_date') }}" required autofocus>

                                @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                            <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="is_publish">Publish ?</label>
                                    
                                    <div class="col-md-1">
                                        <label class="toggle-switch">
                                        <input type="checkbox" id="is_publish" name="is_publish" value="{{ true }}" @if(isset($vacancy)&&$vacancy->is_publish) checked @endif>
                                        <div class="toggle-switch-background">
                                            <div class="toggle-switch-handle"></div>
                                          </div>       
                                        </label>                             
                                        </div>
                              </div>
                              <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-danger" id="back-button" type="submit" value="Cancel" onclick="history.back()">Kembali</button>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Simpan') }}
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('css')
<style>
.toggle-switch {
  position: relative;
  display: inline-block;
  width: 80px;
  height: 40px;
  cursor: pointer;
}

.toggle-switch input[type="checkbox"] {
  display: none;
}

.toggle-switch-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #ddd;
  border-radius: 20px;
  box-shadow: inset 0 0 0 2px #ccc;
  transition: background-color 0.3s ease-in-out;
}

.toggle-switch-handle {
  position: absolute;
  top: 5px;
  left: 5px;
  width: 30px;
  height: 30px;
  background-color: #fff;
  border-radius: 50%;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease-in-out;
}

.toggle-switch::before {
  content: "";
  position: absolute;
  top: -25px;
  right: -35px;
  font-size: 12px;
  font-weight: bold;
  color: #aaa;
  text-shadow: 1px 1px #fff;
  transition: color 0.3s ease-in-out;
}

.toggle-switch input[type="checkbox"]:checked + .toggle-switch-handle {
  transform: translateX(45px);
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2), 0 0 0 3px #05c46b;
}

.toggle-switch input[type="checkbox"]:checked + .toggle-switch-background {
  background-color: #05c46b;
  box-shadow: inset 0 0 0 2px #04b360;
}

.toggle-switch input[type="checkbox"]:checked + .toggle-switch:before {
  content: "true";
  color: #05c46b;
  right: -15px;
}

.toggle-switch input[type="checkbox"]:checked + .toggle-switch-background .toggle-switch-handle {
  transform: translateX(40px);
}


</style>
@endpush

@push('js')
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('requirements')
</script>
@endpush