<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Teacher extends Authenticatable
{
    use HasFactory;
    // Guard define in config/auth.php
    protected $guard = 'teacher';
    protected $table = 'teachers';
    protected $fillable = ['name', 'email', 'password', 'is_active'];
}
