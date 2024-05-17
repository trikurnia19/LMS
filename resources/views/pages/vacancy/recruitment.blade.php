@extends('layouts.app')

@section('content')
<main class="container mt-5">
    <div class="row justify-content-center">
        <h5 class="card-title">{{ $vacancy->title }}</h5>
    </div>
</main>
@endsection