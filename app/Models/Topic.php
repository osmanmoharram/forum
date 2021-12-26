<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->using(TagTopic::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
