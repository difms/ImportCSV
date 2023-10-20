<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CSV Parse</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <style>
        th {
            position: sticky;
            left: 0px;
            background-color: grey;
        }
    </style>
</head>

<body class="antialiased">
    {{-- <div class="container" style="box-shadow: 0px 0px 15px 10px #ccc"> --}}
    <table class="table table-dark table-hover" style="font-size: 10px; width: 100%;">
        <tr style=" position:sticky;">
            <th>id</th>
            <th>SKU</th>
            <th>Наименование</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Цена СП</th>
            <th>Q</th>
            <th>Ед. изм</th>
            <th>Фото</th>
            <th>На главной</th>
            <th>Описание</th>
            <th>Совместные покупки</th>
            <th>Параметры</th>
        </tr>
        @foreach ($products ?? App\Models\Product::all() as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->title }}</td>
                <td>
                    @if ($product->l1)
                        {{ $product->l1 }}
                        @if ($product->l2)
                            >
                        @endif
                    @endif

                    @if ($product->l2)
                        {{ $product->l2 }}
                        @if ($product->l3)
                            >
                        @endif
                    @endif

                    @if ($product->l3)
                        {{ $product->l3 }}
                    @endif
                </td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->price_sp }}</td>
                <td>{{ $product->stock }}</td>


                <td>{{ $product->unit }}</td>
                <td>{{ $product->img }}</td>
                <td>{{ $product->on_main }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->related }}</td>
                <td>
                    {{ $product->params }}
                    {{-- @foreach (explode('/', $product->params) as $param)
                        <br>{{ $param }}
                    @endforeach --}}
                </td>
            </tr>
        @endforeach
    </table>
    {{-- </div> --}}
</body>

</html>
