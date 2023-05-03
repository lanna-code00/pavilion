<?php
namespace App\Traits;

trait PaginateDataTrait {

    public function scopePaginateData($query, $request, $option = "latest", $page_size = 0)
    {
        $query->when($request->search_type, function($query) use($request){
            $query->where('first_name', 'LIKE' , '%' . $request->input('search_type') . '%')
            ->orWhere('last_name', 'LIKE', '%' . $request->input('search_type') . '%')
            ->orWhere('email', 'LIKE', '%' . $request->input('search_type') . '%');
        });

        return $this->returnPattern($query, $option, $request, $page_size);
    }

    function returnPattern($query, $option, $request, $page_size){
        if($option === "latest"){
            return $request->page_size ? $query->latest()->paginate($request->page_size ?? 10) : $query->latest()->get();
        }

        if($option === "random"){
        //    return $query->latest()->get() ?? $query->inRandomOrder()->paginate($request->page_size ?? 10);
           return $request->page_size ? $query->inRandomOrder()->paginate($request->page_size ?? 10) : $query->inRandomOrder()->get();
        }
    }
}

