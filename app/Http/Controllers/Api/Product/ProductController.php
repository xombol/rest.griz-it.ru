<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Получить список Товаров
     * url - https://rest.griz-it.ru/api/products
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query()->with('properties')->paginate(40)->toJson();
        return response($products);
    }

    /**
     * Фильтр товаров
     * url - https://rest.griz-it.ru/api/products/filter?properties[color][]=red&properties[color][]=white&properties[weight][]=1000
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        // поля
        $columns = ['`properties`.`name`', '`product_properties`.`value`'];

        // переобразуем в массив
        foreach ($request->properties as $key => $prop) {
            foreach ($prop as $item) {
                $values[] = [$key, $item];
            }
        }

        // т.к не поддерживается множественный whereIn, пришлось кастамизировать
        $values = array_map(function (array $value) {
            return "('" . implode("', '", $value) . "')";
        }, $values);

        $products = Product::query()->whereHas('properties', function (Builder $query) use ($columns, $values, $request) {
            $query->whereRaw(
                '(' . implode(', ', $columns) . ') in (' . implode(', ', $values) . ')'
            )->groupBy('product_properties.product_id')->havingRaw('COUNT(*) = 2');

        })->with('properties')->paginate(40)->toJson();

        return response($products);
    }
}
