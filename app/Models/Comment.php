<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'idea_id',
        'body',
    ];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}
