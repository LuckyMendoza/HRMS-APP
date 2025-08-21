<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    protected $fillable = ['email', 'otp', 'expires_at'];

    protected $dates = ['expires_at'];
}