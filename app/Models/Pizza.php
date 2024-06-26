<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function chef(){
        return $this -> belongsTo(Pizza::class);
    }

    // Relacion N a N con ingredientes
    public function ingredientes(){
        return $this -> belongsToMany(Ingrediente::class,"tiene");
    }
}
