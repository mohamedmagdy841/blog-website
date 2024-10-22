<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'subject', 'message', 'blog_id'];

    public function blog(): belongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}
