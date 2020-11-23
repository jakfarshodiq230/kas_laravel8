<?php

namespace App\Http\Controllers;

use App\Models\Dasbort;
use Illuminate\Http\Request;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class DasbortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasukan = Pemasukan::getJumlahPemasukan();
        $pengeluaran = Pengeluaran::getJumlahPengeluaran();
        return view('dasbort.home', compact('pemasukan','pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dasbort  $dasbort
     * @return \Illuminate\Http\Response
     */
    public function show(Dasbort $dasbort)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dasbort  $dasbort
     * @return \Illuminate\Http\Response
     */
    public function edit(Dasbort $dasbort)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dasbort  $dasbort
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dasbort $dasbort)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dasbort  $dasbort
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dasbort $dasbort)
    {
        //
    }
}
