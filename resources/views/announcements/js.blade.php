<script src="{{ asset('assets/plugins/select2/js/custom-select.js') }}"></script>
<script>
    $(document).on('show.bs.modal', '#announcement_details', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        $("#form-enviar").attr('action', data.bsAction);
        $("#method").val('post');
        $("#category_id").select2({
            dropdownParent: "#announcement_details"
        });
        if (data.bsRecordId != undefined) {
            $('.title').text("@lang('Edit Announcement')");
            $('.modal_registro_announcement_id', modal).val(data.bsRecordId);
            $.getJSON('../announcements/' + data.bsRecordId + '/edit', function(data) {
                var obj = data;
                $("#form-enviar").attr('action', data.bsAction);
                $("#method").val('put');
                $('#title', modal).val(obj.title);
                $('#category_id', modal).val(obj.category_id).trigger('change.select2');
                $('#description', modal).val(obj.description);
                $('#content', modal).val(obj.content);
                $('#published_at').val(obj.published_at).change();

            });
        } else {
            $('.title').text("@lang('Add Announcement')");
        }
    });

    $(document).on('hidden.bs.modal', '#announcement_details', function(e) {
        $("#method").val('post');
        $('#title').val('');
        $('#category_id').val('').trigger('change.select2');
        $('#description').val('');
        $('#content').val('');
        $('#published_at').val('');
    });
</script>
