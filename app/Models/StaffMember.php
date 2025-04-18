<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class StaffMember extends Authenticatable
{
    use HasFactory;
    protected $guard = 'staff_members';
    protected $fillable = ['name', 'email', 'password', 'is_active'];
}
