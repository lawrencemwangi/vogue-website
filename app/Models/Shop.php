<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Shop extends Model
{
    protected $fillable = [
        'item_name',
        'image',
        'size',
        'featured',
        'visibility',
        'category_id',
        'description',
        'price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImage()
    {
        if ($this->image && Storage::disk('public')->exists('service/' . $this->image)) {
            return Storage::url('service/' . $this->image);

        } else {
            // Path to your placeholder image
            return asset('assets/images/placeholder.gif');
        }
    }
}
