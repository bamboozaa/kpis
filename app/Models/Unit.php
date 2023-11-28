<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'units';
    protected $fillable = ['unit_name', 'dep_id', 'owner'];
    protected $primaryKey = 'unit_id';

    public function user_name() {
        return $this->hasOne('App\Models\User', 'username', 'owner');
    }

    public function department_name() {
        return $this->hasOne('App\Models\Department', 'dep_id', 'dep_id');
    }
}
