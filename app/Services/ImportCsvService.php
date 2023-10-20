<?php

namespace App\Services;

use Exception;
use League\Csv\Reader;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Contracts\iImportCsvContract;
use Illuminate\Database\Eloquent\Model;

class ImportCsvService implements iImportCsvContract
{
    // apply types
    private $csv_mimetypes = array(
        'text/csv',
        'text/plain',
        'application/csv',
        'text/comma-separated-values',
        'application/txt',
    );


    /**
     * Import csv file
     * @param $file
     * @param Model $model
     * @param string $delimiter
     * @return Reader $csv
     */
    public function import($file, Model $model, string $delimiter = ";"): array
    {
        $records = $this->validate($file)->getRecords();
        $imported_models = $model->importData($records);

        return $imported_models;
    }

    /**
     * Validate csv file
     * @param $file
     * @param string $delimiter
     * @return Reader $csv
     */
    public function validate($file, string $delimiter = ";"): Reader
    {
        if (!in_array($file->getMimeType(), $this->csv_mimetypes)) {
            throw new Exception("Неверный тип файла");
        }
        // в потоке, экономим память
        try {
            $csv = Reader::createFromPath($file, 'r');
            $csv->setHeaderOffset(0);
            $csv->setDelimiter($delimiter);
        } catch (Exception $e) {
            echo $e->getMessage(), PHP_EOL;
        }

        return $csv;
    }

    // Не используется
    protected function validateHeaders(Reader $reader, $base_headers)
    {
        $file_headers = array_keys($reader->fetchOne());
        if ($base_headers !== $file_headers) {
            throw new Exception("Заголовки не совпадают!");
        }
    }
}
