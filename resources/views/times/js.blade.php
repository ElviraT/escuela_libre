<script src="{{ asset('assets/plugins/select2/js/custom-select.js') }}"></script>
<script>
    // MODAL DE HORARIO
    $(document).on('show.bs.modal', '#add_time', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        $("#id_teacher, #id_day").select2({
            dropdownParent: "#add_time"
        });
        $("#form-enviar").attr('action', data.bsAction);
        $("#method").val('post');
        if (data.bsRecordId != undefined) {
            $('.title').text("@lang('Edit Time')");
            $('.modal_registro_time_id', modal).val(data.bsRecordId);
            $.getJSON('./times/' + data.bsRecordId + '/edit', function(data) {
                var obj = data;
                $('#id_teacher').val(obj.id_teacher).trigger('change.select2');
                $('#id_day').val(obj.id_day).trigger('change.select2');
                $("#form-enviar").attr('action', data.bsAction);
                $("#method").val('put');
                $('#start_hour', modal).val(obj.start_hour);
                $('#end_hour', modal).val(obj.end_hour);
            });
        } else {
            $('.title').text("@lang('Add Time')");
        }
    });
    $(document).on('hidden.bs.modal', '#add_time', function(e) {
        $('#id_teacher').val('').trigger('change.select2');
        $('#id_day').val('').trigger('change.select2');
        $("#method").val('post');
        $('#start_hour').val('');
        $('#end_hour').val('');
    });
</script>
