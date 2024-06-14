<script>
    $(document).on('show.bs.modal', '#folder_add', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        $("#form-enviar").attr('action', data.bsAction);
        $("#method").val('post');
        $('.title').text("@lang('Add Folder')");
        if (data.bsRecordId != undefined) {
            $('.modal_registro_folder_id', modal).val(data.bsRecordId);
            $("#form-enviar").attr('action', data.bsAction);
            $("#method").val('post');
        }
    });
    $(document).on('hidden.bs.modal', '#folder_add', function(e) {
        $('#name').val('');
    });

    function editar(id) {
        var url_edit = "{{ route('folders.edit', ':id') }}";
        url_edit = url_edit.replace(':id', id);

        // Eliminar evento de la base de datos
        $.ajax({
            url: url_edit,
            method: 'get',
            success: function(data) {
                console.log(data);
                var url = "{{ route('folders.update', ':id') }}";
                url = url.replace(':id', id);
                $('.title').text("@lang('Edit Folder')");
                $("#form-edit").attr('action', url);
                $("#method_edit").val('put');
                $("#name_edit").val(data.name);
                $("#id_edit").val(data.id);
                $('#folder_edit').modal('show');
            }
        });
    };
    $(document).ready(function() {
        Dropzone.options.upload_id = {
            paramName: "file",
            dictDefaultMessage: "Arrastra y suelta los archivos aquí o haz click para seleccionar los archivos",
        };
    });

    $(document).on('show.bs.modal', '#visor_imagen', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        if (data.bsRecordImg != undefined) {
            var modalHeight = $(this).find(".modal-content").height();
            $(this).find(".modal-dialog").height(modalHeight);
            var image = data.bsRecordImg;
            if (data.bsRecordExtension == 'jpg' || data.bsRecordExtension == 'png' || data.bsRecordExtension ==
                'jpeg') {
                $('#img').attr('hidden', false);
                $('#iframe-container').attr('hidden', true);
                $('#descargar').attr('hidden', true);
                $('#img_descarga').attr('hidden', true);
                $('#img').attr("src", image);
            } else if (data.bsRecordExtension == 'pdf') {
                $('#img').attr('hidden', true);
                $('#iframe-container').attr('hidden', false);
                $('#descargar').attr('hidden', true);
                $('#img_descarga').attr('hidden', true);
                $("#iframe-container").append('<iframe id="myIframe" src="' + image +
                    '" width="600" height="400"></iframe>');

            } else if (data.bsRecordExtension == 'docx' || data.bsRecordExtension == 'xlsx' || data
                .bsRecordExtension == 'pptx') {
                $('#img').attr('hidden', true);
                $('#iframe-container').attr('hidden', true);
                $('#descargar').attr('hidden', false);
                $('#img_descarga').attr('hidden', false);
                $('#btn-descargar').attr('href', image);

            }

            $('.title').text(data.bsRecordTitle);
        }
    });
    $(document).on('hidden.bs.modal', '#visor_imagen', function(e) {
        $('#img').attr("src", "{{ asset('assets/img/images.png') }}");
        $('#img').attr('hidden', true);
        $('#iframe-container').attr('hidden', true);
        $('#descargar').attr('hidden', true);
        $('#img_descarga').attr('hidden', true);
        $("#myIframe").remove();
    });
    $(document).on('hidden.bs.modal', '#folder_file', function(e) {
        location.reload();
    });
</script>
