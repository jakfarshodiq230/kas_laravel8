@extends('Layout.template')
@section('content')
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
                                            <img src="/Data_file_Pengeluaran/{{$pengeluaran->struk}}" alt="" class="img-thumbnail img-preview" width=74%; height="9.9%" style="margin-left:13% ;">
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
                                                    <label for="userinput5">ID Transaksi</label>
                                                    <input class="form-control border-primary" type="email" value="{{$pengeluaran->id_transaksi}}" disabled>
                                                </div>

                                                <div class="form-group">
                                                    <label for="userinput6">Rincian Transaksi</label>
                                                    <input class="form-control border-primary" type="url" value="{{$pengeluaran->rincian_transaksi}}" disabled>
                                                </div>

                                                <div class="form-group">
                                                    <label for="userinput6">Jumlah</label>
                                                    <input class="form-control border-primary" type="url" value="{{$pengeluaran->jumlah}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="userinput6">Harga</label>
                                                    <input class="form-control border-primary" type="url" value="{{$pengeluaran->harga}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="userinput6">Total</label>
                                                    <input class="form-control border-primary" type="url" value="{{$pengeluaran->total}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="userinput6">Tanggal Pemasukan</label>
                                                    <input class="form-control " type="url" value="{{$pengeluaran->created_at}}" disabled>
                                                </div>

                                            </div>
                                            <div class="form-actions" data-toggle="tooltip" data-placement="left" title="Kembali" style="margin-left: 78% ;">
                                                <a href="{{route('pengeluaran.index')}}" class="btn btn-warning"><i class="icon-cross2"></i> Kembali</a>
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
@endsection