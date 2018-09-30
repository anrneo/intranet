<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pqrdat extends Model
{
	protected $fillable = [
        'quien_eres', 'entidad', 'regional', 'departamento', 'municipio', 'sede', 'radicado',
    ];   
}
