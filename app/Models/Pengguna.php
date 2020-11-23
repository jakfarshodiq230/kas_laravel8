<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Carbon;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = 'pengguna';
    public $timestamps = true;

    // protected $casts = [
    //     'id_transaksi' => 'string'
    // ];

    protected $fillable = ['id_user', 'nama_pengguna', 'username', 'password', 'kd_provinsi', 'kd_kabupaten', 'kd_kecamatan', 'kd_desa', 'foto', 'barcod']; //atribut tabel
    protected $primaryKey = 'id_user';

    public static function kode_otomatis()
    {
        $q = DB::table('pengguna')->SELECT(DB::raw("MAX(RIGHT(id_user,4)) AS kd_max"));
        $kd = "";
        if ($q) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmY') . $kd;
    }
    //tanggal indonesia gelobal
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
        ->format('d, M Y H:i');
    }

    public static function getJoin($id)
    {
        $query = DB::table('pengguna')->select(DB::raw('*'))->join('wilayah_provinsi', 'kd_provinsi', '=', 'wilayah_provinsi.id')
                    ->join('wilayah_kabupaten', 'kd_kabupaten', '=', 'wilayah_kabupaten.id')
                    ->join('wilayah_kecamatan', 'kd_kecamatan', '=', 'wilayah_kecamatan.id')
                    ->join('wilayah_desa', 'kd_desa', '=', 'wilayah_desa.id')->where('id_user',$id)->get();
        return $query;
    }
    public static function getProvinsi()
    {
        $query = DB::table('wilayah_provinsi')->select('*')->get();
        return $query;
    }
    public static function getKabupaten($id)
    {
        $query = DB::table('wilayah_kabupaten')->where('provinsi_id',$id)->get();
        return $query;
    }
    public static function getKecamatan($id)
    {
        $query = DB::table('wilayah_kecamatan')->where('kabupaten_id',$id)->get();
        return $query;
    }
    public static function getDesa($id)
    {
        $query = DB::table('wilayah_desa')->where('kecamatan_id',$id)->get();
        return $query;
    }
}
