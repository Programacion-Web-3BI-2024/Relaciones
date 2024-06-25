<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ingrediente extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    // Relacion N a N con ingredientes
    public function pizzas(){
        return $this -> belongsToMany(Pizza::class, "tiene");
    }
}
