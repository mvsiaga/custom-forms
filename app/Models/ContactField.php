<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactField extends Model
{
    use SoftDeletes;

    protected $fillable = ['contact_id', 'field_id', 'value'];

    public function contact()
    {
        return $this->belongsTo('App\Models\Contact');
    }

    public function field()
    {
        return $this->belongsTo('App\Models\Field');
    }
}
