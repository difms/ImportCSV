<?php

namespace App\Enums;

/*
|--------------------------------------------------------------------------
|   Варианты связей для сущностей
|--------------------------------------------------------------------------
*/

enum eModels: string
{
    /**
     * Варианты связей
     */
    case ImportProductsFromCsv = 'import_products_csv';

    static public function getFromValue(string $value)
    {
    }


    public function scheme()
    {
        // return match ($this) {}
    }
}
