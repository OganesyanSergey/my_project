<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Users_role extends Model
{
    use HasFactory;

	protected $fillable = [
        'id',
        'role',
    ];

	public function roles()
    {
        return $this->hasMany(Role::class, 'role_id', 'id');
    }

}
