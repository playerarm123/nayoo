<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        "message",
        "type",
        "user_id",
    ];

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class,'attachmentable');
    }
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
