<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcomingEvents extends Model
{
    use HasFactory;

    protected $table = 'upcomingevents';

    protected $fillable = [
        'title','passport','post','user_id'];

    public function user() {

        return $this->belongsTo(User::class);

  }
}
