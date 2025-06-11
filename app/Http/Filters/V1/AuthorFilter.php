<?php

namespace App\Http\Filters\V1;

class AuthorFilter extends QueryFilter
{
      protected $sortable = [
        'name',
        'email',
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at',
    ];
    public function include($value)
    {
        return $this->builder->with($value);
    }


    public function status($value)
    {
        return $this->builder->whereIn('status', explode(',', $value));
    }

    public function email($value)
    {
        $likeStr = str_replace('**', '%', $value);
        return $this->builder->where('email', 'like', "%{$likeStr}%");
    }

     public function name($value)
    {
        $likeStr = str_replace('**', '%', $value);
        return $this->builder->where('name', 'like', "%{$likeStr}%");
    }


    public function createdAt($value)
    {
        $dates = explode(',', $value);
        if (count($dates) > 1) {
            return $this->builder->whereBetween('created_at', $dates);
        }
        return $this->builder->whereDate('created_at', $value);
    }

    public function updatedAt($value)
    {
        $dates = explode(',', $value);
        if (count($dates) > 1) {
            return $this->builder->whereBetween('updated_at', $dates);
        }
        return $this->builder->whereDate('updated_at', $value);
    }
}
