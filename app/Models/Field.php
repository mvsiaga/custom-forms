<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Field extends Model
{
    use SoftDeletes;

    protected $fillable = ['form_id', 'name', 'tag', 'sequence'];

    public function form()
    {
        return $this->belongsTo('App\Models\Fields');
    }

    public function contact_fields()
    {
        return $this->belongsTo('App\Models\ContactField');
    }
}
