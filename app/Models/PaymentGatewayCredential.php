<?php

namespace App\Models;

use App\Traits\HasRestaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGatewayCredential extends Model
{

    use HasFactory, HasRestaurant;

    protected $guarded = ['id'];

    protected $casts = [
        'mix_by_yas_key' => 'encrypted',
        'flooz_key' => 'encrypted',
        'stripe_key' => 'encrypted',
        'razorpay_key' => 'encrypted',
        'stripe_secret' => 'encrypted',
        'razorpay_secret' => 'encrypted',
    ];

}
