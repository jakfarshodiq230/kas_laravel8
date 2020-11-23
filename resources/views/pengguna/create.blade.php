@extends('Layout.template')
@section('content')
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-colored-form-control">Data Pengguna</h4>
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
                <div class="card-body collapse in">
                    <div class="card-block">
                        <form class="form" action="{{route('pengguna.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="id_user">ID Pengguna</label>
                                    <input type="text" class="form-control" id="id_user" name="id_user" value="{{$pengguna}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="userinput2">Nama</label>
                                    <input type="text" class="form-control " id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                                    @if ($errors->has('nama'))
                                    <div class="invalid-tooltip" style="color:red;">
                                            {{ $errors->first('nama') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select class="form-control " name="provinsi" id="provinsi">
                                        <option value=""> Pilih Provinsi</option>
                                        @foreach ($provinsi as $provinsi)
                                        <option value="{{$provinsi->id}}">{{$provinsi->nama_provinsi}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kabupaten</label>
                                    <select class="form-control " name="kabupaten" id="kabupaten">
                                        <option value="">Pilih</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select class="form-control " name="kecamatan" id="kecamatan">
                                        <option value="">Pilih</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <select class="form-control " name="kelurahan" id="kelurahan">
                                        <option value="">Pilih</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="userinput6">Username</label>
                                    <input type="text" class="form-control " id="username" name="username" value="<?= old('username'); ?>">
                                    @if ($errors->has('username'))
                                    <div class="invalid-tooltip" style="color:red;">
                                            {{ $errors->first('username') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="userinput6">Password</label>
                                    <input type="password" class="form-control " id="password" name="password" value="<?= old('password'); ?>">
                                    @if ($errors->has('password'))
                                    <div class="invalid-tooltip" style="color:red;">
                                            {{ $errors->first('password') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-6">
                                        <img src="/app-assets/images/user.jpg" class="img-thumbnail img-preview" style="position: relative; height:200px;">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="custom-file">
                                            <label class="file center-block" for="foto">
                                                <input type="file" class="custom-file-input " id="foto" name="foto" onchange="previewImg2()">
                                                <label class="custom-file-label btn btn-secondary btn-min-width" style="margin-top: -10%; margin-left:-5%" for="foto">Choose file</label>
                                            </label>
                                            @if ($errors->has('foto'))
                                            <div class="invalid-tooltip" style="color:red;">
                                                    {{ $errors->first('foto') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions right">
                                <a href="/pengguna" class="btn btn-warning"><i class="icon-cross2"></i> Cancel</a>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#provinsi').change(function() {
            var id = $(this).val();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                url: "{{url('pengguna/kabupaten/')}}/"+ $(this).val(),
                method: "GET",
                success: function(data) {
                    console.log(data);
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].nama_kabupaten + '</option>';
                    }
                    $('#kabupaten').html(html);

                }
            });
        });
        $('#kabupaten').change(function() {
            var id = $(this).val();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                url: "{{url('pengguna/kecamatan/')}}/"+ $(this).val(),
                method: "GET",
                success: function(data) {
                    console.log(data);
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].nama_kecamatan + '</option>';
                    }
                    $('#kecamatan').html(html);

                }
            });
        });
        $('#kecamatan').change(function() {
            var id = $(this).val();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                url: "{{url('pengguna/desa/')}}/"+ $(this).val(),
                method: "GET",
                success: function(data) {
                    console.log(data);
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].nama_desa + '</option>';
                    }
                    $('#kelurahan').html(html);

                }
            });
        });
    });
</script>
@endsection