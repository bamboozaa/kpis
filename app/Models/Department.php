<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = ['dep_name', 'cost_center', 'div_id'];
    protected $primaryKey = 'dep_id';

    public function faculties(): HasMany {
        return $this->hasMany(Faculty::class);
    }

    public function division(): BelongsTo {
        return $this->belongsTo(Division::class, 'div_id');
    }
}
