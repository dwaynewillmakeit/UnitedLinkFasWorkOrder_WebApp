<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAddress extends Model
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

    public function type()
    {
        return $this->belongsTo('App\Models\ClientAddressType','address_type_id','id');
    }
}
