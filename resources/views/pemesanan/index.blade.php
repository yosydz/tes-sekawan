@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Data Pemesanan</h3>
                            </div>
                            <div class="col text-right">
                                @role('admin')
                                <a href="{{ route('pemesanan.create') }}" class="btn btn-sm btn-primary">Tambah Data Pemesanan</a>
                                @endrole
                            </div>
                        </div>
                    </div>
                    @if (count($pemesanan) > 0)
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Peminjam</th>
                                        <th scope="col">Nama Kendaraan</th>
                                        <th scope="col">Nama Supir</th>
                                        <th scope="col">Tgl Pemesanan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemesanan as $k)
                                    {{-- {{ dd($k->penjaga->nama_penjaga) }} --}}
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $k->nama_peminjam }}</td>
                                            <td>{{ $k->nama_kendaraan }}</td>
                                            <td>{{ $k->nama_supir }}</td>
                                            <td>{{ $k->tgl_pemesanan }}</td>
                                            <td>{{ $k->status }}</td>
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
                                                            href="{{ route('pemesanan.edit', $k->id) }}">Edit</a>
                                                        @role('admin')
                                                        <form class="d-inline" method="POST" action="{{ route('pemesanan.destroy', $k->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                             <button type="submit" class="dropdown-item">Delete</button>
                                                        </form>
                                                        @endrole
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <br>
                        <div class="col-12 text-center">
                            <span class="badge badge-warning mb-5">Belum ada data</span>
                        </div>
                    @endif
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
