<?php

namespace App\Traits;

trait ImportFromCSV
{
    abstract protected static function mapImportAttributes(array $record);

    public static function importData($data)
    {
        static::truncate();

        $importedData = [];

        foreach ($data as $record) {
            $model = static::create(static::mapImportAttributes($record));
            $importedData[] = $model;
        }

        return $importedData;
    }
}
