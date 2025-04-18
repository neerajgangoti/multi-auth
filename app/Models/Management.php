<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Management extends Authenticatable
{
    use HasFactory;
    protected $guard = 'management';
    protected $table = 'managements';
    protected $fillable = ['name', 'email', 'password', 'is_active'];
}
