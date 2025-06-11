<?php

namespace App\Models;

use App\Http\Filters\V1\QueryFilter;
use App\Http\Filters\V1\TicketFilter;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeBuilder(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }
}
