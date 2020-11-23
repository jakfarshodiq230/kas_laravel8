@extends('Layout.template')
@section('content')
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-colored-form-control">Data Tranaksi</h4>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                    <form action="{{ route('pengeluaran.store')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}     
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="id_transaksi">ID Transaksi</label>
                                    <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" value="{{$pengeluaran}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="userinput2">Rincian</label>
                                    <input type="text" class="form-control  " id="rincian_transaksi" name="rincian_transaksi" autofocus value="">
                                    @if ($errors->has('rincian_transaksi'))
                                    <div class="invalid-tooltip" style="color:red;">
                                            {{ $errors->first('rincian_transaksi') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="userinput3">Jumlah</label>
                                    <input type="text" class="form-control " id="jumlah" name="jumlah" value="<?= old('jumlah'); ?>">
                                    @if ($errors->has('jumlah'))
                                    <div class="invalid-tooltip" style="color:red;">
                                            {{ $errors->first('jumlah') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="userinput3">Jumlah</label>
                                    <input type="text" class="form-control " id="harga" name="harga" value="<?= old('harga'); ?>">
                                    @if ($errors->has('harga'))
                                    <div class="invalid-tooltip" style="color:red;">
                                            {{ $errors->first('harga') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label for="kuitansi" class="col-sm-2 col-form-label">Kuitansi</label>
                                    <div class="col-sm-6">
                                        <img src="/app-assets/images/user.jpg" class="img-thumbnail img-preview" style="position: relative; height:200px;">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="custom-file">
                                            <label class="file center-block" for="kuitansi">
                                                <input type="file" class="custom-file-input  " id="kuitansi" name="kuitansi" onchange="previewImg()">
                                                <label class="custom-file-label btn btn-secondary btn-min-width" style="margin-top: -10%; margin-left:-5%" for="kuitansi">Choose file</label>
                                            </label>
                                            @if ($errors->has('kuitansi'))
                                            <div class="invalid-tooltip" style="color:red;">
                                                    {{ $errors->first('kuitansi') }}
                                            </div>
                                            @endif      
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions right">
                                <a href="{{ route('pemasukan.index') }}"class="btn btn-warning"><i class="icon-cross2"></i> Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Save
                                </button>
                                                              
                            </div>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection