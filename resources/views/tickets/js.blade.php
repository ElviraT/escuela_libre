<script src="{{ asset('assets/plugins/select2/js/custom-select.js') }}"></script>
<script>
    $(document).on('show.bs.modal', '#add_ticket', function(e) {
        $('#due_date').datetimepicker({
            useCurrent: false,
            format: 'DD-MM-YYYY',
            debug: true,
        })
    })

    $(document).on('show.bs.modal', '#img_details', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        if (data.bsRecordId != undefined) {
            $.getJSON('./' + data.bsRecordId + '/img', function(data) {
                var obj = data;
                var url = "{{ asset(Storage::url('comment/:img')) }}";
                var image = url.replace(':img', obj.image);
                $('#img').attr("src", image);
            });
        }
    });
    $(document).on('hidden.bs.modal', '#img_details', function(e) {
        $('#img').val("{{ asset('assets/img/images.png') }}");
    });
</script>
