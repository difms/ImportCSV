<?php

namespace App\Models;

use App\Traits\ImportFromCSV;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, ImportFromCSV;

    protected $guarded = [];

    // маппинг для импорта из файлов
    public static function mapImportAttributes(array $record)
    {
        return [
            'sku' => $record['Код'] ?? null,
            'title' => $record['Наименование'],
            'l1' => $record['Уровень1'] ?? null,
            'l2' => $record['Уровень2'] ?? null,
            'l3' => $record['Уровень3'] ?? null,
            'price' => (float) $record['Цена'] ?? null,
            'price_sp' => (float) $record['ЦенаСП'] ?? null,
            'stock' => (int) $record['Количество'] ?? null,
            'params' => $record['Поля свойств'] ?? null,
            'related' => $record['Совместные покупки'] ?? null,
            'unit' => $unit ?? null,
            'img' => $record['Картинка'] ?? null,
            'on_main' => (int) $record['Выводить на главной'] ?? 0,
            'description' => $record['Описание'] ?? null,
        ];
    }
}
