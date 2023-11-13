<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['type_id', 'title', 'slug', 'description', 'cover_image'];


    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public static function generateSlug($string)
    {
        return Str::slug($string, '-');
    }
}
