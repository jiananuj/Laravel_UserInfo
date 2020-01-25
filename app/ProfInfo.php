<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfInfo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
    ];

    //Table name

    protected $table = 'prof_infos';
    //primary key
    public $primarykey = '$id';
     //Timestamps
     public $timestamps =true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
