<script src="{{ asset('assets/plugins/select2/js/custom-select.js') }}"></script>
<script>
    $(document).on('show.bs.modal', '#add_teacher', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        modal.addClass('loading');
        $("#form-enviar").attr('action', data.bsAction);
        $("#method").val('post');
        if (data.bsRecordId != undefined) {
            $('.title').text("@lang('Edit Teacher')");
            $('.modal_registro_teacher_id', modal).val(data.bsRecordId);
            $.getJSON('../teachers/' + data.bsRecordId + '/edit', function(data) {
                var obj = data;

                $('#idSex').val(obj.idSex).trigger('change.select2');
                $('#idMaritalState').val(obj.idMaritalState).trigger('change.select2');
                $('#idStatus').val(obj.idStatus).trigger('change.select2');
                $('#id_user').val(obj.id_user).trigger('change.select2');
                $("#form-enviar").attr('action', data.bsAction);
                $("#method").val('put');
                $('#register', modal).val(obj.register);
                $('#ncolegio', modal).val(obj.ncolegio);
            });
        } else {
            $('.title').text("@lang('Add Teacher')");
        }
    });
    $(document).on('hidden.bs.modal', '#add_teacher', function(e) {
        $('#idSex').val('').trigger('change.select2');
        $('#idMaritalState').val('').trigger('change.select2');
        $('#idStatus').val('').trigger('change.select2');
        $('#id_user').val('').trigger('change.select2');
        $("#method").val('post');
        $('#register').val('');
        $('#ncolegio').val('');
    });
</script>
