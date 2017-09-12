<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function groupUsers()
    {
        return $this->hasManyThrough(User::class, UserGroup::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
