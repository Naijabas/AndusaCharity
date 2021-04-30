<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','passport','post', 'user_id'

    ];


    // public function projects(){
    //     return $this->belongsToMany('App\Project');
    // }


}
