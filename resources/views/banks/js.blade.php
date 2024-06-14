<!-- <script src="{{ asset('assets/plugins/select2/js/custom-select.js') }}"></script> -->
<script>
    $(document).on('show.bs.modal', '#bank_details', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        $("#form-enviar").attr('action', data.bsAction);
        $("#method").val('post');
        if (data.bsRecordId != undefined) {
            $('.title').text("@lang('Edit Bank')");
            $('.modal_registro_bank_id', modal).val(data.bsRecordId);
            $.getJSON('../banks/' + data.bsRecordId + '/edit', function(data) {
                var obj = data;
                $("#form-enviar").attr('action', data.bsAction);
                $("#method").val('put');
                $('#name', modal).val(obj.name);
                $('#account', modal).val(obj.account);
                $('#titular', modal).val(obj.titular);

            });
        } else {
            $('.title').text("@lang('Add Bank')");
        }
    });

    $(document).on('hidden.bs.modal', '#bank_details', function(e) {
        $("#method").val('post');
        $('#name').val('');
        $('#account').val('');
        $('#titular').val('');
    });
</script>
