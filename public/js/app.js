$('body').on('click', '.modal-show', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').removeClass('hide')
        .text(me.hasClass('edit') ? 'Update' : 'Create');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response);
            $('#modal').modal('show');
        }
    });

});

$('#modal-btn-save').on('click', function (event) {
    event.preventDefault();

    var form = $('#modal-body form'),
        url = form.attr('action'),
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

    form.find('.text-danger').remove();
    form.find('.form-group').removeClass('has-error');
    form.find('input').removeClass('is-invalid');
    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function (response) {
            form.trigger('reset');
            $('#modal').modal('hide');
            $('#datatable').DataTable().ajax.reload();

            swal({
                type: 'success',
                title: 'Sukses!',
                text: method == 'POST' ? 'Data telah disimpan' : 'Data telah diperbarui'
            });
        },
        error: function (xhr) {
            var response = xhr.responseJSON;

            if ($.isEmptyObject(response) == false) {
                $.each(response.errors, function (key, value) {
                    $('#' + key)
                        .closest('.form-group')
                        .addClass('has-error')
                        .append('<span class="text-danger"><strong>' + value + '</strong></span>')
                        .find('input')
                        .addClass('is-invalid')
                });
            }
        }
    })
});

$('body').on('click', '.btn-delete', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');

    swal({
        title: 'Anda Yakin akan Menghapus data ini ?',
        text: 'Data yang sudah dihapus tidak bisa dikembalikan',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya Hapus Data ini!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
                success: function (response) {
                    $('#datatable').DataTable().ajax.reload();
                    swal({
                        type: 'success',
                        title: 'Sukses!',
                        text: 'Data telah dihapus!'
                    });
                },
                error: function (xhr) {
                    swal({
                        type: 'error',
                        title: 'Oops....',
                        text: 'Terjadi kesalahan ..!'
                    });
                }
            });
        }
    });
});


$('body').on('click', '.btn-show', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').addClass('hide');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (respone) {
            $('#modal-body').html(respone);
            $('#modal').modal('show');

        }
    });

});