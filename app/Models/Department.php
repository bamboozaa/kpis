<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = ['dep_name', 'cost_center'];
    protected $primaryKey = 'dep_id';

    public function faculties(): HasMany {
        return $this->hasMany(Faculty::class, 'dep_id', 'dep_id');
    }
}
