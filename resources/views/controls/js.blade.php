<script>
    $(document).on('show.bs.modal', '#grade_details', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        $("#form-enviar").attr('action', data.bsAction);
        $("#method").val('post');
        if (data.bsRecordId != undefined) {
            $('.title').text("@lang('Edit Grade')");
            $('.modal_registro_grade_id', modal).val(data.bsRecordId);
            $.getJSON('../grades/' + data.bsRecordId + '/edit', function(data) {
                var obj = data;
                $("#form-enviar").attr('action', data.bsAction);
                $("#method").val('put');
                $('#name', modal).val(obj.name);
                $('#id_status').val(obj.id_status).trigger('change.select2');
            });
        } else {
            $('.title').text("@lang('Add Grade')");
        }
    });

    $(document).on('hidden.bs.modal', '#grade_details', function(e) {
        $('#name').val('');
        $('#id_status').val('').trigger('change.select2');
    });
    // MODAL GRUPO
    $(document).on('show.bs.modal', '#group_details', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        $("#form-enviar").attr('action', data.bsAction);
        $("#method").val('post');
        if (data.bsRecordId != undefined) {
            $('.title').text("@lang('Edit Group')");
            $('.modal_registro_group_id', modal).val(data.bsRecordId);
            $.getJSON('../groups/' + data.bsRecordId + '/edit', function(data) {
                var obj = data;
                $("#form-enviar").attr('action', data.bsAction);
                $("#method").val('put');
                $('#name', modal).val(obj.name);
                $('#id_grade').val(obj.id_grade).trigger('change.select2');
                $('#id_status').val(obj.id_status).trigger('change.select2');
            });
        } else {
            $('.title').text("@lang('Add Group')");
        }
    });

    $(document).on('hidden.bs.modal', '#group_details', function(e) {
        $('#name').val('');
        $('#id_grade').val('').trigger('change.select2');
        $('#id_status').val('').trigger('change.select2');
    });
    // MODAL MATERIA
    $(document).on('show.bs.modal', '#matter_details', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        $("#form-enviar").attr('action', data.bsAction);
        $("#method").val('post');
        if (data.bsRecordId != undefined) {
            $('.title').text("@lang('Edit Matter')");
            $('.modal_registro_matter_id', modal).val(data.bsRecordId);
            $.getJSON('../matters/' + data.bsRecordId + '/edit', function(data) {
                var obj = data;
                $("#form-enviar").attr('action', data.bsAction);
                $("#method").val('put');
                $('#name', modal).val(obj.name);
                $('#id_grade').val(obj.id_grade).trigger('change.select2');
                $('#id_status').val(obj.id_status).trigger('change.select2');
            });
        } else {
            $('.title').text("@lang('Add Matter')");
        }
    });

    $(document).on('hidden.bs.modal', '#matter_details', function(e) {
        $('#name').val('');
        $('#id_grade').val('').trigger('change.select2');
        $('#id_status').val('').trigger('change.select2');
    });
</script>
