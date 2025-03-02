<?php
namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory, HasSlug;
    protected $slugSourceColumn = 'name';

    protected $guarded = [];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
