<?php

namespace duncanrmorris\assays\App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class assays extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'assay_id', 
    ];
}
