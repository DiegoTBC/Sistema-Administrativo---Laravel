<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $table = 'saldo';

    protected $fillable = ['valor', 'empresa_id'];

    public static function ultimoPorEmpresa(int $empresaId)
    {
        return self::where('empresa_id', $empresaId)
            ->latest()
            ->first();
    }
}
