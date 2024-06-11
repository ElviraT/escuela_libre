<script>
    $(document).on('show.bs.modal', '#folder_add', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        $("#form-enviar").attr('action', data.bsAction);
        $("#method").val('post');
        if (data.bsRecordId != undefined) {
            $('.title').text("@lang('Add Folder')");
            $('.modal_registro_folder_id', modal).val(data.bsRecordId);
            $("#form-enviar").attr('action', data.bsAction);
            $("#method").val('post');
        } else {
            $('.title').text("@lang('Add Folder')");
        }
    });
    $(document).on('hidden.bs.modal', '#folder_add', function(e) {
        $('#name').val('');
    });
</script>
