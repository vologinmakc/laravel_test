<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $fillable = [
        'title', 'img_url', 'text',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

}
