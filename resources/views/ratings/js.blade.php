<script>
    $(document).ready(function() {
        $('#combo_grade').on('select2:select', function(event) {
            var grade = $(this).val();
            $.ajax({
                url: '../combo/' + grade + '/group',
                method: "GET",

                success: function(data) {
                    $("#combo_group").prop('disabled', false);
                    var html = "";
                    $.each(data, function(index, value) {
                        html += '<option value="' + value.id + '">' + value.name +
                            "</option>";
                    });
                    $("#combo_group").html(html);
                },
                error: function() {
                    alert("error")
                }
            });
        });
    });

    $(document).ready(function() {
        $('#combo_grade').on('select2:select', function(event) {
            var grade = $(this).val();
            $.ajax({
                url: '../combo/' + grade + '/matter',
                method: "GET",

                success: function(data) {
                    $("#combo_matter").prop('disabled', false);
                    var html = "";
                    $.each(data, function(index, value) {
                        html += '<option value="' + value.id + '">' + value.name +
                            "</option>";
                    });
                    $("#combo_matter").html(html);
                },
                error: function() {
                    alert("error")
                }
            });
        });
    });

    function cargar_tabla() {
        var grade = $('#combo_grade').val();
        var group = $('#combo_group').val();
        var data = [
            grade,
            group,
        ];
        $.ajax({
            url: '/ratings/data/get/' + data,
            method: 'GET',
            success: function(data) {
                createTable(data);
            }
        });
    };

    function createTable(data) {
        var table = document.createElement('table');
        table.classList.add('table', 'table-center', 'table-hover', 'datatable'); // Agregar clases en línea
        var thead = table.createTHead(); // Crea el elemento <thead>
        thead.classList.add('thead-light'); // Agregar clase en línea

        // Crea la fila de encabezado dentro de <thead>
        var headerRow = thead.insertRow();

        // Crea las celdas de encabezado para las 3 columnas
        var headerCell = headerRow.insertCell();
        headerCell.innerHTML = "ID"; // Columna 1
        headerCell = headerRow.insertCell();
        headerCell.innerHTML = "NOMBRE"; // Columna 2
        headerCell = headerRow.insertCell();
        headerCell.innerHTML = "Acciones"; // Columna 3

        // Crea el elemento <tbody>
        var tbody = table.createTBody();

        // Recorre los datos y crea filas y celdas dentro de <tbody>
        for (var i = 0; i < data.length; i++) {
            var row = tbody.insertRow();
            for (var key in data[i]) {
                var cell = row.insertCell();
                cell.innerHTML = data[i][key];
            }

            // Crea la celda con el botón para abrir el modal
            var actionCell = row.insertCell();
            var actionButton = document.createElement('button');
            actionButton.setAttribute('id', `action-button-${i}`); // ID único para cada botón
            actionButton.setAttribute('data-toggle', 'modal');
            actionButton.setAttribute('data-target', `#actionModal-${i}`); // ID único para cada modal
            actionButton.innerHTML = "<i class='fas fa-edit'></i>"; // Icono o texto para el botón
            actionCell.appendChild(actionButton);
        }
        document.getElementById('table-container').appendChild(table);
    }
</script>
