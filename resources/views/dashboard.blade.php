@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">

                                <img src="{{ asset('images') }}/logo.png" />

                            </div>
                        </div>
                        <div class="row align-item-left">
                            <div class="col">
                                <h2 class="text-white mb-0">Bagian Umum</h2>
                                <h5 class="text-white ls-1 mb-1 text-align-right">Subag Rumah Tangga BUK UB, lt.4 Gedung Rektorat UB</h5>

                                <br>
                                <h3 class="text-white mb-0">Bagaimana cara meminjam gedung di UB?</h3>
                        <p class="text-white">Ajukan surat permohonan ke Kabag Umum dan HTL UB melalui Sekretaris Bagian UHTL di gedung Rektorat Lt.4. Petugas akan mengecek apakah gedung/fasilitas masih kosong atau sudah ada yang memimjam. Jika belum terpakai maka akan dibalas bisa dipakai, dan sebaliknya. Alur peminjaman gedung/fasilitas bisa di akses melalui: http://buk.ub.ac.id/wp-content/uploads/2014/05/13.-SOP-Peminjaman-Gedung.pdf.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @include('layouts.footers.auth')
    </div>


@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
