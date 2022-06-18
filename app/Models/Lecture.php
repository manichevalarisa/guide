<?php

namespace App\Models;

use App\Models\Classes\FileModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Lecture extends FileModel implements HasMedia
{
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'file_name', 'view_name', 'order', 'description', 'name', 'slug', 'product_id', 'time', 'is_frame', 'frame_height', 'lang', 'main_image', 'back_image'];

    /**
     * The location of the place where file should be stored.
     *
     * @var string
     */
    protected $location = 'lectures';

    /**
     * The location of the place where view should be stored (in view format).
     *
     * @var string
     */
    protected $locationView = 'lectures';

    /**
     * Attribute: get content of the template.
     *
     * @return string
     */
    public function getContentAttribute()
    {
        return $this->getContent();
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
     * Attribute: get back image path.
     *
     * @return integer
     */
    public function getBackImagePathAttribute()
    {
        return $this->back_image ? Storage::url($this->back_image) : '';
    }

    /**
     * Relation: get all tasks.
     *
     * @return HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Relation: get all user's interactions.
     *
     * @return HasMany
     */
    public function userInteractions()
    {
        return $this->hasMany(LectureUserInteraction::class);
    }

    /**
     * Relation: get the product.
     *
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the files collection
     *
     * @return array
     */
    public function getFilesCollection()
    {
        $media = $this->getMedia('multi_files_collection');
        $response = [];
        foreach ($media as $k => $photo) {
            $response[] = $photo->getUrl();
        }
        return $response;
    }

    /**
     * Attribute: get users interactions
     *
     * @return array
     */
    public function getUsersInteractionsAttribute()
    {
        return $this->userInteractions()->where('user_id')->pluck('action')->toArray();
    }

    /**
     * Attribute: get users interactions
     *
     * @param string $action
     * @return boolean
     */
    public function checkForInteraction(string $action)
    {
        return $this->userInteractions()->where('user_id', auth()->user()->id)->where('action', $action)->exists();
    }

    /**
     * Get progress for the current user
     *
     * @return mixed
     */
    public function getProgress()
    {
        $userID = auth()->user()->id;
        return ($this->userInteractions()->where('user_id', $userID)->count() * 100) / ($this->tasks()->count() + 1);
    }

    /**
     * Get the next lecture
     *
     * @return mixed
     */
    public function getNextLecture()
    {
        if(!$this->product) return false;
        return $this->product->lectures()->where('order', '>', $this->order)->first();
    }

    /**
     * Get the previous lecture
     *
     * @return mixed
     */
    public function getPreviousLecture()
    {
        if(!$this->product) return false;
        return $this->product->lectures()->where('order', '<', $this->order)->first();
    }

    /**
     * Register the media collections.
     *
     * @return void
     *
     * @throws \Exception
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('multi_files_collection')
            ->acceptsMimeTypes(['application/msword', 'application/pdf', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.wordprocessing', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'image/bmp', 'image/cis-cod', 'image/gif', 'image/ief', 'image/jpeg', 'image/pipeg', 'image/svg+xml', 'image/tiff', 'image/tiff', 'image/x-cmu-raster', 'image/x-cmx', 'image/x-icon', 'image/x-portable-anymap', 'image/x-portable-bitmap', 'image/x-portable-graymap', 'image/x-portable-pixmap', 'image/x-rgb', 'image/x-xbitmap', 'image/x-xpixmap', 'image/x-xwindowdump', 'image/png']);
    }
}
