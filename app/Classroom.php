<?php

namespace Test;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'classroom';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'status',  
        'photo'   ];


        public function students()
   {
       return $this->hasMany('Test\Student', 'classroom_id', 'id');
   }



   
}
