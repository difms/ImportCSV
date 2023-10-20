<?php

namespace App\Http\Controllers;

use App\Contracts\iImportCsvContract;
use App\Models\Product;
use App\Http\Requests\ImportCsvRequest;
use App\Services\ImportCsvService;

class ParseCSVController extends Controller
{
    public function uploadCSV(ImportCsvRequest $request, iImportCsvContract $ics)
    {
        // model for import
        $model = new Product;

        $products = $ics->import($request->validated('csv'), $model);
        return view('products', compact('products'));
    }

    public function showProducts()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }
}
