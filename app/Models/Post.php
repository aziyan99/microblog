<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'thumbnail', 'category_id', 'body', 'views', 'user_id'
    ];

    /**
     * Relation to the category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryNameAttribute()
    {
        $category = Category::find($this->id);
        return $category->name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
