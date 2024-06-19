<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>{{ 'Recordatorio pago pendiente' }}</title>
    <style>
        body {
            font-family: "Segoe UI";
            font-size: 16px;
        }

        .rec {
            padding: 10px;
            justify-content: justify;
            align-content: justify;
            text-align: justify;
            letter-spacing: 0.7px;
            line-height: 24px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="rec">
        <p>{{ '¡Hola!' }} <strong>{{ $user->name . ' ' . $user->last_name }}</strong>,
            {{ 'ante todo reciba un cordial saludo,' }}</p>
        <p>{{ 'la presente es para recordarle que tiene un pango pendiente.' }}</p>
        <p>{{ 'del mes en curso por motivo de' }} <strong>{{ 'Cobro de mensualidad de ' }}{{ env('APP_NAME') }}</strong>
        </p>
    </div>
</body>

</html>
