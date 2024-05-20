@extends('layouts.app')

@section('content')
<main class="container">
    <div class="row">
@include('components.sidebar')

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
