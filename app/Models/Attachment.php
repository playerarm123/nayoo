<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable=  [
        'name',
        'url',
    ];
    /**
     * Get the attachmentable that owns the Attachment
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function attachmentable(): MorphTo
    {
        return $this->morphTo();
    }
}
