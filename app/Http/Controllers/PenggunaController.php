<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = Pengguna::join('wilayah_provinsi', 'kd_provinsi', '=', 'wilayah_provinsi.id')
                    ->join('wilayah_kabupaten', 'kd_kabupaten', '=', 'wilayah_kabupaten.id')
                    ->join('wilayah_kecamatan', 'kd_kecamatan', '=', 'wilayah_kecamatan.id')
                    ->join('wilayah_desa', 'kd_desa', '=', 'wilayah_desa.id')->paginate(10);
        return view('pengguna.index', compact('pengguna'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengguna = Pengguna::kode_otomatis();
        $provinsi = Pengguna::getProvinsi();
        return view('pengguna.create', compact('provinsi','pengguna'));
    }

    public function kabupaten($id){
         //$id = $request->id;
        $data = Pengguna::getKabupaten($id);
        return response()->json($data);
    }

    public function kecamatan($id){
        //$id = $request->id;
       $data = Pengguna::getKecamatan($id);
       return response()->json($data);
    }
    public function desa($id){
        //$id = $request->id;
        $data = Pengguna::getDesa($id);
        return response()->json($data);
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
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            // 'kd_provinsi' => 'required',
            // 'kd_kabupaten' => 'required',
            // 'kd_kecamatan' => 'required',
            // 'kd_desa' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10048',
         ]);

        $file = $request->file('foto');
        $nama_file = $file->getClientOriginalName();
        $extensi_file = $file->getClientOriginalExtension();
        $tujuan_upload = 'Data_file_Pengguna';
        $file->move($tujuan_upload,$nama_file,$extensi_file);

         Pengguna::create([
            'id_user' => $request->id_user,
            'nama_pengguna'=> $request->nama,
            'username'=> $request->username,
            'password'=> md5($request->password),
            'kd_provinsi' => $request->provinsi,
            'kd_kabupaten'=> $request->kabupaten,
            'kd_kecamatan' => $request->kecamatan,
            'kd_desa' => $request->kelurahan,
            'foto' => $nama_file,$extensi_file,
            'barcod' => 'default.jpg'
         ]);
         return redirect()->route('pengguna.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        $pengguna = Pengguna::getJoin($pengguna->id_user);
        return view('pengguna.show',compact('pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        $pengguna = Pengguna::getJoin($pengguna->id_user);
        $provinsi = Pengguna::getProvinsi();
        return view('pengguna.edit',compact('provinsi','pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();

        return redirect()->route('pengguna.index')
            ->with('success', 'Project deleted successfully');

    }
}
