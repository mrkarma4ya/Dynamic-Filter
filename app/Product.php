<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;


class Product extends Model
{
    //
    protected $fillable = ['category_id', 'name', 'description', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeWithFilters($query)
    {
        return $query
            ->when(count(request()->input('categories', [])), function ($query) {
                $query->whereIn('category_id', request()->input('categories'));
            })
            ->when(isset(request()->price[0]), function ($query) {
                if (is_numeric(request()->price[0])) {
                    $query->where('price', '>=', request()->price[0] * 100);
                }
            })
            ->when(isset(request()->price[1]), function ($query) {
                if (is_numeric(request()->price[1])) {
                    $query->where('price', '<=', request()->price[1] * 100);
                }
            })

            ->when(isset(request()->price[0]) && isset(request()->price[1]), function ($query) {
                if (is_numeric(request()->price[0]) && is_numeric(request()->price[1])) {
                    $query->whereBetween('price', [request()->price[0] * 100, request()->price[1] * 100]);
                }
            })
            ->when(request()->input('search'), function ($query) {
                $query->where('name', 'like', '%' . request()->input('search') . '%');
            })
            ->when(request()->input('orderBy'), function ($query) {
                $orderBy = [
                    'latest' => ['created_at', 'desc'],
                    'price_asc' => ['price', 'asc'],
                    'price_desc' => ['price', 'desc'],
                    'name_asc' => ['name', 'asc'],
                    'name_desc' => ['name', 'desc']
                ][request()->input('orderBy')];

                $query->orderBy($orderBy[0], $orderBy[1]);
            });
    }
}
