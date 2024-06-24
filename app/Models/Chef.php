<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Chef extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function pizzas(){
        return $this -> hasMany(Pizza::class);
    }
}
