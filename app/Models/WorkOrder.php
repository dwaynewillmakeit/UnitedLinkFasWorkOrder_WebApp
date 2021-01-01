<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id', 'id');
    }

    public function siteAddress()
    {
        return $this->belongsTo('App\Models\ClientAddress', 'site_address_id', 'id');
    }

    public function billingAddress()
    {
        return $this->belongsTo('App\Models\ClientAddress', 'billing_address_id', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }
}
