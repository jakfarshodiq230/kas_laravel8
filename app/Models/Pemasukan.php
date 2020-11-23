<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Carbon;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'transaksi_kas';
    public $timestamps = true;

    protected $casts = [
        'id_transaksi' => 'string'
    ];

    protected $fillable = ['id_transaksi', 'rincian_transaksi','jumlah','harga','total','jenis_transaksi','struk','created_at']; //atribut tabel
    protected $primaryKey = 'id_transaksi';

    public static function kode_otomatis()
    {
        $q = DB::table('transaksi_kas')->SELECT(DB::raw("MAX(RIGHT(id_transaksi,4)) AS kd_max"));
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

    public static function getJumlahPemasukan()
    {
        $query = DB::table('transaksi_kas')
        ->select(DB::raw('SUM(jumlah) AS pemasukan'),DB::raw('YEAR(created_at) tahun_kas'),DB::raw('MONTH(created_at) bulan_kas'))
        ->where('jenis_transaksi', 'pemasukan')
        ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
        ->get();
        return $query;
    }
}
