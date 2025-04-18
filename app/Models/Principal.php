<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Principal extends Authenticatable
{
    use HasFactory;
    // Guard define in config/auth.php
    protected $table = 'principals';
    protected $guard = 'principal';
    protected $fillable = ['name', 'email', 'password', 'is_active'];
}
