@extends('layouts.backend.app')
@section('title', 'Edit Prestasi')
@push('css')
<!-- DataTables -->
<link rel="stylesheet"
    href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- Sweetalert 2 -->
<link rel="stylesheet" type="text/css"
    href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/sweetalert2/sweetalert2.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet"
    href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
@section('content_title', 'Edit Prestasi')
@section('content')
<x-alert></x-alert>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('prestasiAtlet.update', $prestasi->id)}}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="block text-sm font-bold text-gray-700">
                                    Photo
                                </label>
                                <br>
                                <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100 mr-2">
                                    <img src="{{asset('prestasi/images/' . $prestasi->image)}}" alt=""
                                        style="width:150px;">
                                </span>
                                <div class="custom-file">

                                    <input type="file" class="custom-file-input" id="image" name="image"
                                        accept=".jpg, .png, .jpeg">
                                    <label class="custom-file-label" for="contohupload2">Choose file</label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="name">Nama:</label>
                                <input type="text" class="form-control" name="name" value="{{$prestasi->name}}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="nama_kejuaraan">nama Kejuaraan:</label>
                                <input required="" type="text" name="nama_kejuaraan" id="nama_kejuaraan"
                                    class="form-control" value="{{$prestasi->nama_kejuaraan}}">
                            </div>
                        </div>
                        <div class=" col-lg-3">
                            <div class="form-group">
                                <label for="tingkat">Tingkat:</label>
                                <select required="" name="tingkat" id="tingkat" class="form-control select2bs4">
                                    <option selected="" value="{{$prestasi->tingkat}}">
                                        {{$prestasi->tingkat}}</option>
                                    <option value="internasional">Internasional</option>
                                    <option value="nasional">Nasional</option>
                                    <option value="provinsi">Provinsi</option>
                                    <option value="kabupaten">Kabupaten</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="kelas">Kelas:</label>
                                <select required="" name="kelas" id="kelas" class="form-control select2bs4">
                                    <option selected="" value="{{$prestasi->kelas}}">{{$prestasi->kelas}}
                                    </option>
                                    <option value="pracadet">Pracadet</option>
                                    <option value="cadet">Cadet</option>
                                    <option value="junior">Junior</option>
                                    <option value="senior">Senior</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="kategori">Kategori:</label>
                                <select required="" name="kategori" id="kategori" class="form-control select2bs4">
                                    <option selected="" value="{{$prestasi->kategori}}">
                                        {{$prestasi->kategori}}</option>
                                    <option value="prestasi">Prestasi</option>
                                    <option value="pemula">Pemula</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="perolehan">Perolehan:</label>
                                <select required="" name="perolehan" id="perolehan" class="form-control select2bs4">
                                    <option selected="" value="{{$prestasi->perolehan}}">
                                        {{$prestasi->perolehan}}</option>
                                    <option value="emas">Emas</option>
                                    <option value="perak">Perak</option>
                                    <option value="perunggu">Perunggu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="tgl_acara">Tanggal Acara:</label>
                                <input required="" type="date" name="tgl_acara" id="tgl_acara" class="form-control"
                                    value="{{$prestasi->tgl_acara}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="lokasi">Lokasi:</label>
                                <input required="" type="text" name="lokasi" id="lokasi" class="form-control"
                                    value="{{$prestasi->lokasi}}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"><a style="color:white;"
                                href="{{ route('prestasi.index')  }}"><i class="fas fa-caret-left fa-fw"></i>
                                CLOSE
                            </a></button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save fa-fw"></i> SIMPAN
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@stop
@push('js')
<!-- Select2 -->
<script src="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
$('input[type="file"][name="image"]').val('');
//Image preview
$('input[type="file"][name="image"]').on('change', function() {
    var img_path = $(this)[0].value;
    var img_holder = $('.img-holder');
    var extension = img_path.substring(img_path.lastIndexOf('.') + 1).toLowerCase();

    if (extension == 'jpeg' || extension == 'jpg' || extension == 'png') {
        if (typeof(FileReader) != 'undefined') {
            img_holder.empty();
            var reader = new FileReader();
            reader.onload = function(e) {
                $('<img/>', {
                    'src': e.target.result,
                    'class': 'img-fluid',
                    'style': 'max-width:100px;margin-bottom:10px;'
                }).appendTo(img_holder);
            }
            img_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            $(img_holder).html('This browser does not support FileReader');
        }
    } else {
        $(img_holder).empty();
    }
});
//Initialize Select2 Elements
$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
})
</script>
@endpush