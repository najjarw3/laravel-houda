<?php

namespace Test;

use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'classroom_id',
            ];


     public function classroom()
   {
       return $this->hasOne('Test\Classroom', 'id', 'classroom_id');
   }

}
