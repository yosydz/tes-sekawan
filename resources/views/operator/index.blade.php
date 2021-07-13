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
                                <h3 class="mb-0">Data Operator</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('operator.create') }}" class="btn btn-sm btn-primary">Tambah Data Operator</a>
                            </div>
                        </div>
                    </div>
                    @if (count($operator) > 0)
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">email</th>
                                        <th scope="col">Tgl Verifikasi</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($operator as $k)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $k->name }}</td>
                                            <td>{{ $k->email }}</td>
                                            <td>{{ $k->email_verified_at }}</td>
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
                                                            href="{{ route('operator.edit', $k->id) }}">Edit</a>
                                                        <form class="d-inline" method="POST" action="{{ route('operator.destroy', $k->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                             <button type="submit" class="dropdown-item">Delete</button>
                                                        </form>
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
                            <span class="badge badge-warning">Belum ada data</span>
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
