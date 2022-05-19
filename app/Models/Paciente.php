<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cita;

class Paciente extends Model
{
    use HasFactory;

    public function citas (){
        return $this->hasMany(Cita::class);
    }
}
