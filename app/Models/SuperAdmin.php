<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class SuperAdmin extends Authenticatable
{
    use HasFactory;
    // Guard define in config/auth.php
    protected $table = 'super_admins';
    protected $guard = 'super_admin';
    protected $fillable = ['name', 'email', 'password', 'is_active'];
}
