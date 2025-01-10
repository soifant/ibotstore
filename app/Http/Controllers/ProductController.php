<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $data = Category::where('status', 1)
        ->with(['products' => function ($query) {
            $query->with(['prices' => function ($subQuery) {
                $subQuery->select('id', 'product_id','data');
            }]);
        }])
        ->get();

        return response()->json($data);
    }
}
