<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'url_image', 'url', 'date',
    ];

    /**
     * Get the user that owns the favorite
     */
    public function user () {
        return $this->belongsTo(User::class);
    }
}
