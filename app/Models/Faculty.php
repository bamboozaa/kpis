<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $table = 'faculties';
    protected $fillable = ['fac_name', 'dep_id'];
    protected $primaryKey = 'fac_id';

    public function department(): BelongsTo {
        return $this->belongsTo(Department::class, 'dep_id', 'dep_id');
    }
}
