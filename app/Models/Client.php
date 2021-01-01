<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User','created_by','id');
    }


    public function updatedBy()
    {
        return $this->belongsTo('App\Models\User','updated_by','id');
    }

    public function addresses()
    {
        return $this->hasMany('App\Models\ClientAddress','client_id','id');
    }
}
