<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'sale_price', 'default_price', 'sale_end', 'label', 'main_image'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'sale_end' => 'datetime'
    ];

    /**
     * Attribute: get current price.
     *
     * @return float
     */
    public function getCurrentPriceAttribute()
    {
        $price = $this->default_price;
        if($this->sale_price && ( is_null($this->sale_end) || (new \DateTime() > $this->sale_end))) $price = $this->sale_price;
        return $price;
    }

    /**
     * Attribute: get main image path.
     *
     * @return integer
     */
    public function getMainImagePathAttribute()
    {
        return $this->main_image ? Storage::url($this->main_image) : '';
    }

    /**
     * Attribute: get lectures count.
     *
     * @return integer
     */
    public function getLecturesCountAttribute()
    {
        $count = 0;
        if($this->lectures()->exists()) $count = $this->lectures()->count();
        return $count;
    }

    /**
     * Attribute: get lectures count name.
     *
     * @return string
     */
    public function getLecturesCountNameAttribute()
    {
        return $this->lectures_count == 1 ? 'Lecture' : 'Lectures';
    }

    /**
     * Attribute: get lessons count name.
     *
     * @return string
     */
    public function getTasksCountNameAttribute()
    {
        return $this->tasks_count == 1 ? 'Task' : 'Tasks';
    }

    /**
     * Attribute: get tasks count.
     *
     * @return integer
     */
    public function getTasksCountAttribute()
    {
        $count = 0;
        if($this->tasks()->exists()) $count = $this->tasks()->count();
        return $count;
    }

    /**
     * Relation: get all lectures.
     *
     * @return HasMany
     */
    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    /**
     * Relation: get all tasks.
     *
     * @return HasManyThrough
     */
    public function tasks()
    {
        return $this->hasManyThrough(Task::class, Lecture::class);
    }

}
