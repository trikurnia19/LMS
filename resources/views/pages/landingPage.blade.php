@extends('layouts.app')

@section('content')
<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="card-header col-md-12">
            <h5 class="card-title">Informasi Lowongan Pekerjaan</h5>
        </div>
        <div class="card-body col-md-12 row text-center pt-4 pl-5 pr-5">
            @foreach ($vacancies as $item)
                <div class="card col-md-4 col-xs-5 p-3">
                    <img src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18f7c856ef1%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18f7c856ef1%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1937484741211%22%20y%3D%2296.24000034332275%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="" class="card-img-top">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text text-break">
                        <div class="requirements-content">
                            {!! Str::limit($item->requirements, 100) !!}
                            <a href="javascript:void(0);" class="read-more" data-id="{{ $loop->index }}">Read More</a>
                        </div>
                        <div class="full-requirements-content d-none">
                            {!! $item->requirements !!}
                            <a href="javascript:void(0);" class="read-less" data-id="{{ $loop->index }}">Read Less</a>
                        </div>
                    </p>
                    <a href="{{ route('vacancy.show',$item->id) }}" class="btn btn-primary">Lamar Sekarang</a>
                </div>
            @endforeach
            @if (count($vacancies) <= 0)
                <p class="card-text">
                    Tidak ada lowongan saat ini
                </p>
            @endif

        </div>
    </div>
</main>
@endsection

@push('css')
@endpush

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.read-more').forEach(function (btn) {
            btn.addEventListener('click', function () {
                let index = this.getAttribute('data-id');
                document.querySelectorAll('.requirements-content')[index].classList.add('d-none');
                document.querySelectorAll('.full-requirements-content')[index].classList.remove('d-none');
                });
        });

        document.querySelectorAll('.read-less').forEach(function (btn) {
            btn.addEventListener('click', function () {
                let index = this.getAttribute('data-id');
                document.querySelectorAll('.requirements-content')[index].classList.remove('d-none');
                document.querySelectorAll('.full-requirements-content')[index].classList.add('d-none');
            });
        });
    });
</script>
@endpush
