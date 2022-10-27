<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image', 'price', 'active', 'category_id'];

    public function getImageAttribute(): string
    {
        $image = $this->attributes['image'];
        if ($image){
            if (Str::startsWith($image, 'http')){
                return $image;
            }else{
                if (Storage::exists($image)){
                    return Storage::url($image);
                }
                return 'https://bipbap.ru/wp-content/uploads/2017/04/0_7c779_5df17311_orig.jpg';
            }
        }
        return 'https://bipbap.ru/wp-content/uploads/2017/04/0_7c779_5df17311_orig.jpg';
    }

    public function setImageAttribute($value){
        $this->attributes['image'] = Str::lower($value);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }


}
