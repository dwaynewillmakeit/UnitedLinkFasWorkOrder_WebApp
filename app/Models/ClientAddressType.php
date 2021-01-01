<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAddressType extends Model
{
    use HasFactory;

    static  $BILLING_ADDRESS_ID =1;
    static  $SITE_ADDRESS_ID =2;
}
