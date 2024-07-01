<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    // $guarded is opposite of fillable (you cannot mass assign these vars) and you should use on of them
    // protected $guarded=[]; => You can mass assign everything. But it's not advisable

    // for security purposes this is not put by default, it allows to fill the parameters
    protected $fillable = [
        'content',
        'likes',
    ];

    public function comments(){
        return $this->hasMany(Comment::class); //,foreignKey:'idea_id',localKey:'id'
        // no need to specify that, if we use that convention laravel will figure it out
    }
}
