<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    use HasFactory;
    protected $table = 'divisions';
    protected $fillable = ['div_name', 'cost_center'];
    protected $primaryKey = 'div_id';

    public function departments(): HasMany {
        return $this->hasMany(Department::class);
    }
}
