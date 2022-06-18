<?php

namespace App\Models;

use App\Models\Classes\FileModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Task extends FileModel implements HasMedia
{
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['file_name', 'view_name', 'lecture_id'];

    /**
     * The location of the place where file should be stored.
     *
     * @var string
     */
    protected $location = 'tasks';

    /**
     * The location of the place where view should be stored (in view format).
     *
     * @var string
     */
    protected $locationView = 'tasks';

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
     * Relation: get all tasks.
     *
     * @return HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Relation: get the lecture.
     *
     * @return BelongsTo
     */
    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
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
