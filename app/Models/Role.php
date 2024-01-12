<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users_role;

class Role extends Model
{
    use HasFactory;

	protected $fillable = [
        'id',
        'user_id',
		'role_id',
    ];

	public function users_role()
    {
        return $this->belongsTo(Users_role::class);
    }

}
