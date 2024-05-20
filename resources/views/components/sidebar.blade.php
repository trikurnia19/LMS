<div class="col-md-3">
    <div class="card">
        <div class="card-body px-0">
            <div class="card-title text-center">
                <span>Hai,</span>
                <span class="display-5 font-italic">{{ Auth::user()->name }}</span>
            </div>
            
            <hr>

            @can('RoleManagement@index')
            <a href="{{ Route('role.index') }}" class="btn btn-secondary btn-block">Manajemen Hak Akses</a>
            @endcan

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
            <a href="{{ Route ('retireList') }}" class="btn btn-secondary btn-block">  Karyawan Pensiun</a>
            @endcan

            {{-- @can('application.authorize')
            <a href="#" class="btn btn-secondary btn-block"> Cetak SK Pensiun</a>
            @endcan --}}

            @can('application.authorize')
            <a href="{{ Route('rekrut')}}" class="btn btn-secondary btn-block"> Rekrutmen Karyawan</a>
            @endcan

            @can('Vacancy@index')
            <a href="{{ Route('vacancy.index') }}" class="btn btn-secondary btn-block">Manajemen Lowongan</a>
            @endcan

            @can('application.authorize')
            <a href="{{ Route('applierList')}}" class="btn btn-secondary btn-block"> Daftar Pelamar</a>
            @endcan

            @can('application.authorize')
            <a href="{{ Route('applierPassList')}}" class="btn btn-secondary btn-block"> Daftar Pelamar Lulus Test</a>
            @endcan

            @can('application.authorize')
            <a href="{{ Route('actionView') }}" class="btn btn-secondary btn-block">Tindakan</a>
            @endcan

        </div>
    </div>
</div>