@extends('Layout.template')
@section('content')
@foreach ($pengguna as $pengguna)
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-colored-form-control">Detail Transaksi</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- stats -->
                <div class="row mt-2 ml-2">
                    <div class="col-xl-5 col-lg-4 col-xs-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-body text-xs-left">
                                            <img src="" alt="" class="img-thumbnail img-preview" width=74%; height="9.9%" style="margin-left:13% ;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-body text-xs-left">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="userinput5">ID Pengguna</label>
                                                    <input class="form-control border-primary" type="email" value="{{$pengguna->id_user}}" disabled>
                                                </div>

                                                <div class="form-group">
                                                    <label for="userinput6">Nama Pengguna</label>
                                                    <input class="form-control border-primary" type="url" value="{{$pengguna->nama_pengguna}}" disabled>
                                                </div>

                                                <div class="form-group">
                                                    <label for="userinput6">Username</label>
                                                    <input class="form-control border-primary" type="url" value="{{$pengguna->username}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="userinput6">Password</label>
                                                    <input class="form-control border-primary" type="url" value="{{$pengguna->password}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="userinput6">Provinsi</label>
                                                    <input class="form-control border-primary" type="url" value="{{$pengguna->nama_provinsi}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="userinput6">Kabupaten</label>
                                                    <input class="form-control border-primary" type="url" value="{{$pengguna->nama_kabupaten}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="userinput6">Kecamatan</label>
                                                    <input class="form-control border-primary" type="url" value="{{$pengguna->nama_kecamatan}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="userinput6">Desa</label>
                                                    <input class="form-control border-primary" type="url" value="{{$pengguna->nama_desa}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="userinput6">Tanggal Daftar</label>
                                                    <input class="form-control " type="url" value="{{$pengguna->created_at}}" disabled>
                                                </div>

                                            </div>
                                            <div class="form-actions" data-toggle="tooltip" data-placement="left" title="Kembali" style="margin-left: 78% ;">
                                                <a href="/pengguna" class="btn btn-warning"><i class="icon-undo"></i> Kembali</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection