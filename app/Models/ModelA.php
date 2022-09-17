<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelA extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_star'
    ];
    public function modelB()
    {
        return $this->hasOne(ModelB::class);
    }
}
