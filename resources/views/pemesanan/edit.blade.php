@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="xyz align-items-center">
                            {{-- <div class="col-12"> --}}
                                <h3 class="mb-4">Form Edit pemesanan</h3>
                            {{-- </div> --}}
                            <p>
                            <form method="POST" action="{{ route('pemesanan.update', $pemesanan->id) }}">
                                @csrf
                                @method('PUT')
                               <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="custom-select" name="kendaraan_id">
                                                <option selected disabled>Nama Kendaraan</option>
                                                @foreach ($kendaraan as $ken)
                                                    <option value="{{ $ken->id }}" {{ $ken->id == $pemesanan->kendaraan_id ? "selected" : "" }}>{{ $ken->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="custom-select" name="supir_id">
                                                <option selected disabled>Nama Supir</option>
                                                @foreach ($supir as $sup)
                                                    <option value="{{ $sup->id }}" {{ $sup->id == $pemesanan->supir_id ? "selected" : "" }}>{{ $sup->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="custom-select" name="peminjam_id">
                                                <option selected disabled>Nama Peminjam</option>
                                                @foreach ($peminjam as $pem)
                                                    <option value="{{ $pem->id }}" {{ $pem->id == $pemesanan->peminjam_id ? "selected" : "" }}>{{ $pem->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input  class="form-control" id="date" value="{{ $pemesanan->tgl_pemesanan }}" name="tgl_pemesanan" placeholder="Tgl Pemesanan">
                                            @if ($errors->has('tgl_pemesanan'))
                                                <div class="text-danger">
                                                    {{ $errors->first('tgl_pemesanan') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @role('admin')
                                <input type="hidden" name="status" value="Diproses">
                                @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="custom-select" name="status">
                                                <option disabled="disabled">Status</option>
                                                <option value="Diprosess" selected>Diprosess</option>
                                                <option value="Disetujui">Disetujui</option>
                                                <option value="Ditolak">Ditolak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endrole
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </form>
                            <div class="card-footer py-4">
                                <nav class="d-flex justify-content-end" aria-label="...">

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                @include('layouts.footers.auth')
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
                $(function() {
                    $("#date").datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true,
                        todayHighlight: true,
                        language: 'id'
                    });
                    $("#date2").datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true,
                        todayHighlight: true,
                        language: 'id'
                    });
                });

            </script>
@endpush
