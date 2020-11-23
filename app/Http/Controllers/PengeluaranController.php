<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::where('jenis_transaksi', 'pengeluaran')->paginate(10);
        //$pemasukan = paginate(10);
        return view('pengeluaran.index', compact('pengeluaran'));
            //->with('i', (request()->input('page', 1) - 1) * 5);
        //return view('pemasukan.index',['pemasukan' => $pemasukan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengeluaran = Pengeluaran::kode_otomatis();
        return view('pengeluaran.create', compact('pengeluaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'rincian_transaksi' => 'required',
           'jumlah' => 'required',
           'harga' => 'required',
           'kuitansi' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $file = $request->file('kuitansi');
        $nama_file = $file->getClientOriginalName();
        $extensi_file = $file->getClientOriginalExtension();
        $tujuan_upload = 'Data_file_pengeluaran';
        Pengeluaran::create([
            'id_transaksi' => $request->id_transaksi,
            'rincian_transaksi' => $request->rincian_transaksi,
            'jumlah' =>$request->jumlah,
            'harga' => $request->harga,
            'total' => $request->jumlah * $request->harga,
            'jenis_transaksi' => 'pengeluaran',
            'struk' =>$nama_file, $extensi_file
        ]);
        $file->move($tujuan_upload,$nama_file,$extensi_file);

        return redirect()->route('pengeluaran.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.show', compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.edit', compact('pengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengeluaran  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $file = $request->file('kuitansi');
        $nama_file = $file->getClientOriginalName();
        $extensi_file = $file->getClientOriginalExtension();
        $tujuan_upload = 'Data_file_Pengeluaran';
        $pemasukan->update([
            'id_transaksi' => $request->id_transaksi,
            'rincian_transaksi' => $request->rincian_transaksi,
            'jumlah' =>$request->jumlah,
            'harga' => $request->harga,
            'total' => $request->jumlah * $request->harga,
            'jenis_transaksi' => 'pengeluaran',
            'struk' =>$nama_file, $extensi_file
        ]);
        $file->move($tujuan_upload,$nama_file,$extensi_file);

        return redirect()->route('pengeluaran.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengeluaran  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')
            ->with('success', 'Project deleted successfully');
    }
}
