<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    protected $with = 'tags';

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false,
            function (Builder $query, $search) {
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhereHas('tags', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->using(TagTopic::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
