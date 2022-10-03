<script>
$(function() {

    var table = $("#dataTable2").DataTable({
        processing: true,
        serverSide: true,
        "responsive": true,
        ajax: "{{ route('atlet.index') }}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'id'
            },

            {
                data: 'image',
                name: 'image'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'nisn',
                name: 'nisn'
            },
            {
                data: 'tgl_registrasi',
                name: 'tgl_registrasi'
            },
            // {
            //     data: 'tempat_lahir',
            //     name: 'tempat_lahir'
            // },

            // {
            //     data: 'tgl_lahir',
            //     name: 'tgl_lahir'
            // },
            // {
            //     data: 'jenis_kelamin',
            //     name: 'jenis_kelamin'
            // },
            // {
            //     data: 'bb',
            //     name: 'bb'
            // },
            // {
            //     data: 'tb',
            //     name: 'tb'
            // },
            {
                data: 'no_telepon',
                name: 'no_telepon'
            },
            {
                data: 'tingkat_sabuk',
                name: 'tingkat_sabuk'
            },
            {
                data: 'kelas',
                name: 'kelas'
            },

            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: true
            },
        ]
    });

});

// Reset Form
function resetForm() {
    $("[name='name']").val("")
    $("[name='username']").val("")
    $("[name='nisn']").val("")
    $("[name='nis']").val("")
    $("[name='alamat']").val("")
    $("[name='no_telepon']").val("")
}

// create
$("#store").on("submit", function(e) {
    e.preventDefault()
    $.ajax({

        url: "{{ route('atlet.store') }}",
        method: "POST",

        data: $(this).serialize(),
        statusCode: {
            500: function(response) {
                console.log(response)
            },
        },
        success: function(response) {
            if ($.isEmptyObject(response.error)) {
                $("#createModal").modal("hide")
                $('#dataTable2').DataTable().ajax.reload()
                Swal.fire(
                    '',
                    response.message,
                    'success'
                )
                resetForm()
            } else {
                printErrorMsg(response.error)
            }
        }
    });
})
$('input[type="file"][name="gambar"]').val('');
//Image preview
$('input[type="file"][name="gambar"]').on('change', function() {
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

// create-error-validation
function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display', 'block');
    $.each(msg, function(key, value) {
        $(".print-error-msg").find("ul").append('<li>' + value + '</li>')
    });
}

// edit
$("body").on("click", ".btn-edit", function() {
    var id = $(this).attr("id")
    $.ajax({
        url: "/admin/atlet/" + id + "/edit",
        method: "GET",
        statusCode: {
            500: function(response) {
                console.log(response)
            },
        },
        success: function(response) {
            $("#id_edit").val(response.data.id)
            $("#foto_edit").val(response.data.foto)
            $("#nisn_edit").val(response.data.nisn)
            $("#name_edit").val(response.data.name)
            $("#tgl_registrasi_edit").val(response.data.tgl_registrasi)
            $("#tempat_lahir_edit").val(response.data.tempat_lahir)
            $("#tgl_lahir_edit").val(response.data.tgl_lahir)
            $("#jenis_kelamin_edit").val(response.data.jenis_kelamin)
            $("#bb_edit").val(response.data.bb)
            $("#tb_edit").val(response.data.tb)
            $("#no_telepon_edit").val(response.data.no_telepon)
            $("#tingkat_sabuk_edit").val(response.data.tingkat_sabuk)
            $("#kelas_edit").val(response.data.kelas)
            $("#editModal").modal("show")
        },
        error: function(err) {
            if (err.status == 403) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Not allowed!'
                })
            }
        }
    })
})

// update
$("#update").on("submit", function(e) {
    e.preventDefault()
    var id = $("#id_edit").val()
    $.ajax({
        url: "/admin/atlet/" + id,
        method: "PATCH",
        data: $(this).serialize(),
        statusCode: {
            500: function(response) {
                console.log(response)
            },
        },
        success: function(response) {
            if ($.isEmptyObject(response.error)) {
                $("#editModal").modal("hide")
                $('#dataTable2').DataTable().ajax.reload()
                Swal.fire(
                    '',
                    response.message,
                    'success'
                )
            } else {
                printErrorMsg(response.error)
            }
        },
        error: function(err) {
            if (err.status == 403) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Not allowed!'
                })
            }
        }
    })
})

// delete
$("body").on("click", ".btn-delete", function() {
    var id = $(this).attr("id")

    Swal.fire({
        title: 'Yakin hapus data ini?',
        // text: "You won't be able to revert",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/atlet/" + id,
                method: "DELETE",
                success: function(response) {
                    $('#dataTable2').DataTable().ajax.reload()
                    Swal.fire(
                        '',
                        response.message,
                        'success'
                    )
                },
                error: function(err) {
                    if (err.status == 403) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Not allowed!'
                        })
                    }
                }
            })
        }
    })
})

//Initialize Select2 Elements
$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
})
</script>