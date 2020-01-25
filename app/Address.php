<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
    ];

    protected $table = 'addresses';
    //primary key
    public $primarykey = '$id';
     //Timestamps
     public $timestamps =true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
