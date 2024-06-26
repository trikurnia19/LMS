<!-- Modal -->
<div class="modal fade" id="modal{{ $application->id }}" tabindex="-1" role="dialog" aria-labelledby="CenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LongTitle">Detail Pengajuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body py-0">
                {{-- <div class="row">
                    <div class="col-3 text-right">
                        <h5>Key</h5>
                    </div>
                    <div class="col-9">
                        <h5>Value</h5>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-3 text-right">Pemohon</div>
                    <div class="col-9">{{ $application->applier_name }}</div>
                </div>
                <div class="row">
                    <div class="col-3 text-right">Periode</div>
                    <div class="col-9">{{ $application->start_date }} @if ($application->end_date)
                        - {{ $application->end_date }} @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 text-right">Lama</div>
                    <div class="col-9">
                        {{ $application->duration }} hari
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 text-right">Jenis</div>
                    <div class="col-9">
                        {{ $application->leave_type }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 text-right">Keperluan</div>
                    <div class="col-9">
                        <details>
                            <summary title="Click to view details">{{ $application->reason }}</summary>
                            <p class="text-muted">{{ $application->information }}</p>
                        </details>
                    </div>
                </div>
                <form method="POST" action="{{ Route('update', [$application->id]) }}">
                    @csrf

                    <!-- ./Remarks -->
                    <div class="form-group row">
                        <label for="remarks" class="col-3 col-form-label text-md-right text-md">Catatan</label>
                        <div class="col-9">
                            <textarea class="form-control" id="remarks" name="remarks" rows="5"
                                placeholder="Tuliskan catatan ..."></textarea>
                        </div>
                    </div>
                    <!-- ./Remarks -->

                    <button type="submit" class="btn btn-primary float-right ml-2" name="approved">Menyetujui</button>
                    <button type="submit" class="btn btn-danger float-right" name="rejected">Menolak</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
