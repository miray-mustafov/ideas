<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bio',
        'image',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function ideas()
    {
        return $this->hasMany(Idea::class)->orderBy('created_at', 'desc');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();// or ->orderBy('created_at', 'desc')
    }
    public function followings()
    {
        return $this->belongsToMany(
            User::class, 'follower_user', 'follower_id','user_id'
        )-> withTimestamps();
    }
    public function followers()
    {
        return $this->belongsToMany(
            User::class, 'follower_user', 'user_id','follower_id'
        )-> withTimestamps();
    }
    public function follows(User $user){
        return $this->followings()->where('user_id',$user->id)->exists();
    }

    //!!! Nice
    public function getImageUrl()
    {
        if ($this->image) {
            return url('storage/' . $this->image);
        }
        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={$this->name}";
    }

}
