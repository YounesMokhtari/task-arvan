<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelB extends Model
{
    use HasFactory;

    protected $fillable = [
        'star_count',

    ];
    public function modelA()
    {
        return $this->belongsTo(ModelA::class, 'model_a_id');
    }
}
