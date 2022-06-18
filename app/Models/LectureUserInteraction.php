<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LectureUserInteraction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'user_id', 'lecture_id', 'action'];

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
     * Relation: get the usr.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
