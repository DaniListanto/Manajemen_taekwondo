@extends('layouts.backend.app')
@section('title', 'Tambah Atlet')
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
@section('content_title', 'Tambah Atlet')
@section('content')
<x-alert></x-alert>
<div class="row">
    <div class="col-12">
        <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('atlet.store')  }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="image">
                                Photo
                            </label>
                            <div class="img-holder"> </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image"
                                    accept=".jpg, .png, .jpeg" required>
                                <label class="custom-file-label" for="contohupload2">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="name">Nama Atlet:</label>
                                <input required="" type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input required="" type="text" name="username" id="username" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tgl_registrasi">Tanggal registrasi:</label>
                                <input required="" type="date" name="tgl_registrasi" id="tgl_registrasi"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="alamat">ALamat:</label>
                                <textarea required="" type="text" name="alamat" id="alamat"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir:</label>
                                <input required="" type="text" name="tempat_lahir" id="tempat_lahir"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir:</label>
                                <input required="" type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <select required="" name="jenis_kelamin" id="jenis_kelamin" class="form-control ">
                                    <option disabled="" selected="">- PILIH JENIS KELAMIN -</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="bb">berat badan:</label>
                                <input required="" type="text" name="bb" id="bb" class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="tb">tinggi badan:</label>
                                <input required="" type="text" name="tb" id="tb" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="no_telepon">No Telepon:</label>
                                <input required="" type="text" name="no_telepon" id="no_telepon" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="tingkat_sabuk">Tingkat Sabuk:</label>
                                <select required="" name="tingkat_sabuk" id="tingkat_sabuk"
                                    class="form-control select2bs4">
                                    <option disabled="" selected="">- TINGKAT SABUK -</option>
                                    <option value="putih">Putih</option>
                                    <option value="kuning">Kuning</option>
                                    <option value="kuning-strip-hijau">Kuning Strip Hijau</option>
                                    <option value="Hijau">Hijau</option>
                                    <option value="Hijau-strip-biru">Hijau Strip Biru</option>
                                    <option value="Biru">Biru</option>
                                    <option value="Biru-strip-merah">Biru Strip Merah</option>
                                    <option value="merah">Merah</option>
                                    <option value="merah-strip-hitam1">Merah Strip Hitam 1</option>
                                    <option value="merah-strip-hitam2">Merah Strip Hitam 2</option>
                                    <option value="Hitam">Hitam</option>
                                    <option value="Dan1">Dan 1</option>
                                    <option value="Dan2">Dan 2</option>
                                    <option value="Dan3">Dan 3</option>
                                    <option value="Dan4">Dan 4</option>
                                    <option value="Dan5">Dan 5</option>
                                    <option value="Dan6">Dan 6</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="kelas">kelas:</label>
                                <select required="" name="kelas" id="kelas" class="form-control">
                                    <option disabled="" selected="">- PILIH KELAS -</option>
                                    <option value="reguler">Reguler</option>
                                    <option value="poomsae">Poomsae</option>
                                    <option value="kyorugi">Kyorugi</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"><a style="color:white;"
                                href="{{ route('atlet.index')  }}"><i class="fas fa-caret-left fa-fw"></i>
                                BACK
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