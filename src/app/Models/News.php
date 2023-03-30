<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id'
    ];

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
