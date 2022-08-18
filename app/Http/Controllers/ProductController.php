<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetAllProductsRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\Builder;

class ProductController extends Controller
{
    /**
     * @param GetAllProductsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(GetAllProductsRequest $request) : JsonResponse
    {
        $query = Product::query()->where('status', '!=', 0);

        //Фильтрации

        if ($request->input('filter_min_price')!== null) {
            $query->whereHas('prices', function (\Illuminate\Database\Eloquent\Builder $query) use ($request) {
                $query->where('price', '>=', $request->input('filter_min_price'))->where('price_type', 'normal price');
            });

        }

        if ($request->input('filter_max_price')!== null) {
            $query->whereHas('prices', function (\Illuminate\Database\Eloquent\Builder $query) use ($request) {
               $query->where('price', '<=', $request->input('filter_max_price'))->where('price_type', 'normal price');
            });
        }

        if($request->input('filter_publisher')!== null) {
            $query->whereHas('publisher', function (\Illuminate\Database\Eloquent\Builder $query) use ($request) {
               $query->where('name', $request->input('filter_publisher'));
            });

        }

        if($request->input('filter_category')!== null) {
            $query->join('category_product', 'products.id', '=', 'category_product.product_id')
                ->join('categories', 'category.id', '=', 'category_product.category.id')
                ->where('category.name', '=', $request->input('filter_category'));
        }

        if ($request->input('filter_novelty')!== null) {
            $query->select('name')->where('novelty', '=', $request->input('filter_novelty'));
        }

        //Сортировки

        if ($request->input('sortByPrice')!== null) {
            if ($request->input('sortByPrice') == true) {
//                $query->join('prices', 'products.id', '=', 'prices.product_id')
//                    ->orderBy('price');

                $query->whereHas('prices', function (\Illuminate\Database\Eloquent\Builder $query) {
                    $query->orderBy('price');
                });

            }
        }

        if ($request->input('sortByNovelty')!== null) {
            if ($request->input('sortByNovelty') == true) {
                $query->orderBy('novelty');

            }
        }

        if ($request->input('sortByPosition')!== null) {
            if ($request->input('sortByPosition') == true) {
                $query->orderByDesc('position');

            }
        }

        return \response()->json(ProductResource::collection($query->get()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
