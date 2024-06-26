<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Chef extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Relacion 1 a N con totalidad
    public function pizzas(){
        return $this -> hasMany(Pizza::class);
    }
}
