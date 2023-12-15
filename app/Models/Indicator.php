<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Indicator extends Model
{
    use HasFactory;
    protected $table = 'indicators';
    protected $fillable = ['goa_id', 'indicator', 'weight', 'user_id'];
    protected $primaryKey = 'ind_id';

    public function goal(): BelongsTo {
        return $this->belongsTo(Goal::class, 'goa_id');
    }
}
