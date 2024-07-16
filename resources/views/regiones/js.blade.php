<script src="{{ asset('assets/plugins/select2/js/custom-select.js') }}"></script>
<script>
    $(document).on('show.bs.modal', '#state_details', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        $("#idCountry").select2({
            dropdownParent: "#state_details"
        });
        $("#form-enviar").attr('action', data.bsAction);
        $("#method").val('post');
        if (data.bsRecordId != undefined) {
            $('.title').text("@lang('Edit State')");
            $('.modal_registro_region_id', modal).val(data.bsRecordId);
            $.getJSON('./regiones/' + data.bsRecordId + '/edit', function(data) {
                var obj = data;

                $('#idCountry').val(obj.idCountry).trigger('change.select2');
                // $('#idMaritalState').val(obj.idMaritalState).trigger('change.select2');
                // $('#idStatus').val(obj.idStatus).trigger('change.select2');
                // $('#id_user').val(obj.id_user).trigger('change.select2');
                $("#form-enviar").attr('action', data.bsAction);
                $("#method").val('put');
                $('#name', modal).val(obj.name);
                // $('#ncolegio', modal).val(obj.ncolegio);
            });
        } else {
            $('.title').text("@lang('Add State')");
        }
    });
    $(document).on('hidden.bs.modal', '#state_details', function(e) {
        $('#idCountry').val('').trigger('change.select2');
        // $('#idMaritalState').val('').trigger('change.select2');
        // $('#idStatus').val('').trigger('change.select2');
        // $('#id_user').val('').trigger('change.select2');
        $("#method").val('post');
        // $('#register').val('');
        $('#name').val('');
    });
</script>
