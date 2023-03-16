<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=  [
        'message',
        'commenter_id',
    ];
    /**
     * Get the attachmentable that owns the Attachment
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function commenter()
    {
        return $this->belongsTo(User::class,'commenter_id');
    }
}
