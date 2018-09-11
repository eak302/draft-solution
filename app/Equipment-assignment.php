<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipmentassignment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'equipment-assignments';

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
    protected $fillable = ['technology_name', 'equipment_name', 'equipment_picture', 'layer'];

    
}
