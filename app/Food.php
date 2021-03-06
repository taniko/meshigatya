<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'name',
        'calorie',
        'red',
        'green',
        'yellow',
        'price',
    ];

    protected $appends = [
        'categories', 'allergies', 'photos', 'foodstuffs'
    ];

    protected $visible = [
        'id',
        'name',
        'calorie',
        'red',
        'green',
        'yellow',
        'price',
        'categories',
        'allergies',
        'photos',
        'foodstuffs',
        'restaurant',
    ];

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function allergies()
    {
        return $this->belongsToMany('App\Allergy');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    public function foodstuffs()
    {
        return $this->belongsToMany('App\Foodstuff');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function getCategoriesAttribute()
    {
        return $this->categories()->get();
    }

    public function getAllergiesAttribute()
    {
        return $this->allergies()->get();
    }

    public function getFoodstuffsAttribute()
    {
        return $this->foodstuffs()->get();
    }

    public function getPhotosAttribute()
    {
        return $this->photos()->pluck('filename')->map(function ($filename) {
            return asset("photos/{$filename}");
        });
    }

    public function attachCategory(Category $category)
    {
        if (!$this->categories()->where('category_id', $category->id)->exists()) {
            $this->categories()->attach($category->id);
        }
    }

    public function attachAllergy(Allergy $allergy)
    {
        if (!$this->allergies()->where('allergy_id', $allergy->id)->exists()) {
            $this->allergies()->attach($allergy->id);
        }
    }

    public function attachFoodstuff(Foodstuff $foodstuff)
    {
        if (!$this->foodstuffs()->where('foodstuff_id', $foodstuff->id)->exists()) {
            $this->foodstuffs()->attach($foodstuff->id);
        }
    }
}
