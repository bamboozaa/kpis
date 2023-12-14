<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Goal extends Model
{
    use HasFactory;
    protected $table = 'goals';
    protected $fillable = ['goal', 'user_id'];
    protected $primaryKey = 'goa_id';

    public function indicators(): HasMany {
        return $this->hasMany(Indicator::class);
    }
}
