<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }
    </style>
</head>

<body>
    <h1>{{ $data[0]->student->name . '' . $data[0]->student->last_name }}</h1>
    <p><strong>@lang('Grade')</strong> {{ $data[0]->grade->name }}</p>
    <p><strong>@lang('Group')</strong> {{ $data[0]->group->name }}</p>

    <hr>
    <center>
        <h3>@lang('Report Ratings')</h3>
    </center>

    <table class="table" width="100%">
        <thead>
            <tr align="left">
                <th>@lang('Matter')</th>
                <th>@lang('Rating')</th>
                <th>@lang('Comment')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->matter->name }}</td>
                    <td>
                        @if ($item->rating < 5)
                            <strong style="color: crimson">{{ $item->rating }}</strong>
                        @else
                            <span>{{ $item->rating }}</span>
                        @endif
                    </td>
                    <td>{{ $item->comment }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr align="left">
                <th><strong>@lang('Average')</strong></th>
                <th>{{ $data->avg('rating') }}</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</body>

</html>
