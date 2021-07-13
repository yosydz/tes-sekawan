<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan = DB::table('pemesanan')
            ->join('peminjam', 'pemesanan.peminjam_id', '=', 'peminjam.id')
            ->join('kendaraan', 'pemesanan.kendaraan_id', '=', 'kendaraan.id')
            ->join('supir', 'pemesanan.supir_id', '=', 'supir.id')
            ->select('pemesanan.*', 'peminjam.nama AS nama_peminjam', 'kendaraan.nama AS nama_kendaraan', 'supir.nama AS nama_supir',)
            ->get();
        return view('pemesanan.index')->with('pemesanan', $pemesanan);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kendaraan = DB::table('kendaraan')->get();
        $peminjam = DB::table('peminjam')->get();
        $supir = DB::table('supir')->get();

        return view('pemesanan.create', ['kendaraan' => $kendaraan, 'peminjam' => $peminjam, 'supir' => $supir]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required',
            'peminjam_id' => 'required',
            'supir_id' => 'required',
            'tgl_pemesanan' => 'required',
            'status' => 'required',
        ]);

        //store in database
        Pemesanan::create($request->all());

        return redirect()->route('pemesanan.index')->with('success', 'Kendaraan created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        $kendaraan = DB::table('kendaraan')->get();
        $peminjam = DB::table('peminjam')->get();
        $supir = DB::table('supir')->get();

        $pemesanan = Pemesanan::find($pemesanan['id']);

        return view('pemesanan.edit', ['kendaraan' => $kendaraan, 'peminjam' => $peminjam, 'supir' => $supir, 'pemesanan' => $pemesanan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'kendaraan_id' => 'required',
            'peminjam_id' => 'required',
            'supir_id' => 'required',
            'tgl_pemesanan' => 'required',
            'status' => 'required',
        ]);

        $pemesanan->update($request->all());
        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        $delete = $pemesanan->delete();
        // dd($pemesanan);
        return redirect()->route('pemesanan.index')->with('success','pemesanan has been deleted successfully');
    }
}
