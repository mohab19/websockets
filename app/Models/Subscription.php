<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'channel_id',
        'user_id',
    ];

    public function Channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
