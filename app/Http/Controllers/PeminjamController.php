<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjam = peminjam::all();
        // $headerdata = peminjam::orderBy('kapasitas', "DESC")->get();
        return view('peminjam.index')->with('peminjam', $peminjam);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("peminjam.create");
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
            'nama' => 'required',
            'email' => 'required',
            'jabatan' => 'required',
            'umur' => 'required'
        ]);

        Peminjam::create($request->all());

        return redirect()->route('peminjam.index')->with('success', 'peminjam created successfully');
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
    public function edit(Peminjam $peminjam)
    {
        // dd($peminjam);
        return view('peminjam.edit')->with('peminjam', $peminjam);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjam $peminjam)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'jabatan' => 'required',
            'umur' => 'required',
        ]);

        $peminjam->update($request->all());
        return redirect()->route('peminjam.index')->with('success', 'Peminjam has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjam $peminjam)
    {
        $delete = $peminjam->delete();
        // dd($peminjam);
        return redirect()->route('peminjam.index')->with('success','Peminjam has been deleted successfully');
    }
}
