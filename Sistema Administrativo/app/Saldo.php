<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $table = 'saldo';

    protected $fillable = ['valor', 'empresa_id'];

    public function movimento()
    {
        return $this->morphTo();
    }


    public static function ultimoPorEmpresa(int $empresaId)
    {
        return self::where('empresa_id', $empresaId)
            ->latest()
            ->first();
    }

    public static function buscaPorIntervalo(int $empresa, string $inicio, string $fim)
    {
        return self::with('movimento')
            ->whereBetween('created_at', [$inicio, $fim])
            ->where('empresa_id', $empresa)
            ->get();
    }
}
