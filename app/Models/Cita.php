<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
use App\Models\Medico;

class Cita extends Model
{
    use HasFactory;

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
     /**
     * Get the phone associated with the user.
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

}
