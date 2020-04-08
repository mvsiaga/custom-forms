<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use SoftDeletes;

    public function fields()
    {
        return $this->hasMany('App\Models\Field');
    }
}
