@extends('layouts.app')

@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body px-0">
                    <div class="card-title text-center">
                        <span>Hai,</span>
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
                    <a href="#" class="btn btn-secondary btn-block"> Pensiun Karyawan</a>
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
                            <span class="display-5">Pengajuan Tertunda</span>
                        </div>
                    
                        <div class="card-body">
                            @forelse ($applications as $application)
                                <x-preview.application :application='$application' />
                                <x-modal.application :application='$application' />
                            @empty
                                <p>Data tidak tersedia</p>
                            @endforelse
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
