<script src="{{ asset('assets/plugins/select2/js/custom-select.js') }}"></script>
<script>
    $(document).on('show.bs.modal', '#city_details', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        $("#idCountry,#idState").select2({
            dropdownParent: "#city_details"
        });
        $("#form-enviar").attr('action', data.bsAction);
        $("#method").val('post');
        if (data.bsRecordId != undefined) {
            $('.title').text("@lang('Edit State')");
            $('.modal_registro_city_id', modal).val(data.bsRecordId);
            $.getJSON('./cities/' + data.bsRecordId + '/edit', function(data) {
                var obj = data;

                $('#idCountry').val(obj.idCountry).trigger('change.select2');
                $('#idState').val(obj.idState).trigger('change.select2');
                // $('#idMaritalState').val(obj.idMaritalState).trigger('change.select2');
                // $('#idStatus').val(obj.idStatus).trigger('change.select2');
                // $('#id_user').val(obj.id_user).trigger('change.select2');
                $("#form-enviar").attr('action', data.bsAction);
                $("#method").val('put');
                $('#name', modal).val(obj.name);
                // $('#ncolegio', modal).val(obj.ncolegio);
            });
        } else {
            $('.title').text("@lang('Add City')");
        }
    });
    $(document).on('hidden.bs.modal', '#city_details', function(e) {
        $('#idCountry').val('').trigger('change.select2');
        $('#idState').val('').trigger('change.select2');
        // $('#idMaritalState').val('').trigger('change.select2');
        // $('#idStatus').val('').trigger('change.select2');
        // $('#id_user').val('').trigger('change.select2');
        $("#method").val('post');
        $('#name').val('');
    });
    $(document).ready(function() {
        $('#idCountry').on('select2:select', function(event) {
            var idCountry = $(this).val();

            $.ajax({
                url: './combo/' + idCountry + '/state',
                method: "GET",

                success: function(data) {
                    var html = "";
                    $.each(data, function(index, value) {
                        html += '<option value="' + value.id + '">' + value.name +
                            "</option>";
                    });
                    $("#idState").html(html);
                },
                error: function() {
                    alert("error")
                }
            });
        });
    });
</script>
