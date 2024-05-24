<script>
    $(document).on('show.bs.modal', '#add_representative', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        modal.addClass('loading');
        $("#form-enviar").attr('action', data.bsAction);
        $("#method").val('post');
        modal.removeClass('loading');
        if (data.bsRecordId != undefined) {
            $('.title').text("@lang('Edit Representative')");
            modal.addClass('loading');
            $('.modal_registro_representative_id', modal).val(data.bsRecordId);
            $.getJSON('../representatives/' + data.bsRecordId + '/edit', function(data) {
                var obj = data;
                $('#id_user').val(obj.id_user).trigger('change.select2');
                $('#id_status').val(obj.id_status).trigger('change.select2');
                $('#id_marital').val(obj.id_marital).trigger('change.select2');
                $("#form-enviar").attr('action', data.bsAction);
                $("#method").val('put');
                $('#ocupation', modal).val(obj.ocupation);

                modal.removeClass('loading');
            });
        } else {
            $('.title').text("@lang('Add Representative')");
        }
    });
    $(document).on('hidden.bs.modal', '#add_representative', function(e) {
        $('#id_user').val('').trigger('change.select2');
        $('#id_status').val('').trigger('change.select2');
        $('#id_marital').val('').trigger('change.select2');
        $("#method").val('post');
        $('#ocupation').val('');
    });

    // modal familiares
    $(document).on('show.bs.modal', '#add_alumno', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        modal.addClass('loading');
        $('#birthdate').datetimepicker({
            useCurrent: false,
            format: 'YYYY-MM-DD',
            debug: true,
            maxDate: new Date(),
        })
        $("#form-enviar").attr('action', data.bsAction);
        $("#method").val('post');
        modal.removeClass('loading');
        if (data.bsRecordId != undefined) {
            $('.title').text("@lang('Edit Student')");
            modal.addClass('loading');
            $('.modal_registro_alumno_id', modal).val(data.bsRecordId);
            $.getJSON('../representatives/alumno/' + data.bsRecordId + '/edit', function(data) {
                var obj = data;
                $('#id_gender').val(obj.id_gender).trigger('change.select2');
                $('#id_relation').val(obj.id_relation).trigger('change.select2');
                $("#form-enviar").attr('action', data.bsAction);
                $("#method").val('put');
                $('#name', modal).val(obj.name);
                $('#last_name', modal).val(obj.last_name);
                $('#dni', modal).val(obj.dni);
                $('#birthdate', modal).val(obj.birthdate);
                if (obj.is_alergy == 1) {
                    $('#alergy_id').prop('checked', true).change();
                    $('#type_alergy', modal).val(obj.type_alergy);
                } else {
                    $('#alergy_id').prop('checked', false).change();
                    $('#type_alergy', modal).val('');
                }
                if (obj.is_disability == 1) {
                    $('#disability_id').prop('checked', true).change();
                    $('#type_disability', modal).val(obj.type_disability);
                } else {
                    $('#disability_id').prop('checked', false).change();
                    $('#type_disability', modal).val('');
                }
                $('#type_blood', modal).val(obj.type_blood);
            });
        } else {
            $('.title').text("@lang('Add Student')");
        }
    });
    $(document).on('hidden.bs.modal', '#add_alumno', function(e) {
        $('#id_gender').val('').trigger('change.select2');
        $('#id_relation').val('').trigger('change.select2');
        $("#method").val('post');
        $('#name', modal).val('');
        $('#last_name', modal).val('');
        $('#dni', modal).val('');
        $('#birthdate', modal).val('');
        $('#alergy_id', modal).prop('checked', false).change();
        $('#disability_id', modal).prop('checked', false).change();
        $('#type_alergy', modal).val('');
        $('#type_disability', modal).val('');
        $('#type_blood', modal).val('');
    });
    $(function() {
        $('#alergy_id').change(function() {
            var alergy = $(this).prop('checked');
            if (alergy == true) {
                $('#tipo_al').attr('hidden', false);
            } else {
                $('#tipo_al').attr('hidden', true);
            }
        });
        $('#disability_id').change(function() {
            var discapacity = $(this).prop('checked');
            if (discapacity == true) {
                $('#tipo_dis').attr('hidden', false);
            } else {
                $('#tipo_dis').attr('hidden', true);
            }
        });
    });
</script>
