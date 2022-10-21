<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homes extends Model
{
    use HasFactory;
    protected $table = 'homes';

    public function posts()
    {
        return $this->hasMany(HomeImages::class);
    }
}