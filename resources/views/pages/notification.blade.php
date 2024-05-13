@extends('layouts.app')

@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body px-0">
                    <div class="card-title text-center">
                        <span>Hello,</span>
                        <span class="display-5 font-italic">{{ Auth::user()->name }}</span>
                    </div>

                    <hr>
                    <a href="{{ route('notificationView') }}" class="btn btn-secondary btn-block">
                        <span>Pemberitahuan</span>
                        @php $cn = count(Auth::user()->Unreadnotifications) @endphp
                        @if($cn)<span class="badge badge-primary badge-pill">{{ $cn }}</span> @endif
                    </a>
                    @can('application.create')
                    <a href="{{ Route('applyView') }}" class="btn btn-secondary btn-block">Pengajuan Cuti</a>
                    @endcan
                    @can('application.authorize')
                    <a href="{{ Route('employeeView') }}" class="btn btn-secondary btn-block"> Tambahkan Karyawan</a>
                    @endcan
                    @can('application.authorize')
                    <a href="{{ Route('users') }}" class="btn btn-secondary btn-block"> Daftar Karyawan</a>
                    @endcan
                    @can('application.authorize')
                    <a href="{{ Route ('retireList') }}" class="btn btn-secondary btn-block"> Karyawan Pensiun</a>
                    @endcan
                    @can('application.authorize')
                    <a href="#" class="btn btn-secondary btn-block"> Cetak SK Pensiun</a>
                    @endcan
                    @can('application.authorize')
                    <a href="#" class="btn btn-secondary btn-block"> Rekrutmen Karyawan</a>
                    @endcan
                    @can('application.authorize')
                    <a href="{{ Route('actionView') }}" class="btn btn-secondary btn-block">Tindakan</a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="col-md-9 mb-5">
            <div class="card">
                <div class="card-header">
                    <span>Pemberitahuan belum dibaca</span>
                    <span class="float-right"><a href="{{ route('markAsRead') }}">Tanda sudah dibaca</a></span><br>
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
