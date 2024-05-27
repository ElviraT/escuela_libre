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
    $(document).ready(function() {
        $('#id_grade').on('select2:select', function(event) {
            var grade = $(this).val();
            $.ajax({
                url: '../combo/' + grade + '/group',
                method: "GET",

                success: function(data) {
                    $("#id_group").prop('disabled', false);
                    var html = "";
                    $.each(data, function(index, value) {
                        html += '<option value="' + value.id + '">' + value.name +
                            "</option>";
                    });
                    $("#id_group").html(html);
                },
                error: function() {
                    alert("error")
                }
            });
        });
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
                $('#id_user').val(obj.id_user).trigger('change.select2');
                $('#id_group').val(obj.id_group).trigger('change.select2');
                $('#id_grade').val(obj.id_grade).trigger('change.select2');
                $('#id_modality').val(obj.id_modality).trigger('change.select2');
                $("#form-enviar").attr('action', data.bsAction);
                $("#method").val('put');
                $('#name', modal).val(obj.name);
                $('#last_name', modal).val(obj.last_name);
                $('#dni', modal).val(obj.dni);
                $('#birthdate', modal).val(obj.birthdate);
                $('#registration', modal).val(obj.registration);
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
        $('#id_user').val('').trigger('change.select2');
        $('#id_group').val('').trigger('change.select2').prop('disabled', true);
        $('#id_grade').val('').trigger('change.select2');
        $("#method").val('post');
        $('#name').val('');
        $('#last_name').val('');
        $('#dni').val('');
        $('#birthdate').val('');
        $('#registration').val('');
        $('#alergy_id').prop('checked', false).change();
        $('#disability_id').prop('checked', false).change();
        $('#type_alergy').val('');
        $('#type_disability').val('');
        $('#type_blood').val('');

        $('#step1-tab').addClass('active');
        $('#step1').addClass('show active');
        $('#step2-tab').removeClass('active');
        $('#step2').removeClass('show active');
        $('#step3-tab').removeClass('active');
        $('#step3').removeClass('show active');
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

    $(function() {
        $('#next').click(function() {
            loading_show();
            $('#step1-tab').removeClass('active');
            $('#step1').removeClass('show active');
            $('#step2-tab').addClass('active');
            $('#step2').addClass('show active');
            loading_hide();
        });
        $('#back').click(function() {
            loading_show();
            $('#step1-tab').addClass('active');
            $('#step1').addClass('show active');
            $('#step2-tab').removeClass('active');
            $('#step2').removeClass('show active');
            loading_hide();
        });
        $('#continue').click(function() {
            loading_show();
            $('#step2-tab').removeClass('active');
            $('#step2').removeClass('show active');
            $('#step3-tab').addClass('active');
            $('#step3').addClass('show active');
            loading_hide();
        });
        $('#previus').click(function() {
            loading_show();
            $('#step2-tab').addClass('active');
            $('#step2').addClass('show active');
            $('#step3-tab').removeClass('active');
            $('#step3').removeClass('show active');
            loading_hide();
        });
    });
</script>
