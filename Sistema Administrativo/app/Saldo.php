<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $table = 'saldo';

    protected $fillable = ['valor', 'empresa_id'];
}
