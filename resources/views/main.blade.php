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
</head>

<body class="antialiased">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="{{ route('import') }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('csv') ? ' has-error' : '' }}">
                                <label for="csv" class="col-md-4 control-label">Импорт товаров из csv</label>

                                <div class="col-md-6 mt-3">
                                    <input id="csv" type="file" class="form-control" name="csv" required
                                        accept="text/csv">

                                    @if ($errors->has('csv'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('csv') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Импортировать товары
                                    </button>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <a href="/test.csv">
                                    <span class="btn btn-warning">
                                        Скачать тестовый .csv файл (normalize)
                                    </span>
                                </a>
                            </div>

                            <div class="form-group mt-3">
                                <a href="/products">
                                    <span class="btn btn-success">
                                        Посмотреть загруженные ранее товары в БД
                                    </span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
