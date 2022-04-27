<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Task extends Model
{
    //
    use Notifiable;

    protected $fillable = ['title', 'desc', 'category', 'user_id', 'datetask'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
