<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likeable';

    public $timestamps = true;

    protected $fillable = ['likeable_id', 'likeable_type', 'user_id'];

    public function likeable()
    {
        return $this->morphTo();
    }
}
