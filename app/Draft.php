<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'drafts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['water_need_qty', 'purpose', 'budget', 'start_date', 'service_duration', 'pipe_size', 'pipe_setup_price', 'technology', 'sale_name', 'company', 'other'];

    
}
