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
        'assay_id', 'assay_name', 'assay_barcode', 'assay_lot_no', 'assay_manufactured_date', 'assay_status'

    ];
}
