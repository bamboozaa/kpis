<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User_Faculty extends Model
{
    use HasFactory;
    protected $table = 'user__faculties';
    protected $fillable = ['user_id', 'fac_id'];

    public function faculty(): HasOne {
        return $this->hasOne(User_faculty::class, 'fac_id', 'user_id');
    }
}
