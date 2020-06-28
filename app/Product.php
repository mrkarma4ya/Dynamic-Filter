<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=['category_id','name','description','price'];

    public function category(){
        return $this->belongsTo(Category::class);
        
    }

    public function scopeWithFilters($query){
        return $query
        ->when(count(request()->input('categories', [])), function ($query) {
            $query->whereIn('category_id', request()->input('categories'));
        })
        ->when(request()->input('minPrice'),function($query){
            $query->where('price','>=',request()->input('minPrice')*100);
        })
        ->when(request()->input('maxPrice'),function($query){
            $query->where('price','<=',request()->input('maxPrice')*100);
        })
        ->when(request()->input('minPrice') && request()->input('maxPrice'),function($query){
            $query->whereBetween('price',[request()->input('minPrice')*100,request()->input('maxPrice')*100]);
        })
        ->when(request()->input('search'),function($query){
            $query->where('name','like','%'.request()->input('search').'%');
        })
        ->when(request()->input('orderBy'),function($query){
            // $orderBy = request()->input('orderBy');
            // if($orderBy == 'price_asc'){
            //     $query->orderBy('price','asc');
            // }

             $orderBy = [
                 'latest' => ['created_at','desc'],
                 'price_asc' => ['price','asc'],
                 'price_desc' => ['price','desc'],
                 'name_asc' => ['name','asc'],
                 'name_desc' => ['name','desc']
             ][request()->input('orderBy')];

             $query->orderBy($orderBy[0],$orderBy[1]);
        });
    }
}
