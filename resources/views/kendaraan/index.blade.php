@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    {{-- <style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style> --}}

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Kendaraan</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-primary">Tambah Kendaraan</a>
                            </div>
                            <br><br><br>
                            @if (count($kendaraan) > 0)
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Jenis BBM</th>
                                                <th scope="col">BBM AVG</th>
                                                <th scope="col">Tgl Service</th>
                                                <th scope="col">Tgl Dipakai</th>
                                                <th scope="col">Pemilik</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kendaraan as $k)
                                            {{-- {{ dd($k->penjaga->nama_penjaga) }} --}}
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $k->nama }}</td>
                                                    <td>{{ $k->jenis_bbm }}</td>
                                                    <td>{{ $k->avg_bbm }}</td>
                                                    <td>{{ $k->tgl_service }}</td>
                                                    <td>{{ $k->tgl_dipakai }}</td>
                                                    <td>{{ $k->pemilik}}</td>
                                                    <td>{{ $k->status}}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div
                                                                class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item"
                                                                    href="#">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="#">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br />
                                    {{-- Halaman : {{ $gedung->currentPage() }} <br/>
                    Jumlah Data : {{ $gedung->total() }} <br/>
                    Data Per Halaman : {{ $gedung->perPage() }} <br/>


                    {{ $gedung->links() }} --}}

                                </div>
                            @else
                                <br>
                                <div class="col-12 text-center">
                                    <span class="badge badge-warning">Belum ada data</span>
                                </div>
                            @endif
                            <div class="card-footer py-4">
                                <nav class="d-flex justify-content-end" aria-label="...">

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                @include('layouts.footers.auth')
            </div>
        @endsection

        @push('js')
            <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
            <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
            <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        @endpush
