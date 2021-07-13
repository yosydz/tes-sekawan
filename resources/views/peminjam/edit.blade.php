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
                                <h3 class="mb-4">Form Edit Peminjam</h3>
                            {{-- </div> --}}
                            <p>
                            <form method="POST" action="{{ route('peminjam.update', $peminjam->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" class="form-control" value="{{ $peminjam->nama }}" name="nama" placeholder="Nama peminjam">
                                            @if ($errors->has('nama'))
                                                <div class="text-danger">
                                                    {{ $errors->first('nama') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" value="{{ $peminjam->email }}" name="email" placeholder="Email">
                                            @if ($errors->has('email'))
                                                <div class="text-danger">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Jabatan</label>
                                            <input type="text" class="form-control" value="{{ $peminjam->jabatan }}" name="jabatan" placeholder="Jabatan">
                                            @if ($errors->has('jabatan'))
                                                <div class="text-danger">
                                                    {{ $errors->first('jabatan') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Umur</label>
                                            <input type="text" class="form-control" value="{{ $peminjam->umur }}" name="umur" placeholder="Umur">
                                            @if ($errors->has('umur'))
                                                <div class="text-danger">
                                                    {{ $errors->first('umur') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
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
@endpush
