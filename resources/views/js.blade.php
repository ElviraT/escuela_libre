<script>
    const intro = introJs().setOptions({
        steps: [{
                title: 'Bienvenido',
                intro: 'Bienvenido al sistema Escuela Libre Chile'
            },
            {
                title: "Barra informativa",
                element: document.querySelector('.first'),
                intro: 'Muestra información para acceso rápido'
            },
            {
                title: "Menu",
                element: document.querySelector('.second'),
                intro: 'Panel de navegación del sistema'
            }
        ],
    });

    document.getElementById('iniciarIntroBtn').addEventListener('click', () => {
        intro.start();
    });

    introJs().addHints();

    function recordatorio(id) {
        $.ajax({
            url: '/reminder/' + id,
            method: "GET",

            success: function(data) {
                toastr["success"]("¡Operación exitosa!", "Mensaje Enviado");
            },
            error: function() {
                alert("error")
            }
        });
    }

    $(document).on('show.bs.modal', '#cambiar_status', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        $("#id_status2").select2({
            dropdownParent: "#cambiar_status"
        });
        $('.modal_registro_user_id', modal).val(data.bsRecordId);
        $('.title').text("@lang('Change Status')");
    });
    $(document).on('hidden.bs.modal', '#cambiar_status', function(e) {
        $('#id_status2').val('').trigger('change.select2');
    });
    $(document).ready(function() {
        $('tr').click(function() {
            const id = $(this).attr('id'); // Obtiene el ID de la fila
            mostrarDetalles(id);
        });
    });

    function mostrarDetalles(id) {

        $.getJSON('../dashboard/anuncio_mostrar/' + id + '/mostrar', function(data) {
            $('#content').text(data.content);
        });

        showModal();
    }

    function showModal() {
        $('#modalDetalle').modal('show');
    }
    $(document).on('hidden.bs.modal', '#modalDetalle', function(e) {
        $('#content').text('');
    });
</script>
