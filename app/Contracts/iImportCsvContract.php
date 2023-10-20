<?php

namespace App\Contracts;

use League\Csv\Reader;
use Illuminate\Database\Eloquent\Model;

interface iImportCsvContract
{
    public function import($file, Model $model, string $delimiter = ";"): array;
    public function validate($file, string $delimiter = ";"): Reader;
}
