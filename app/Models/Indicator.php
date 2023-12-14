<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;
    protected $table = 'indicators';
    protected $fillable = ['gao_id', 'indicator', 'weight'];
    protected $primaryKey = 'ind_id';

    public function goal(): BelongsTo {
        return $this->belongsTo(Goal::class, 'goa_id');
    }
}
