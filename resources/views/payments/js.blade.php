<script src="{{ asset('assets/plugins/select2/js/custom-select.js') }}"></script>
<script>
    $(document).on('show.bs.modal', '#payment_details', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();

        $('#payment_date').datetimepicker({
            useCurrent: false,
            format: 'DD-MM-YYYY',
            debug: true,
        });
        $("#id_representative,#id_bank,#id_method").select2({
            dropdownParent: "#payment_details"
        });
        $("#status").select2({
            dropdownParent: "#payment_details"
        });
        $("#form-enviar").attr('action', data.bsAction);
        $("#method").val('post');
        if (data.bsRecordId != undefined) {
            $('.title').text("@lang('Edit Payment')");
            $('.modal_registro_payment_id', modal).val(data.bsRecordId);
            $.getJSON('./payments/' + data.bsRecordId + '/edit', function(data) {
                var obj = data;
                $('#id_representative').val(obj.id_representative).trigger('change.select2');
                $('#id_bank').val(obj.id_bank).trigger('change.select2');
                $('#status').val(obj.id_status).trigger('change.select2');
                $('#id_method').val(obj.id_method).trigger('change.select2');
                $("#form-enviar").attr('action', data.bsAction);
                $("#method").val('put');
                $('#monto', modal).val(obj.monto);
                $('#description', modal).val(obj.description);
                $('#reference', modal).val(obj.reference);
                $('#payment_date', modal).val(obj.payment_date);
            });
        } else {
            $('.title').text("@lang('Add Payment')");
        }
    });
    $(document).on('hidden.bs.modal', '#payment_details', function(e) {
        $('#id_representative').val('').trigger('change.select2');
        $('#id_bank').val('').trigger('change.select2');
        $('#id_status').val('').trigger('change.select2');
        $('#id_method').val('').trigger('change.select2');
        $("#method").val('post');
        $('#monto').val('');
        $('#description').val('');
        $('#reference').val('');
        $('#payment_date').val('');
    });
    $(document).on('show.bs.modal', '#change_status', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        $("#id_status2").select2({
            dropdownParent: "#change_status"
        });
        $('.modal_registro_change_id', modal).val(data.bsRecordId);
        $('.title').text("@lang('Change Status')");
    });
    $(document).on('hidden.bs.modal', '#change_status', function(e) {
        $('#id_status2').val('').trigger('change.select2');
    });
</script>
