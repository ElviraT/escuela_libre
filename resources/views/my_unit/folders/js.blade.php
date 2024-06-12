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
</script>
