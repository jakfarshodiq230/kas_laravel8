<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasukan = Pemasukan::where('jenis_transaksi', 'pemasukan')->paginate(10);
        //$pemasukan = paginate(10);
        return view('pemasukan.index', compact('pemasukan'));
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
        $pemasukan = Pemasukan::kode_otomatis();
        return view('pemasukan.create', compact('pemasukan'));
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
           'kuitansi' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $file = $request->file('kuitansi');
        $nama_file = $file->getClientOriginalName();
        $extensi_file = $file->getClientOriginalExtension();
        $tujuan_upload = 'Data_file_pemasukan';
        Pemasukan::create([
            'id_transaksi' => $request->id_transaksi,
            'rincian_transaksi' => $request->rincian_transaksi,
            'jumlah' =>$request->jumlah,
            'harga' => 0,
            'total' => 0,
            'jenis_transaksi' => 'pemasukan',
            'struk' =>$nama_file, $extensi_file
        ]);
        $file->move($tujuan_upload,$nama_file,$extensi_file);

        return redirect()->route('pemasukan.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasukan $pemasukan)
    {
        return view('pemasukan.show', compact('pemasukan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasukan $pemasukan)
    {
        return view('pemasukan.edit', compact('pemasukan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemasukan $pemasukan)
    {
        $file = $request->file('kuitansi');
        $nama_file = $file->getClientOriginalName();
        $extensi_file = $file->getClientOriginalExtension();
        $tujuan_upload = 'Data_file_pemasukan';
        $pemasukan->update([
            'id_transaksi' => $request->id_transaksi,
            'rincian_transaksi' => $request->rincian_transaksi,
            'jumlah' =>$request->jumlah,
            'harga' => 0,
            'total' => 0,
            'jenis_transaksi' => 'pemasukan',
            'struk' =>$nama_file, $extensi_file
        ]);
        $file->move($tujuan_upload,$nama_file,$extensi_file);

        return redirect()->route('pemasukan.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasukan $pemasukan)
    {
        $pemasukan->delete();

        return redirect()->route('pemasukan.index')
            ->with('success', 'Project deleted successfully');
    }
}
