<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoleHasPermission extends Model
{
    use HasFactory;

    protected $table = 'role_has_permissions';
    public $timestamps = false;

    protected $fillable = [
        'permission_id',
        'role_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id', 'id');
    }
}
