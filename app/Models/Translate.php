<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Translate extends Model
{
    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['text', 'name'];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatable = ['text'];
}
