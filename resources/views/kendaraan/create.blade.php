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
                                <h3 class="mb-3">Form Tambah Kendaraan</h3>
                            {{-- </div> --}}
                            <p>
                            <form method="POST" action="{{ route('kendaraan.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nama" placeholder="Nama kendaraan">
                                            @if ($errors->has('nama'))
                                                <div class="text-danger">
                                                    {{ $errors->first('nama') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="custom-select" name="jenis_bbm">
                                                <option selected disabled="disabled">Jenis BBM</option>
                                                <option value="Bensin">Bensin</option>
                                                <option value="Lsitrik">Lsitrik</option>
                                                <option value="Disel">Disel</option>
                                                <option value="Hybrid">Hybrid</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="avg_bbm" placeholder="Konsumsi BBM">
                                            @if ($errors->has('avg_bbm'))
                                                <div class="text-danger">
                                                    {{ $errors->first('avg_bbm') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Tanggal Service" id="date"
                                                    name="tgl_service" type="text">
                                                @if ($errors->has('tgl_service'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('tgl_service') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Tanggal Dipakai" id="date2"
                                                    name="tgl_dipakai" type="text">
                                                @if ($errors->has('tgl_dipakai'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('tgl_dipakai') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="custom-select" name="pemilik">
                                                <option selected disabled="disabled">Pemilik</option>
                                                <option value="Perusahaan">Perusahaan</option>
                                                <option value="Penyewaan">Penyewaan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="custom-select" name="status">
                                                <option selected disabled="disabled">Status</option>
                                                <option value="Dipakai">Dipakai</option>
                                                <option value="Tersedia">Tersedia</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success">Tambahkan</button>
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
