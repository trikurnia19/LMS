@extends('layouts.app')

@section('content')
<main class="container">
    <div class="row">
@include('components.sidebar')

        <div class="col-md-9 mb-5">
            <div class="card">
                <div class="card-header">
                    <span>Pemberitahuan belum dibaca</span>
                    <span class="float-right"><a href="{{ route('markAsRead') }}">Tandai sudah dibaca</a></span><br>
                </div>

                <div class="card-body p-0">
                    <ul class="list-group">
                        @forelse (Auth::user()->UnreadNotifications as $notification)
                        <li class="list-group-item">{{ $notification->data['data'] }}</li>
                        @empty
                        <li class="list-group-item">Tidak ada pemberitahuan baru</li>                        
                        @endforelse
                    </ul>
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
